<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Antrian Unloading Material</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->

        <div class="card shadow mb-10" style="width: 45%; margin-top: 20%;margin-left: 250px;">
            <div class="row justify-content-center">

                <div class="col-lg-100">
                    <div class="p-5">

                        <div class="text-center">
                            <i class="fas fa-user fa-5x"></i>
                            <!-- Ganti kelas ikon dan ukuran ikon sesuai kebutuhan -->
                        </div>
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                        </div>
                        <?php if(isset($success_message)) { ?>
                        <div class="alert alert-success" role="alert"><?= $success_message; ?></div>
                        <?php } ?>
                        <?php if(isset($error_message)) { ?>
                        <div class="alert alert-warning" role="alert"><?= $error_message; ?></div>
                        <?php } ?>
                        <form action="<?php echo base_url('Login'); ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nik" name="nik"
                                    placeholder="Full nik" value="<?= set_value('nik'); ?>">
                                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <input type="password" class="form-control form-control-user" name="password"
                                    id="password" placeholder="Masukan password ...">
                                <?= form_error('password','<small class="text-danger pl-3">','</small> '); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('login/register') ?>">belum punya akun?,buat akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.jss'); ?>">
    </script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/admin/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>