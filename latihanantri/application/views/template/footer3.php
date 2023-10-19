 <!-- Footer-->
 <footer class="bg-light py-5">
     <div class="container px-4 px-lg-5">
         <div class="small text-center text-muted">Copyright &copy; 2023 - Asyik nawawi</div>
     </div>
 </footer>
 <!-- Bootstrap core JS-->
 <script>
document.addEventListener("DOMContentLoaded", function() {
    var contElement = document.getElementById("con");
    if (contElement) {
        contElement.scrollIntoView();
    }
});
 </script>

 <script>
var lastStatus = ''; // Simpan status terakhir

function updateAntrianStatus() {
    $.ajax({
        url: '<?php echo base_url('Antrian/get_status_antrian_ajax'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Perbarui tampilan dengan status antrian yang diterima
            $('#antrian-status').html('<h2>' + data.status_antrian + '</h2>');

            // Tampilkan SweetAlert hanya jika status berbeda dari sebelumnya
            if (data.status_antrian !== lastStatus) {
                Swal.fire({
                    icon: 'success',
                    title: 'Status Antrian Diperbarui',
                    text: 'Status Antrian Anda: ' + data.status_antrian
                });

                // Perbarui status terakhir
                lastStatus = data.status_antrian;
            }
        }
    });
}

// Panggil fungsi untuk pertama kali dan atur interval pembaruan
updateAntrianStatus();
setInterval(updateAntrianStatus, 5000); // Contoh: pembaruan setiap 5 detik
 </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 <!-- SimpleLightbox plugin JS-->


 <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
 <!-- Core theme JS-->
 <script src="<?= base_url('assets/'); ?>startjs/scripts.js"></script>
 <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->

 <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
 </body>

 </html>