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
$password    = "";
$error       = "";
$sukses      = "";

if(isset($_POST['submit'])){
   $username   = $_POST['username'];
   $password   = $_POST['password'];

if($username && $password) {
    $sql1  = "insert into login (username,password) values ('$username','$password')";
    $q1    = mysqli_query($koneksi, $sql1);
if ($q1) {
    $sukses = "Berhasil memasukan data";
        } else {
    $error  = "gagal memasukan data";
   }
 } else {
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
  <link rel="stylesheet" href="assent/css/login.css">
  <link rel="icon" href="assent/icon/user.png">
  <title>login Siswa</title>
  </head>
  <body>
    <div class="wrapper">
        <form action="" method="post">
        <section class="form-01-main">
      <div class="form-cover">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-sub-main">
              <div class="_main_head_as">
                <a href="#">
                  <img src="assets/images/vector.png">
                </a>
           <div class="input-box">
               <input type="text" name="username" id="username" placeholder="username" required value="<?php echo $username  ?>">
               <i class='bx bxs-user' ></i>
           </div>
           <div class="input-box">
            <input type="password"  name="password" id="password" placeholder="password" required value="<?php echo $password  ?>">
            <i class='bx bxs-lock-alt' ></i>
           </div>
           <div class="remember-forget">
           </div>
           <button type="submit" name="submit" value="simpan data" class="btn">Login</button>
           <div class="register-link">
            <p>Register if you don't have an account yet <a href="regis.php">registrasi</a></p>
           </div>
        </form>
      <?Php 
         // Mulai session (pastikan ini berada di bagian atas halaman web Anda sebelum output apa pun)
         session_start();
         
         // Periksa apakah pengguna sudah login
         if(isset($_SESSION['user_id'])) {
             // Jika pengguna sudah login, alihkan ke halaman home atau halaman lain yang sesuai
             header("Location: index.html"); // Ganti "home.php" dengan halaman tujuan Anda
             exit();
         }
         
         // Proses login jika ada pengiriman data login (contoh: melalui form)
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
             // Anda dapat menambahkan validasi login di sini (misalnya, memeriksa database)
             
             // Jika login berhasil, atur session dan alihkan ke halaman home
             $_SESSION['user_id'] = 1; // Ganti dengan ID pengguna yang sesuai dari database jika ada
             header("Location: index.html"); // Ganti "home.php" dengan halaman tujuan Anda
             exit();
         }
      ?>

    </div>
</body>
</html>