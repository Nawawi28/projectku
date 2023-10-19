<div class="card-body">
    <div class="table-responsive">
        <h1><?= $judul; ?></h1>

        <table>
            <thead>
                <tr>
                    <th>no</th>
                    <th>Name supplier</th>
                    <th>no telepon</th>
                    <th>tanggal daftar</th>
                    <th>Jumlah surat jalan</th>
                    <th>keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
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