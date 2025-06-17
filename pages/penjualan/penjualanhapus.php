<div id="top" class="row mb-3">
    <div class="col">
        <h3>Hapus Data Penjualan</h3>
    </div>
    <div class="col">
        <a href="?page=penjualan" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>

<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        include "database/connection.php";
        $id_barang = $_GET['id_barang'];

        $sql = "DELETE FROM penjualan WHERE id_barang = '$id_barang'";
        $result = mysqli_query($connection, $sql);

        if (!$result) {
        ?>
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-exclamation-circle"></i>
                <?php echo mysqli_error($connection) ?>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-circle"></i>
                Hapus data berhasil 🧹✨
            </div>
            <meta http-equiv="refresh" content="2;url=?page=penjualan">
        <?php
        }
        ?>
    </div>
</div>