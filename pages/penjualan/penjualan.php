<?php
include "database/connection.php";
?>
<div class="row">
    <div class="col">
        <h3>Data Penjualan</h3>
    </div>
    <div class="col">
        <a href="?page=penjualantambah" class="btn btn-success float-end">
            <i class="fa fa-plus-circle"></i>
            Tambah
        </a>
    </div>
</div>

<div class="row mt-3">
    <div class="col">
        <?php
        $selectSQL = "SELECT * FROM penjualan";
        $result = mysqli_query($connection, $selectSQL);
        
        if (!$result) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo mysqli_error($connection) ?>
            </div>
        <?php
            return;
        }

        if (mysqli_num_rows($result) == 0) {
        ?>
            <div class="alert alert-light" role="alert">
                Data kosong
            </div>
        <?php
            return;
        }
        ?>
    </div>
</div>

<table class="table bg-white rounded shadow-sm table-hover">
    <thead>
        <tr>
            <th scope="col">ID Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga</th>
            <th scope="col" width="200">Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr class="align-middle">
                <td><?php echo $row["id_barang"] ?></td>
                <td><?php echo $row["nama_barang"] ?></td>
                <td>Rp <?php echo number_format($row["harga"], 0, ',', '.') ?></td>
                <td>
                    <a href="?page=penjualanubah&id=<?php echo $row["id_barang"] ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                        Ubah
                    </a>
                    <a href="?page=penjualanhapus&id=<?php echo $row["id_barang"] ?>"
                       onclick="return confirm('Yakin mau hapus data ini, sayang? 🥺');" 
                       class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                        Hapus
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
