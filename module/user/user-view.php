<div class='card'>
        <div class='card-header'>
            <h3>Data User</h3>
        </div>
        <div class='card-body'>
           <!-- Button trigger modal -->
     <button type="button" class="btn btn-primary px-3 mb-3" data-bs-toggle="modal" data-bs-target="#userModal">
        Tambah Data Siswa
        </button>

        <!-- tabel user -->
        <table class="table table-striped">
            <thead>
                <th>No.</th>
                <th>Nama User</th>
                <th>Username</th>
                <th>Lever</th>
                <th>Aksi</th>
            </thead>
            <tbody>
            <tbody>
                <?php
                $no = 1;
                // query select data siswa 
                $query = "SELECT * FROM muda_user";
                $conn =mysqli_query($connection, $query);
                while ($data = mysqli_fetch_array($conn)){
                    ?>
                    <!-- fetch data user -->
                    <tr>
                        <td><?= $no;?></td>
                        <td><?= $data ['nama_user'];?></td>
                        <td><?= $data ['username'];?></td>
                        <td><?= $data ['level'];?></td>
                        <td>
                            <a href="" class="btn btn-danger">Hapus</a>
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

    <!-- Modal User-->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="module/user/aksi.php?module=user&act=insert" method="post">
          <!-- form input data siswa -->
        <div class="mb-3">
            <label for="nama_user" clas="form-label">Nama Lengkap User</label>
            <input type="text" name="nama_user" id=""class="form-control"required>
        </div>
        <div class="mb-3">
            <label for="username" clas="form-label">Username</label>
            <input type="text" name="username" id=""class="form-control"required>
        </div>
        <div class="mb-3">
            <label for="password" clas="form-label">Password</label>
            <input type="password" name="pass" id=""class="form-control"required>
        </div>
        <div class="mb-3">
            <label for="level" clas="form-label">Level</label>
            <select name="level" class="form-select">
            <option value="">- Pilih Level -</option>
            <option value="admin">Administrator</option>
            <option value="user">User</option>
            </select>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>