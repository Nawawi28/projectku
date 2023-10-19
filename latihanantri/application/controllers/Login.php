<?php
class Login extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Usermodel');
	}
    public function index() 
    {
        if ($this->session->userdata('nik')) {   // Ini adalah kondisi yang memeriksa apakah ada sesi pengguna yang sudah masuk (sesi 'nik'). Jika sesi sudah ada, pengguna akan diarahkan ke halaman admin dengan menggunakan fungsi redirect().
            redirect('admin');
        }
        $this->form_validation->set_rules('nik', 'Nik', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
            if ($this->form_validation->run() == FALSE) { //  logika yang menentukan apa yang harus dilakukan jika validasi formulir gagal atau berhasil. Jika validasi gagal, maka tampilan login akan dimuat kembali dengan pesan kesalahan. Jika validasi berhasil, metode _login() akan dipanggil.
                $this->load->view('admin/login');
            }  else {
                // validasinya success
                $this->_login();
            }
        
       
}
    private function _login() //  Metode ini digunakan untuk mengelola proses masuk (login) setelah validasi formulir berhasil.
    {
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['nik' => $nik])->row_array();
        
        // jika data admin ada
        if ($admin) {
            if (password_verify($password, $admin['password'])) { // kondisi yang memeriksa apakah kata sandi yang dimasukkan pengguna sesuai dengan kata sandi yang ada di database. password_verify() digunakan untuk memeriksa kecocokan kata sandi.
                $data = [
                    'nik' => $admin['nik'],
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $data['error_message'] = 'password tidak dikenali';
            $this->load->view('admin/login', $data);
            }
           
        } else {
            $data['error_message'] = 'NIK tidak dikenali';
            $this->load->view('admin/login', $data);
         
        }
    }
    public function register() {
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username]',[ // Aturan validasi untuk input 'username' ditetapkan dengan persyaratan bahwa nama pengguna harus diisi dan harus unik dalam tabel 'admin'. Pesan kesalahan kustom juga disertakan jika nama pengguna tidak unik.
        'is_unique' => 'This name has already registered!']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('nik', 'Nik', 'required|is_unique[admin.nik]');
        $this->form_validation->set_rules('no_telepon', 'No_telepon', 'required|is_unique[admin.no_telepon]');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('admin/register');
    } else {
        $data = array(
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'nik' => $this->input->post('nik'),
            'no_telepon' => $this->input->post('no_telepon'),
            'date_created' => time(),
            'image' => 'default.jpg' 
          
        );

        if ($this->Usermodel->add_user($data)) {
            $data['success_message'] = 'User registered successfully.';
            $this->load->view('admin/login', $data);
        } else {
            $data['error_message'] = 'Failed to register user.';
            $this->load->view('admin/register', $data);
        }
    }
    }
    public function logout()
    {
        $this->session->unset_userdata('nik'); // Metode logout() digunakan untuk menghapus sesi pengguna dengan 'nik', yang menandakan bahwa admin telah keluar.
       

        $data['success_message'] = 'admin berhasil keluar';
        $this->load->view('admin/login', $data);
    }
}