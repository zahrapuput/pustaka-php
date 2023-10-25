<?php
include "../../konfig/koneksi.php"; //include file koneksi

//inisiasi modul dan act
$module = $_GET['module'];
$act = $_GET['act'];

//cek modul dan act
if ($module == 'user' and $act == 'insert') :

    //inisialisasi data ke dalam variabel
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    //fungsi hash password 
    $password = password_hash($pass, PASSWORD_DEFAULT);

    //query insert user
    $query = "INSERT INTO muda_user (nama_user, username, password, level, is_active)
    VALUES ('$nama', '$username', '$password', '$level', '1')";

    $connection->query($query);

endif;