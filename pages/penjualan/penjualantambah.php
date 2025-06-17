<div id="top" class="row mb-3">
    <div class="col">
        <h3>Tambah Data Penjualan</h3>
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

        if (isset($_POST['simpan_button'])) {
            $id_barang = $_POST['id_barang'];
            $nama_barang = $_POST['nama_barang'];
            $harga = $_POST['harga'];

            $sudahAda = false;
            $checkSQL = "SELECT * FROM penjualan WHERE id_barang = '$id_barang'";
            $resultCheck = mysqli_query($connection, $checkSQL);
            if (mysqli_num_rows($resultCheck) > 0) {
                $sudahAda = true;
            }

            if ($sudahAda) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    ID Barang sudah ada sayang~
                </div>
        <?php
            } else {
                $insertSQL = "INSERT INTO penjualan SET 
                    id_barang='$id_barang',
                    nama_barang='$nama_barang',
                    harga='$harga'";
                $result = mysqli_query($connection, $insertSQL);
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
                        Data berhasil disimpan 🎉
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>
</div>

<div id="inputan" class="row mb-3">
    <div class="col">
        <div class="card p-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="id_barang" class="form-label">ID Barang</label>
                    <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="misal: BRG001" required>
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="misal: Pensil 2B" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="misal: 5000" required>
                </div>
                <div class="col mb-3">
                    <button class="btn btn-success" type="submit" name="simpan_button">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>