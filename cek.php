<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "akademik";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak bisa terkoneksi database");
}
$nim        = "";
$nama       = "";
$alamat     = "";
$fakultas   = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id        = $_GET['id'];
    $sql1       = "delete  from siswa where id = $id";
    $q1         = mysqli_query($koneksi, $sql1);
    $nim        = $r1['nim'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $fakultas   = $r1['fakultas'];
    if ($q1) {
        $sukses     = "berhasil";
    } else {
        $error      = "gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from siswa where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nim        = $r1['nim'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $fakultas   = $r1['fakultas'];

    if ($nim == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $nim        = $_POST['nim'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $fakultas   = $_POST['fakultas'];

    if ($nim && $nama && $alamat &&  $fakultas) {
        $sql1 = "insert into siswa (nim,nama,alamat,fakultas) values ('$nim','$nama','$alamat','$fakultas')";
        $q1   = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses     = "Berhasil memasukan data";
        } else {
            $error      = "gagal memasukan data";
        }
    } else {
        $error = "Silahkan Masukan Data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" href="assent/icon/icon.png">
    <style>
        .mx-auto {
            width: 500px
        }

        .card {
            margin-top: 20px;
        }
        .kembali{
            background: #20b2aa;
            color: #fafafa;
            text-decoration: none;
            border: 2px solid transparent;
            font-weight: bold;
            padding: 10px 25px;
            border-radius: 30px;
            transition: transform .4s; 
         }
    </style>
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
                Silahkan cek data Mahasiswa
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
                        <label for="nim" class="form-label">NIM </label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">NAMA </label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">ALAMAT </label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">FAKULTAS</label>
                        <select class="form-control" name="fakultas" id="fakultas">
                       
                            <option value="">--pilih jurusan--</option>
                            <?php
                               echo "<option value = $data[id]>$data[fakultas]</option>";
                               $query = mysqli_query($koneksi,"SELECT * FROM fakultas") or die (mysqli_error($koneksi));
                               while($data = mysqli_fetch_array($query)) {
                                echo "<option value = $data[id]>$data[fakultas]</option>";
                               }
                             ?>
                               </select>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
        <!-- //untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa yang terdaftar
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th> 
                            <th scope="col">fakultas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from siswa order by id desc";
                        $q2   = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2['id'];
                            $nim = $r2['nim'];
                            $nama = $r2['nama'];
                            $alamat = $r2['alamat'];
                            $fakultas = $r2['fakultas'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <th scope="row"><?php echo $nim ?></th>
                                <th scope="row"><?php echo $nama ?></th>
                                <th scope="row"><?php echo $alamat ?></th>
                                <th scope="row"><?php echo $fakultas ?></th>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confrim('Yakin mau delete data')"> <button type="button" class="btn btn-danger">Delete</button></a>


                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>


                    </thead>



                </table>

            </div>
        </div>
    </div>
</body>

</html>