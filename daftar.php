<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "akademik";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak bisa terkoneksi database");
}

$nama        = "";
$alamat      = "";
$fakultas    = "";
$jurusan     = "";
$error       = "";
$sukses      = "";

if (isset($_POST['submit'])) {
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $fakultas   = $_POST['fakultas'];
    $jurusan    = $_POST['jurusan'];
    
    if ($nama && $alamat && $fakultas && $jurusan) {
        $sql1  = "insert into daftar (nama,alamat,fakultas,jurusan) values ('$nama','$alamat','$fakultas','$jurusan')";
        $q1    = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Silahkan cek data anda";
        } else {
            $error  = "gagal memasukan data";
        }
    } else {
        $error  = "silahkan masukan data";
    }
}else{
   
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="assent/css/daftar.css">
    <link rel="icon" href="assent/icon/college.png">
    <title>Registrasi</title>
</head>

<body>
    <!--tombol kembali-->
    <div class="container">
        <a href="index.html" class="kembali">kembali</a>
    </div>
    <div class="mx-auto">
        <!-- //untuk memasukan data -->
        <div class="card">
            <div class="card-header">
                <div class="container">
                </div>
                <div class="card-body">
                    <?php
                    if ($error) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>

                    <?php
                    }

                    ?>
                    <?php
                    if ($sukses) {
                    ?>
                        <div class="alert alert-succes" role="alert">
                            <?php echo $sukses ?>
                        </div>

                    <?php
                    }

                    ?>
                    <form action="" method="POST">
                        <h1>Formulir Pendaftaran Siswa UNIVERSITAS</h1>
                        <div class="form-group">
                            <label for="nama" class="form-label">NAMA</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama  ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">ALAMAT </label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat  ?>">
                        </div>
                        <div class="mb-3">
                            <label for="fakultas" class="form-label">FAKULTAS </label>
                            <select class="form-control" name="fakultas" id="fakultas">
                                <option value=""> -Pilih fakultas- </option>
                                <option value="Psikologi" <?php if ($fakultas == "Psikologi") echo "selected" ?>>Psikologi</option>
                                <option value="Desain Komunikasi Visual" <?php if ($fakultas == "Desain Komunikasi Visual") echo "selected" ?>>Desain Komunikasi Visual</option>
                                <option value="Teknik Sipil" <?php if ($fakultas == "Teknik Sipil") echo "selected" ?>>Teknik Sipil</option>
                                <option value="Akuntansi" <?php if ($fakultas == "Akuntansi") echo "selected" ?>>Akuntansi</option>
                                <option value="Manajemen" <?php if ($fakultas == "Manajemen") echo "selected" ?>>Manajemen</option>
                                <option value="Kedokteran Umum" <?php if ($fakultas == "Kedokteran Umum") echo "selected" ?>>Kedokteran Umum</option>
                                <option value="Teknologi Informasi" <?php if ($fakultas == "Teknologi Informasi") echo "selected" ?>>Teknologi Informasi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">JURUSAN</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option value=""> -Pilih Jurusan- </option>
                                <option value="teknik informatika" <?php if ($jurusan == "teknik informatika") echo "selected" ?>>teknik informatika</option>
                                <option value="teknik pemesinan" <?php if ($jurusan == "teknik pemesinan") echo "selected" ?>>teknik pemesinan</option>
                                <option value="akutansi" <?php if ($jurusan == "akutansi") echo "selected" ?>>akutansi</option>
                                <option value="Ekonomi Akuntansi" <?php if ($jurusan == "Ekonomi Akuntansi") echo "selected" ?>>Ekonomi Akuntansi</option>
                                <option value="Keguruan dan Pendidikan" <?php if ($jurusan == "Keguruan dan Pendidikan") echo "selected" ?>>Keguruan dan Pendidikan</option>
                                <option value="Keperawatan" <?php if ($jurusan == "Keperawatan") echo "selected" ?>>Keperawatan</option>
                            </select>
                        </div>
                        <input type="submit" name="submit" value="Simpan data" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>