<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "akademik";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak bisa terkoneksi database");
}

$jurusan      = "";
$fakultas_id  = "";
$error        = "";
$sukses       = "";



if(isset($_POST['simpan'])) {
    $jurusan       = $_POST['jurusan'];
    $fakultas_id   = $_POST['fakultas_id'];

if($jurusan && $fakultas_id) {
    $sql1  = "insert into  jurusan (jurusan,fakultas_id) values ('$jurusan','$fakultas_id')";
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
    <title>Data Mahasiswa jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" href="assent/icon/icon.png">
    <link rel="stylesheet" href="assent/css/style.css">
    <style>
        .mx-auto {
            width: 400px
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
                Masukan nama anda
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
         <label for="jurusan" class="form-label">NAMA JURUSAN</label>
         <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $jurusan ?>">
     </div>
     <div class="mb-3">
     <label for="fakultas_id " class="form-label">NAMA FAKULTAS</label>
     <select class="form-control" name="fakultas_id " id="fakultas_id ">
     <option value="">--pilih fakultas--</option>
         <?php
           echo "<option value = $data[id]>$data[fakultas]</option>";
           $query = mysqli_query($koneksi,"SELECT * FROM daftar") or die (mysqli_error($koneksi));
           while($data = mysqli_fetch_array($query)) {
            echo "<option value = $data[id]>$data[fakultas]</option>";
           }
         ?>
     </select>
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