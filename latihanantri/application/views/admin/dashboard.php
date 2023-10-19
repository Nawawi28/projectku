<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php endif; ?>
            <!-- Card Body -->
            <div class="card-body">
                <h1>Antrian Hari ini</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">nomor antrian</th>
                            <th scope="col">Name supplier</th>
                            <th scope="col">Ubah Status Antrian</th>
                        </tr>
                    </thead>

                    <tbody id="queue-table">
                        <!-- Data antrian akan ditampilkan di sini -->
                    </tbody>
                </table>

            </div>
        </div>
    </div