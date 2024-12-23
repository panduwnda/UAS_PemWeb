<?php
include 'koneksi.php';

// Ambil data dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
}

// Update data setelah form di-submit
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $query = "UPDATE users SET nama = '$nama', email = '$email' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="form-section">
        <h2>Update Data</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="input-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $user['nama']; ?>" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-save">Simpan Perubahan</button>
        </form>
    </section>
</body>

</html>