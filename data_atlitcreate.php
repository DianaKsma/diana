<?php
if (isset($_POST['button_create'])) {

    $database = new Database();
    $db = $database->getConnection();
    
    $validateSql = "SELECT * FROM data_atlit WHERE Id_Atlit = ?";
    $stmt = $db->prepare($validateSql);
    $stmt->bindParam(1, $_POST['Id_Atlit']);
    $stmt->execute();
    if($stmt->rowCount() > 0){
?>
        <div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             <h5><i class="icon fas fa-ban"></i>Gagal</h5>
              Id Atlit sama sudah ada
        </div>
<?php
    } else {
        
        $IdAtlit = $_POST['Id_Atlit'];
        $NIK = $_POST['NIK'];
        $NamaAtlit = $_POST['Nama_Atlit'];
        $JenisKelamin = $_POST['Jenis_Kelamin'];
        $TempatLahir = $_POST['Tempat_Lahir'];
        $Tanggallahir = $_POST['Tgl_Lahir'];
        $Alamat = $_POST['Alamat'];
        $Agama = $_POST['Agama'];
        $NoHp = $_POST['No_Hp'];
        $cabor = $_POST['cabor'];
        $Prest = $_POST['Prestasi'];
        $Posis = $_POST['Posisi'];
    
          $insertSql = "INSERT INTO data_atlit VALUES ('$IdAtlit', '$NIK', '$NamaAtlit', '$JenisKelamin', '$TempatLahir', '$Tanggallahir', '$Alamat', '$Agama', '$NoHp', '$cabor', '$Prest', '$Posis')";
          $stmt = $db->prepare($insertSql);
          $stmt->bindParam(1, $_POST['Id_Atlit']);
          $stmt->bindParam(2, $_POST['NIK']);
          $stmt->bindParam(3, $_POST['Nama_Atlit']);
          $stmt->bindParam(4, $_POST['Jenis_Kelamin']);
          $stmt->bindParam(5, $_POST['Tempat_Lahir']);
          $stmt->bindParam(6, $_POST['Tgl_Lahir']);
          $stmt->bindParam(7, $_POST['Alamat']);
          $stmt->bindParam(8, $_POST['Agama']);
          $stmt->bindParam(9, $_POST['No_Hp']);
          $stmt->bindParam(10,$_POST['cabor']);
          $stmt->bindParam(11,$_POST['Prestasi']);
          $stmt->bindParam(12,$_POST['Posisi']);
          if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
          } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
          }
          echo "<meta http-equiv='refresh' content='0;url=?page=data_atlitread'>";
    }
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Tambah Data Atlit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=data_atlitread">Data Atlit</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Atlit</h3>
        </div>
    </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">

                    <label for="No">No</label>
                    <input type="int" class="form-control" name="No">

                    <label for="Id_Atlit">Id Atlit</label>
                    <input type="text" class="form-control" name="Id_Atlit">

                    <label for="NIK">NIK</label>
                    <input type="text" class="form-control" name="NIK">

                    <label for="Nama_Atlit">Nama Atlit</label>
                    <input type="text" class="form-control" name="Nama_Atlit">

                    <label for="Jenis_Kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="Jenis_Kelamin">
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label for="Tempat_Lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="Tempat_Lahir">

                    <label for="Tgl_Lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="Tgl_Lahir">

                    <label for="Alamat">Alamat</label>
                    <input type="text" class="form-control" name="Alamat">

                    <label for="Agama">Agama</label>
                    <select class="form-control" name="Agama">
                        <option value="">--Pilih Agama--</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                    </select>
                    
                    <label for="No_Hp">No Hp</label>
                    <input type="text" class="form-control" name="No_Hp">

                    <label for="cabor">Cabang Olahraga</label>
                    <select class="form-control" name="cabor">
                    <option value="">--Pilih Cabang Olahraga--</option>
                        <option value="Atletik">Atletik</option>
                        <option value="Angkat Beban">Angkat Beban</option>
                        <option value="Angkat Berat">Angkat Berat</option>
                        <option value="AeroSport">Aero Sport</option>
                        <option value="Basket">Basket</option>
                        <option value="Bola Volly">Bola Volly</option>
                        <option value="Bulutangkis">Bulutangkis</option>
                        <option value="Balap Motor">Balap Motor</option>
                        <option value="Bina Raga">Bina Raga</option>
                        <option value="Bridge">Bridge</option>
                        <option value="Biliyar">Biliyar</option>
                        <option value="Catur">Catur</option>
                        <option value="Dayung">Dayung</option>
                        <option value="Drumband">Drumband</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Karate">Karate</option>
                        <option value="Korfball">Korfball</option>
                        <option value="Lempar Lembing">Lempar Lembing</option>
                        <option value="Menembak">Menembak</option>
                        <option value="Panahan">Panahan</option>
                        <option value="PanjatTebing">Panjat Tebing</option>
                        <option value="PencakSilat">Pencak Silat</option>
                        <option value="Renang">Renang</option>
                        <option value="Senam">Senam</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Sepak Takraw">Sepak Takraw</option>
                        <option value="Sepatu Roda">Sepatu Roda</option>
                        <option value="Tenis Meja">Tenis Meja</option>
                        <option value="Tenis Lapangan">Tenis Lapangan</option>
                        <option value="Tinju">Tinju</option>
                        <option value="Tolak Peluru">Tolak Peluru</option>
                        <option value="Taekwondo">Taekwondo</option>
                    </select>

                    <label for="Prestasi">Prestasi</label>
                    <input type="text" class="form-control" name="Prestasi">

                    <label for="Posisi">Posisi</label>
                    <input type="text" class="form-control" name="Posisi">
                </div>
                <a href="?page=data_atlitread" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-times"></i> Batal
                </a>
                <button type="submit" name="button_create" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
         </div>
</section>
<?php include_once "partials/scripts.php" ?>