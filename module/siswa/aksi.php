<?php
include "../../konfig/koneksi.php"; //include file koneksi

//inisiasi module dan act
$module = $_GET['module'];
$act    = $_GET['act'];

//bagian insert data 
if ($module == 'siswa' AND $act == 'insert') :
//inisiasi nama field ke dalam variabel
$nisn    = $_POST['nisn'];
$nama    = $_POST['nama_siswa'];
$jurusan = $_POST['jurusan'];
$jekel   = $_POST['jenis_kelamin'];
$no_hp   = $_POST['no_hp'];
$alamat  = $_POST['alamat'];

//query insert
    $query = "INSERT INTO muda_siswa (nisn, nama_siswa, jurusan, jenis_kelamin, alamat, no_hp)
        VALUES ('$nisn', '$nama', '$jurusan', '$jekel', '$alamat', '$no_hp')";
        
// kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if ($connection->query($query)) {

    //munculkan alert sukses simpan data dengan session
    session_start();
    $_SESSION["alert"] = "
    <div class='alert alert-success' role='alert'>
    Data siswa berhasil disimpan.
    </div>
    ";

    //radirect ke halaman awal
    header("location: ../../media.php?module=".$module);
}else{

    //pesan error 
    echo "data google disimpan";
}

// bagian hapus data siswa
elseif ($module == 'siswa' and $act == 'delete') :

    // ambil id siswa
    $id = $_GET['id'];

    //query delete data
    $query = "DELETE from muda_siswa WHERE nisn = $id";

    // kondisi pengecekan apakah data berhasil dihapus
if ($connection->query($query)) {

    //munculkan alert sukses hapus
    session_start();
    $_SESSION["alert"] = "
    <div class='alert alert-success' role='alert'>
    Data siswa berhasil disimpan.
    </div>
    ";

    //radirect ke halaman awal
    header("location: ../../media.php?module=".$module);
}else{

    //pesan error 
    echo "data google disimpan";
}

// bagian edit siswa
elseif ($module == 'siswa' and $act == 'update') :

    // inisialisasi data yang dikirim kedalam variabel
    $id      = $_POST['nisn'];
    $nama    = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $jekel   = $_POST['jenis_kelamin'];
    $no_hp   = $_POST['no_hp'];
    $alamat  = $_POST['alamat'];

    // query update data
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
        header("location: ../../media.php?module=".$module);
    } else {

        //pesan error gagal update data
        echo "Data Gagal Diupdate!";
    }

                
endif;