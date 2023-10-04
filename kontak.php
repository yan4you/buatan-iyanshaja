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
$email       = "";
$Pesan       = "";
$error       = "";
$sukses      = "";

if(isset($_POST['submit'])){
   $nama       = $_POST['nama'];
   $email      = $_POST['email'];
   $Pesan      = $_POST['Pesan'];

if($nama && $email && $Pesan) {
    $sql1  = "insert into kontak (nama,email,Pesan) values ('$nama','$email','$Pesan')";
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
<title>Kontak Kami</title>
<link rel="icon" href="assent/icon/phone-book.png">
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #283642;
  }
  header {
    background-color: #333;
    color: white;
    padding: 10px 0;
    text-align: center;
  }
  .container {
    max-width: 800px;
    margin: 20px auto;
    padding: 0 20px;
    border-radius: 20px;
  }
  .contact-form {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
  }
  .contact-form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left;
  }
  .contact-form input[type="text"],
  .contact-form textarea {
    width: 97%;
    padding: 10px;
    margin-bottom: 20px;
    border: 5px solid #ccc;
    border-radius: 10px;
  }
  .contact-form button {
    background-color: #333;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
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
<div class="container">
        <a href="dasboard.php" class="kembali">kembali</a>
    </div>
  <header>
    <h1>Kontak Kami</h1>
  </header>
  <div class="container">
    <div class="contact-form">
      <h2>Hubungi Kami</h2>
      <form action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required value="<?php echo $nama  ?>">
        
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required value="<?php echo $email  ?>">
        
        <label for="Pesan">Pesan:</label>
        <textarea id="Pesan" name="Pesan" rows="4" required value="<?php echo $Pesan  ?>"></textarea>
        
        <button type="submit" name="submit" value="simpan data">Kirim</button>
      </form>
    </div>
  </div>
</body>
</html>
