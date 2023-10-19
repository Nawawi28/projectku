<?php
header("Content-type: application/vnd-ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=$title.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);
?>

<div class="card-body">
    <div class="table-responsive">

        <h3>
            <center>Laporan Data supplier </center>
        </h3>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>No Telepon</th>
                    <th>Tanggal daftar</th>
                    <th>Jumlah Surat Jalan</th>
                    <th>Keterangan</th>

                </tr>
            </thead>
            <tbody> <?php $no = 1;
                foreach ($supplier as $b) { ?> <tr>
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $b['nama_supplier']; ?></td>
                    <td><?= $b['no_telepon']; ?></td>
                    <td><?= $b['tanggal_daftar']; ?></td>
                    <td><?= $b['jumlah_surat_jalan']; ?></td>
                    <td><?= $b['keterangan']; ?></td>

                </tr> <?php } ?>
            </tbody>
        </table>
    </div>

</div>