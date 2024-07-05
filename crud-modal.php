<?php



session_start();
if (!isset($_SESSION['login'])) {
    echo "<script>
           alert('login dulu');
           document.location.href = 'login.php';
           </script>";

    exit;
}


include 'layout/header.php';

$title = 'Data Akun';

$data_akun = select("SELECT * FROM akun");

// tampil data berdasarkan user login
$id_akun = $_SESSION['id_akun'];
$data_bylogin = select("SELECT * FROM akun ORDER BY id_akun ASC");

if (isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0) {
        echo "<script>
        alert('data barang berhasil ditambahkan');
        document.location.href = 'crud-modal.php';
        </script>";
    } else {
        echo "<script>
            alert('data barang gagal ditambahkan');
            document.location.href = 'crud-modal.php';
            </script>";
    }
}

if (isset($_POST['ubah'])) {
    if (update_akun($_POST) > 0) {
        echo "<script>
                alert('Data Akun Berhasil DiUbah');
                document.location.href = 'crud-modal.php';
              </script>";
        echo "<script>
                alert('Data Akun Gagal DiUbah');
                document.location.href = 'crud-modal.php';
              </script>";
    }
}

?>
<div class="container mt-5">
    <h1>Data Akun </h1>
    <?php if ($_SESSION['level'] == 1) : ?>
        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
    <?php endif; ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php if ($_SESSION['level'] == 1) : ?>
                <?php foreach ($data_akun  as $akun) : ?>
                    <tr>
                        <th> <?= $no++; ?> </th>
                        <td> <?= $akun['nama']; ?></td>
                        <td> <?= $akun['username']; ?></td>
                        <td> <?= $akun['email']; ?></td>
                        <td> Passworrd Ter-enkripsi</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>"> Ubah </button>
                            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun']; ?>"> Hapus </button>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <!-- tampil data berdasarkan user login -->
                <?php foreach ($data_bylogin  as $akun) : ?>
                    <tr>
                        <th> <?= $no++; ?> </th>
                        <td> <?= $akun['nama']; ?></td>
                        <td> <?= $akun['username']; ?></td>
                        <td> <?= $akun['email']; ?></td>
                        <td> Passworrd Ter-enkripsi</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>"> Ubah </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama </label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama">Username </label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama">Email </label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama">Password </label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level </label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">Pilih Level</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator Barang</option>
                            <option value="3">Operator Mahasiswa</option>
                        </select>
                    </div>
                    <input type="hidden" name="tambah" value="1">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- modal hapus -->
<?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-danger text-white">
                    <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger" id="exampleModalLabel">Hapus Akun</a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p> yakin Anda ingin Menghapus Data Akun : <?= $akun['nama'] ?> ? </p>

                </div>
                <input type="hidden" name="tambah" value="1">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger" id="exampleModalLabel">Hapus Akun</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama </label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama">Username </label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama">Email </label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama">Password </label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level </label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">Pilih Level</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator Barang</option>
                            <option value="3">Operator Mahasiswa</option>
                        </select>
                    </div>
                    <input type="hidden" name="tambah" value="1">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">


                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required value="<?= $akun['nama']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required value="<?= $akun['username']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required value="<?= $akun['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password<small>(Masukan password baru/lama)</small></label>
                            <input type="password" name="password" id="password" class="form-control" required minlength="6">
                        </div>
                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <?php $level = $akun['akun']; ?>
                                <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                                <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php include 'layout/footer.php'; ?>