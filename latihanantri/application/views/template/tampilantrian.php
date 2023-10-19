<header class="masthead">
    <?php if (!empty($antrian)) { ?>
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Selamat Datang</h1>
                <h2 class="text-white font-weight-bold">kamu</h2>
            </div>
            <div class="col-lg-8 align-self-baseline">
                <h3 class="text-white-75 mb-2">Nomor Antrian:</h3>
                <h1 class="text-white font-weight-bold">00<?php echo $antrian->nomor_antrian; ?></h1>
                <h3 class="text-white-75 mb-2">Status Antrian</h3>
                <div class="btn btn-primary btn-xl" id="antrian-status">
                    <!-- Status antrian akan ditampilkan di sini -->
                </div>

            </div>
        </div>
    </div>

    <?php } else { ?>
    <p>Anda belum memiliki antrian.</p>
    <?php } ?>
</header>