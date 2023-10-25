<?php
include "../../konfig/koneksi.php"; //include file koneksi
date_default_timezone_set('Asia/Jakarta');

//inisiasi modul dan act
$module = $_GET['module'];
$act = $_GET['act'];

// bagian insert data
if ($module == 'pinjam' and $act == 'insert') :
    // inisiasi nama fieled ke dalam variabel
    $isbn = $_POST['isbn'];
    $nisn = $_POST['nisn'];
    $kembali = $_POST['tanggal_kembali'];
    $id = date('dmyHis');
    $pinjam = date('Y-m-d');
    $status = 'pinjam';

    // query insert
    $query = "INSERT INTO muda_peminjaman (id_peminjaman, nisn, isbn, tanggal_pinjam, tanggal_kembali, status) 
    VALUES ('$id', '$nisn', '$isbn', '$pinjam', '$kembali', '$status')";

    //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
    if ($connection->query($query)) {

        //munculkan alert sukses simpan data dengan session
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Siswa Berhasil Disimpan.
        </div>
        ";

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal insert data
        echo "Data Gagal Disimpan!";
    }


//bagian hapus data siswa
elseif ($module == 'pinjam' and $act == 'delete') :

    //ambil id siswa
    $id = $_GET['id'];

    //query delete data
    $query = "DELETE FROM muda_peminjaman WHERE nisn = $id";

    //kondisi pengecekan apakah data berhasil dihapus
    if ($connection->query($query)) {

        //munculkan alert sukses hapus
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Siswa Berhasil Dihapus.
        </div>
        ";

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal hapus data
        echo "Data Gagal Dihapus!";
    }



//bagian edit siswa
elseif ($module == 'siswa' and $act == 'update') :

    //inisiasi data yang dikirim ke dalam variabel
    $id = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $jekel = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    //query update data
    $query = "UPDATE muda_siswa SET
                nama_siswa = '$nama',
                jurusan = '$jurusan',
                jenis_kelamin = '$jekel',
                no_hp = '$no_hp',
                alamat = '$alamat'
                WHERE nisn = $id";

    //kondisi pengecekan data berhasil di update
    if ($connection->query($query)) {

        //munculkan alert sukses diupdate
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Siswa Berhasil Diupdate.
        </div>
        ";

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal update data
        echo "Data Gagal Diupdate!";
    }


endif;