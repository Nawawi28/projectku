</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; asyik nawawi 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('login/logout') ?>"">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->

                    <script>
                    var logoutTimer;

                    function startLogoutTimer() {
                        logoutTimer = setTimeout(function() {
                            window.location.href = '<?php echo base_url("login/logout"); ?>';
                        }, 120000); // 2 menit dalam milidetik
                    }

                    function resetLogoutTimer() {
                        clearTimeout(logoutTimer);
                        startLogoutTimer();
                    }

                    <?php if ($this->session->userdata('nik')) : ?>
                    document.addEventListener(" mousemove", resetLogoutTimer); document.addEventListener("keypress",
                    resetLogoutTimer); startLogoutTimer(); // Mulai hitung waktu keluar otomatis saat halaman dimuat
                    <?php endif; ?> </script>


                    <script>
                    function loadLatestQueueData() {
                        $.ajax({
                            url: "<?php echo base_url('Antrianterbaru/getLatestQueueData'); ?>",
                            dataType: "json",
                            success: function(data) {
                                renderQueueData(data);
                            },
                            complete: function() {
                                // Jadwalkan pemanggilan ulang setelah beberapa detik
                                setTimeout(loadLatestQueueData, 5000); // 5000 milidetik (5 detik)
                            }
                        });
                    }

                    function renderQueueData(data) {
                        var tableContent = '';

                        // Baca data antrian dan tampilkan dalam tabel
                        for (var i = 0; i < data.length; i++) {
                            var queue = data[i];
                            tableContent += '<tr>';
                            tableContent += '<td>' + queue.nomor_antrian + '</td>';
                            tableContent += '<td>' + queue.nama_supplier + '</td>';
                            tableContent += '<td>';

                            // Tambahkan tombol aksi sesuai dengan status antrian
                            if (queue.status_antrian == 'MENUNGGU') {
                                tableContent += '<a href="<?= base_url("admin/ubah_status_antrian/") ?>' + queue
                                    .id_antrian + '/MASUK" class="btn btn-primary">Proses Antrian</a>';
                            } else if (queue.status_antrian == 'MASUK') {
                                tableContent += '<a href="<?= base_url("admin/ubah_status_antrian/") ?>' + queue
                                    .id_antrian + '/SELESAI" class="btn btn-secondary">Selesaikan Antrian</a>';
                            }

                            if (queue.status_antrian == 'SELESAI') {
                                tableContent += '<span class="btn btn-success">Selesai</span>';
                            }

                            tableContent += '</td>';
                            tableContent += '</tr>';
                        }

                        // Tampilkan data dalam tabel
                        $('#queue-table').html(tableContent);
                    }

                    // Panggil fungsi pertama kali saat halaman dimuat
                    $(document).ready(function() {
                        loadLatestQueueData();
                    });
                    </script>


                    <script src=" <?php echo base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>
                    <script src="<?php echo base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>">
                    </script>
                    <!-- Core plugin JavaScript-->
                    <script src="<?php echo base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>">
                    </script>



                    <!-- Page level plugins -->
                    <script src="<?php echo base_url('assets/admin/vendor/datatables/jquery.dataTables.min.js'); ?>">
                    </script>
                    <script
                        src="<?php echo base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js'); ?>">
                    </script>

                    <!-- Page level custom scripts -->
                    <script>
                    $('.custom-file-input').on('change', function() {
                        let fileName = $(this).val().split('\\').pop();
                        $(this).next('.custom-file-label').addClass("selected").html(fileName);
                    });
                    </script>
                    <script src="<?php echo base_url('assets/admin/js/demo/datatables-demo.js'); ?>"></script>
                    <script>
                    function konfirmasiHapus(namaSupplier) {
                        return confirm('Kamu yakin akan menghapus data supplier "' + namaSupplier + '"?');
                    }
                    </script>