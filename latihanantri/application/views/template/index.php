<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Antrian Berbasis Web PT Dankos Farma</a>

        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Selamat Datang</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Aplikasi ini bertujuan untuk menyederhanakan pendaftaran dan
                        pengelolaan antrian unloading material di Divisi Logistik(PM) PT Dankos Farma</p>
                    <a class="btn btn-primary btn-xl" href="#con">AMBIL ANTRIAN</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Con-->
    <section class="page-section" id="con">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Isi Data Terlebih dahulu</h2>

                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">

                    <?php if(isset($error_message)) { ?>
                    <div class="alert alert-warning" role="alert"><?= $error_message; ?></div>
                    <?php } ?>
                    <?= form_open('antrian/tambah_supplier', 'id="supplierForm"'); ?>
                    <!-- Input Nama Perusahaan -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="nama_supplier" name="nama_supplier" type="text"
                            placeholder="Masukkan nama perusahaan...">
                        <label for="nama_supplier">Nama perusahaan</label>
                        <?= form_error('nama_supplier', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- Input Nomor Telepon -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="no_telepon" name="no_telepon" type="tel"
                            placeholder="Masukkan nomor telepon...">
                        <label for="no_telepon">Nomor Telepon</label>
                        <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- Input Jumlah Surat Jalan -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="jumlah_surat_jalan" name="jumlah_surat_jalan" type="text"
                            placeholder="Masukkan jumlah surat jalan...">
                        <label for="jumlah_surat_jalan">Jumlah Surat Jalan</label>
                        <?= form_error('jumlah_surat_jalan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- Input Keterangan -->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="keterangan" name="keterangan" type="text"
                            placeholder="Masukkan keterangan Anda di sini..." style="height: 5rem"></textarea>
                        <label for="keterangan">Keterangan</label>
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- Tombol Kirim -->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Submit</button>
                    </div>
                    <?= form_close(); ?>
    </section>