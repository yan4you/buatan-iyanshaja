<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "akademik";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak bisa terkoneksi database");
}

$fakultas    = "";
$error       = "";
$sukses      = "";

if(isset($_POST['simpan'])){
    $fakultas  = $_POST['fakultas'];

if($fakultas) {
    $sql1  = "insert into fakultas (fakultas) values ('$fakultas')";
    $q1    = mysqli_query($koneksi, $sql1);
if ($q1) {
    $sukses = "Berhasil memasukan data";
        } else {
    $error  = "gagal memasukan data";
   }
 } else{
    $error  = "silahkan masukan data";
 }    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa fakultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" href="icon/icon.png">
    <link rel="stylesheet" href="assent/css/style.css">
    <style>
        .mx-auto {
            width: 350px
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!--tombol kembali-->
    <div class="container">
        <a href="index.html"class="kembali">kembali</a>
    </div>
    <div class="mx-auto">
        <!-- //untuk memasukan data -->
        <div class="card">
            <div class="card-header">
                Masukan nama fakultas 
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
     <div class="mb-3">
     <label for="fakultas" class="form-label">FAKULTAS</label>
         <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?php echo $fakultas ?>">
         <!-- <option value=""> -Pilih fakultas- </option>
         <option value="saintek" <?php if ($fakultas == "saintek") echo "selected" ?>>saintek</option>
         <option value="soshum" <?php if ($fakultas == "soshum") echo "selected" ?>>soshum</option>
         <option value="Teknologi Informasi" <?php if ($fakultas == "Teknologi Informasi") echo "selected" ?>>Teknologi Informasi</option>
         <option value="Akuntansi" <?php if ($fakultas == "Akuntansi") echo "selected" ?>>Akuntansi</option>
         <option value="Hukum" <?php if ($fakultas == "Hukum") echo "selected" ?>>Hukum</option>
         <option value="Manajemen" <?php if ($fakultas == "Manajemen") echo "selected" ?>>Manajemen</option>
         <option value="Kedokteran Umum" <?php if ($fakultas == "Kedokteran Umum") echo "selected" ?>>Kedokteran Umum</option>
         <option value="Teknik Sipil" <?php if ($fakultas == "Teknik Sipil") echo "selected" ?>>Teknik Sipil</option>
         </select> -->
     </div>
     <div class="col-15">
        <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary" />
    </div>
</form>
</div>
</div>
</div>
</body>
</html>