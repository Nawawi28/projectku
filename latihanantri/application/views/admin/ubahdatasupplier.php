<div class="card-body">
    <?php echo form_open('admin/processUpdateSupplier'); ?>

</div>
<div class="mb-3">
    <label class="form-label">Nama Supplier</label>
    <input type="text" class="form-control" name="nama_supplier" value="<?php echo $supplier['nama_supplier']; ?>">
</div>
<div class="mb-3">
    <label class="form-label">No. Telepon</label>
    <input type="text" class="form-control" name="no_telepon" value="<?php echo $supplier['no_telepon']; ?>">
</div>
<div class="mb-3">
    <label class="form-label">Tanggal Daftar</label>
    <input type="date" class="form-control" name="tanggal_daftar" value="<?php echo $supplier['tanggal_daftar']; ?>">
</div>
<div class="mb-3">
    <label class="form-label">Jumlah Surat Jalan</label>
    <input type="text" class="form-control" name="jumlah_surat_jalan"
        value="<?php echo $supplier['jumlah_surat_jalan']; ?>">
</div>

<div class="mb-3">
    <label class="form-label">Keterangan</label>
    <textarea class="form-control" rows="3" name="keterangan"><?php echo $supplier['keterangan']; ?></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>
</div>