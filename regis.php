<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "akademik";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak bisa terkoneksi database");
}

$username    = "";
$email       = "";
$alamat      = "";
$password    = "";
$error       = "";
$sukses      = "";

if(isset($_POST['submit'])){
   $username   = $_POST['username'];
   $email      = $_POST['email'];
   $alamat     = $_POST['alamat'];
   $password   = $_POST['password'];

if($username && $email && $alamat && $password) {
    $sql1  = "insert into regis (username,email,alamat,password) values ('$username','$email','$alamat','$password')";
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assent/css/login.css">
    <link rel="icon" href="assent/icon/user.png">
    <title>Registrasi admin</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Registrasi</h1>
           <div class="input-box">
               <input type="text" name="username" id="username" placeholder="username" required value="<?php echo $username  ?>">
               <i class='bx bxs-user' ></i>
           </div>
           <div class="input-box">
            <input type="email"  name="email" id="email" placeholder="email" required value="<?php echo $email  ?>">
            <i class='bx bxs-envelope'></i>
           </div>
           <div class="input-box">
            <input type="alamat"  name="alamat" id="alamat" placeholder="alamat" required value="<?php echo $alamat  ?>">
            <i class='bx bxs-home' ></i>
           </div>
           <div class="input-box">
            <input type="password"  name="password" id="password" placeholder="password" required value="<?php echo $password  ?>">
            <i class='bx bxs-lock-alt' ></i>
           </div>
           <div class="remember-forget">
           </div>
           <button type="submit" name="submit" value="simpan data" class="btn">daftar</button>
           <div class="register-link">
            <p>kembali halaman Login <a href="index.php">kembali</a></p>
           </div>
        </form>
    </div>
</body>
</html>