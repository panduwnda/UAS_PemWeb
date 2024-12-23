<?php
include 'koneksi.php';

// Menambahkan data
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $query = "INSERT INTO users (nama, email) VALUES ('$nama', '$email')";
    mysqli_query($conn, $query);
}

// Menghapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM users WHERE id = $id";
    mysqli_query($conn, $query);
}

// Mengupdate data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $query = "UPDATE users SET nama = '$nama', email = '$email' WHERE id = $id";
    mysqli_query($conn, $query);
}

// Menampilkan data
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP - Pink Theme</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>

<body>
    <header>
        <h1>CRUD PHP</h1>
        <p>Kelola Data Anda dengan Mudah!</p>
    </header>

    <section class="form-section">
        <h2>Tambah Data</h2>
        <form method="POST" action="">
            <div class="input-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit" name="submit" class="btn btn-add">Tambah Data</button>
        </form>
    </section>

    <section class="table-section">
        <h2>Data Pengguna</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <button class="btn btn-update" onclick="openUpdateModal(<?php echo $row['id']; ?>, '<?php echo $row['nama']; ?>', '<?php echo $row['email']; ?>')">Update</button>
                            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <div id="update-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Update Data</h2>
            <form method="POST" action="">
                <input type="hidden" id="update-id" name="id">
                <div class="input-group">
                    <label for="update-nama">Nama:</label>
                    <input type="text" id="update-nama" name="nama" required>
                </div>
                <div class="input-group">
                    <label for="update-email">Email:</label>
                    <input type="email" id="update-email" name="email" required>
                </div>
                <button type="submit" name="update" class="btn btn-save">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</body>

</html>