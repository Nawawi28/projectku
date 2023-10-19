<!-- DataTales Example -->
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
    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/admin/img/') . $adm['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $adm['username']; ?></h5>
                    <p class="card-text"><?= $adm['nik']; ?></p>
                    <p class="card-text"><small class="text-muted">Member since

                            <?= date('d F Y', $adm['date_created']); ?></small></p>
                    <a href="<?= base_url('dataadmin/edit') ?>" class="btn btn-info">update</a>
                </div>

            </div>
        </div>
    </div>

</div>