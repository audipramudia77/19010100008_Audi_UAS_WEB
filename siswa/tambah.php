<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('location: login.php');
}

?>
<!doctype html>
<html>
<head>
    <title>Tambah Data Artikel</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="alert alert-info">Tambah Data Artikel</h2>

    <?php
    require 'database.php';
    if (isset($_POST['simpan'])) {
        $txtnis = $_POST['txtnis'];
        $txtnama_siswa = $_POST['txtnama_siswa'];
        $txtjk = $_POST['txtjk'];
        $txtkelas = $_POST['txtkelas'];
        $txtprestasi = $_POST['txtprestasi'];
        $txtgambar = $_POST['txtgambar'];

        $sql = "INSERT INTO siswa VALUES (NULL, '$txtnis', '$txtnama_siswa', '$txtjk', '$txtkelas','$txtprestasi','$txtgambar')";

        $query = mysqli_query($koneksi, $sql);
        if ($query) {
            header('location: index.php');
        } else {
            echo 'Query Error : ' . mysqli_error($koneksi);
        }
    }
    ?>

    <form action="" method="post">

        <div class="mb-3">
            <label>NIS</label>
            <input required type="text" name="txtnis" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" name="txtnama_siswa" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="txtjk">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select name="txtkelas">
                <option value="Mipa-1">Mipa-1</option>
                <option value="Mipa-2">Mipa-2</option>
                <option value="Mipa-3">Mipa-3</option>
                <option value="Mipa-4">Mipa-4</option>
                <option value="Mipa-5">Mipa-5</option>
                <option value="Mipa-6">Mipa-6</option>
                <option value="Ips-1">Ips-1</option>
                <option value="Ips-2">Ips-2</option>
                <option value="ips-3">Ips-3</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Prestasi</label>
            <input required type="text" name="txtprestasi" class="form-control">
        </div>
        <div class="form-group">
                                <label for="exampleInputFile">Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="txtgambar">
                                        <label class="custom-file-label" id="gambar" for="exampleInputFile">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

</div>
</body>
</html>