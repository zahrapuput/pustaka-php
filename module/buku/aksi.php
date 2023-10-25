<?php
include "../../konfig/koneksi.php"; //include file koneksi

//inisiasi modul dan act
$module = $_GET['module'];
$act = $_GET['act'];

// bagian insert data
if ($module == 'buku' and $act == 'insert') :
    // inisiasi nama fieled ke dalam variabel
    $isbn = $_POST['isbn'];
    $julbuk = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $jenis = $_POST['jenis_buku'];
    $stok = $_POST['stok'];

    // query insert
    $query = "INSERT INTO muida_buku (isbn, judul_buku, pengarang, penerbit, tahun_terbit, jenis_buku, stok) 
    VALUES ('$isbn', '$julbuk', '$pengarang', '$penerbit', '$tahun', '$jenis', '$stok')";

    //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
    if ($connection->query($query)) {

        //munculkan alert sukses simpan data dengan session
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data buku berhasil disimpan.
        </div>
        ";

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal insert data
        echo "Data Gagal Disimpan!";
    }


//bagian hapus data siswa
elseif ($module == 'buku' and $act == 'delete') :

    //ambil id siswa
    $id = $_GET['id'];

    //query delete data
    $query = "DELETE FROM muida_buku WHERE isbn = $id";

    //kondisi pengecekan apakah data berhasil dihapus
    if ($connection->query($query)) {

        //munculkan alert sukses hapus
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Buku Berhasil Dihapus.
        </div>
        ";

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal hapus data
        echo "Data Gagal Dihapus!";
    }



//bagian edit siswa
elseif ($module == 'buku' and $act == 'update') :

    //inisiasi data yang dikirim ke dalam variabel
    $isbn = $_POST['isbn'];
    $julbuk = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $thun = $_POST['tahun_terbit'];
    $jenis = $_POST['jenis_buku'];
    $stok = $_POST['stok'];

    //query update data
    $query = "UPDATE muida_buku SET
                judul_buku = '$julbuk',
                pengarang = '$pengarang',
                penerbit = '$penerbit',
                tahun_terbit = '$thun',
                jenis_buku = '$jenis',
                stok = '$stok'
                WHERE isbn = '$isbn'";

    //kondisi pengecekan data berhasil di update
    if ($connection->query($query)) {

        //munculkan alert sukses diupdate
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Buku Berhasil Diupdate.
        </div>
        ";

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal update data
        echo "Data Gagal Diupdate!";
    }


endif;