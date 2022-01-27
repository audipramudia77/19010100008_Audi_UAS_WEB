<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<div class="container">
<h2 class="alert alert-info">Tambah Data Artikel</h2>

<?php
    require 'database.php';
    if (isset($_POST['simpan'])) {
        $txtnip = $_POST['txtnip'];
        $txtnama_guru = $_POST['txtnama_guru'];
        $txtjk = $_POST['txtjk'];
        $txtmapel = $_POST['txtmapel'];

        $sql = "INSERT INTO guru VALUES (NULL, '$txtnip', '$txtnama_guru', '$txtjk', '$txtmapel')";

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
    <label>NIP</label>
    <input required type="text" name="txtnip" class="form-control">
</div>

<div class="mb-3">
    <label>Nama Guru</label>
    <input type="text" name="txtnama_guru" class="form-control">
</div>

<div class="mb-3">
    <label>Jenis Kelamin</label>
    <select name="txtjk">
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
</div>

<div class="mb-3">
    <label>MAPEL</label>
    <select name="txtmapel">
        <option value="Biologi">Biologi</option>
        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
        <option value="Bahasa Inggris">Bahasa Inggris</option>
        <option value="Matematika">Matematika</option>
        <option value="Ekonomi">Ekonomi</option>
        <option value="Penjaskes">Penjaskes</option>
        <option value="Seni Budaya">Seni Budaya</option>
        <option value="Sosiologi">Sosiologi</option>
        <option value="Agama">Agama</option>
    </select>
</div>

<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
<a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>
    
</body>
</html>