<?php
include "konfig/koneksi.php"; //koneksi database

// inisialisasi value yang di kirim ke variabel
$username = $_POST['username'];
$password = $_POST['password'];

// buat query untuk cek username
$query = "SELECT * FROM muda_user WHERE username = '$username'";
$conn  = mysqli_query($connection, $query);
$data  = mysqli_fetch_array ($conn);

// verify password
$pass = password_verify($password, $data['password']);

if (mysqli_num_rows($conn) > 0) {
    // cek passwowrd
    if($password == $pass) {
        // jika username dan password sesuai
        session_start();
        // daftarkan session untuk user login
        $_SESSION['namauser'] = $data['nama_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level_user'] = $data['level'];
        
        // arahkan kehalaman dasbord
        header("location: media.php?module=home");
       
    }else {
        // jika password tidak sesuai
        // munculkan alert gagal login
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-danger' role='alert'>
        Password tidak sesuai.
        </div>
        ";
    
        // redirect ke halaman awal
        header("location: index.php");
    }
} else {
    // jika username tidak ada
    // munculkan alert gagal login
    session_start();
    $_SESSION["alert"] = "
    <div class='alert alert-danger' role='alert'>
    Username tidak ditemukan.
    </div>
    ";

    // redirect ke halaman awal
    header("location: index.php");
}