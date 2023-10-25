<div class='card'>
    <div class='card-header'>
        <h3>Data Buku</h3>
    </div>
    <div class='card-body'>
        <!-- munculkan pesan alert -->
        <?php
        if (!empty($_SESSION['alert'])) :
            echo $_SESSION['alert'];
        endif;
        unset($_SESSION['alert']);
        ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary px-3 mb-3" data-bs-toggle="modal" data-bs-target="#bukuModal">
            Tambah Data Buku
        </button>
        <!-- bagian table siswa -->
        <table class="table table-striped">
            <thead>
                <th>No.</th>
                <th>ISBN</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Jenis Buku</th>
                <th>Stok</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Query select data siswa
                $query = "SELECT * FROM muida_buku";
                $conn =mysqli_query($connection, $query);
                while ($data = mysqli_fetch_array($conn)){
                ?>
                    <!-- fetch data buku -->
                    <tr>
                        <td><?= $no; ?>.</td>
                        <td><?= $data['isbn'];?></td>
                        <td><?= $data['judul_buku']; ?></td>
                        <td><?= $data['pengarang']; ?></td>
                        <td><?= $data['penerbit']; ?></td>
                        <td><?= $data['tahun_terbit']; ?></td>
                        <td><?= $data['jenis_buku']; ?></td>
                        <td><?= $data['stok']; ?></td>
                        <td>
                            <a href="?module=edit-buku&id=<?= $data['isbn']; ?>" class="btn btn-warning">EDIT</a>
                            <a onclick="return confirm('Apakah anda yakin menghapus <?= $data['judul_buku'] ?> ?')" href="module/buku/aksi.php?module=buku&act=delete&id=<?= $data["isbn"]; ?>" class="btn btn-danger">HAPUS</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal siswa -->
<div class="modal fade" id="bukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="module/buku/aksi.php?module=buku&act=insert" method="post">
                    <!-- form input data siswa -->
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" name="isbn" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" id="" class="form-control" required>
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
                            <option value="2022">2023</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_buku" class="form-label">Jenis Buku</label>
                        <select name="jenis_buku" class="form-select">
                            <option value=""></option>
                            <option value="biografi">Biografi</option>
                            <option value="novel">Novel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" name="stok" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal hapus siswa -->
<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>