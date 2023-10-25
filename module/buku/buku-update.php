<?php
// inisialisasi variabel untuk tangkap NISN menggunakan metjod GET
$isbn = $_GET['id'];

// query untuk diambil dara siswa sesuai NISN
$query = "SELECT * FROM muida_buku";
$conn  = mysqli_query($connection, $query);
$data  = mysqli_fetch_array($conn);
?>

<div class='card'>
    <div class='card-header'>
        <h1>Edit Data Buku</h1>
    </div>
    <div class='card-body'>
        <p>Edit Data Buku</p>
        <form action="module/buku/aksi.php?module=buku&act=update" method="post">
            <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" name="isbn" id="" class="form-control" value="<?= $data['isbn']; ?>" readonly>
                </div>
            <div class="mb-3">
                    <label for="judul_buku" class="form-label">Judul Buku</label>
                    <input type="text" name="judul_buku" id="" class="form-control" value="<?= $data['judul_buku']; ?>">
                </div>
                <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang" id="" class="form-control" value="<?= $data['pengarang']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" id="" class="form-control" value="<?= $data['penerbit']; ?>">
                    </div>
            <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <select name="tahun_terbit" class="form-select">
                        <option value=""></option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
            </div>

            <div class="mb-3">
                    <label for="jenis_buku" class="form-label">Jenis Buku</label>
                    <select name="jenis_buku" class="form-select">
                    <option value="<?= $data['jenis_buku']; ?>" selected><?= $data['jenis_buku'];?></option>
                        <option value="">Jenis Buku</option>
                        <option value="biografi">Biografi</option>
                        <option value="novel">Novel</option>
                    </select>
            </div>

            <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" name="stok" class="form-control" value="<?= $data['stok']; ?>">
                </div>
            </div>
            <div class="mb-3">
                <a href="?module=buku" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>

        </form>
    </div>
</div>