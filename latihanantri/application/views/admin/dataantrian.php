<div class="card-body">
    <div class="table-responsive">
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
        <a href="<?php echo base_url('admin/exportToPDF'); ?>" class="btn btn-info">export
            PDF</a>
        <a href="<?php echo base_url('admin/exportexcel'); ?>" class="btn btn-info">export
            excel</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>


                    <th>No</th>
                    <th>Name supplier</th>
                    <th>no telepon</th>
                    <th>tanggal daftar</th>
                    <th>keterangan</th>
                    <th>aksi</th>

                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($antrian as $a) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?= $a->nama_supplier ?></td>
                    <td><?= $a->no_telepon ?></td>
                    <td><?= $a->tanggal_daftar ?></td>
                    <td><?= $a->keterangan ?></td>
                    <td> <a href="<?= base_url('admin/hapus_dataantrian/' . $a->id_supplier); ?>" class="btn btn-danger"
                            onclick="return konfirmasiHapus('<?= $a->nama_supplier ?>');">Hapus</a>
                        <a href="<?= base_url('admin/updateSupplier/' . $a->id_supplier) ?>"
                            class="btn btn-info">update</a>

                    </td>
                </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
</div>