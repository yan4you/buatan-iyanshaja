<?php
// Mulai session (pastikan ini berada di bagian atas halaman web Anda sebelum output apa pun)
session_start();

// Periksa apakah pengguna sudah masuk (sesuai kebutuhan)
if(isset($_SESSION['user_id'])) {
    // Hapus semua data session
    session_unset();

    // Hancurkan session
    session_destroy();

    // Redirect pengguna ke halaman login atau halaman lain yang sesuai
    header("Location: index.php"); // Ganti "login.php" dengan halaman tujuan Anda
    exit();
} else {
    // Jika pengguna belum masuk, Anda dapat mengarahkannya ke halaman login atau halaman lain yang sesuai
    header("Location: index.php"); // Ganti "login.php" dengan halaman tujuan Anda
    exit();
}
?>

