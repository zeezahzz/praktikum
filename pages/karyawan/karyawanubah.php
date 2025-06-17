<div id="top" class="row mb-3">
    <div class="col">
        <h3>Ubah Data Karyawan</h3>
    </div>
    <div class="col">
        <a href="?page=karyawan" class="btn btn-primary float-end">
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
      $nik = $_POST['nik'];
      $nama = $_POST['nama'];
      $tanggal_mulai = $_POST['tanggal_mulai'];
      $gaji_pokok = $_POST['gaji_pokok'];
      $status_karyawan = $_POST['status_karyawan'];
      $bagian_id = $_POST['bagian_id'];

      $updateSQL = "UPDATE karyawan SET
                    nama='$nama',
                    tanggal_mulai='$tanggal_mulai',
                    gaji_pokok='$gaji_pokok',
                    status_karyawan='$status_karyawan',
                    bagian_id='$bagian_id'
                    WHERE nik='$nik'";
      $result = mysqli_query($connection, $updateSQL);
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
          Ubah data berhasil disimpan
        </div>
        <?php
      }
    }

    $nik = $_GET['nik'];
    $selectSQL = "SELECT * FROM karyawan WHERE nik = '$nik'";
    $result = mysqli_query($connection, $selectSQL);
    if (!$result || mysqli_num_rows($result) == 0) {
      echo '<meta http-equiv="refresh" content="0;url=page=karyawan">';
    }
    $row = mysqli_fetch_assoc($result);
    $tetap_checked = $row['status_karyawan'] == "TETAP" ? " checked" : "";
    $kontrak_checked = $row['status_karyawan'] == "KONTRAK" ? " checked" : "";
    $magang_checked = $row['status_karyawan'] == "MAGANG" ? " checked" : "";
    ?>
  </div>
</div>
