<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('location: login.php');
}

?>

<!doctype html>
<html>

<head>
    <title>Data Artikel</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="alert alert-info">

            Data Siswa Berprestasi SMA 1 Gerung | Welcome :
            <?php echo $_SESSION['nama_user']; ?>

        </h2>

        <a href="tambah.php" class="btn btn-info">Tambah Data</a>

        <a href="login.php" class="btn btn-secondary float-end mb-3">Logout</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Prestasi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'database.php';
                $query = "SELECT * FROM siswa";
                $sql = mysqli_query($koneksi, $query);
                $no = 1;
                while ($data = mysqli_fetch_object($sql)) {
                ?>

                    <tr>
                        <td> <?php echo $no++; ?> </td>
                        <td> <?php echo $data->nis; ?> </td>
                        <td> <?php echo $data->nama_siswa; ?> </td>
                        <td> <?php echo $data->jk; ?> </td>
                        <td> <?php echo $data->kelas; ?> </td>
                        <td> <?php echo $data->prestasi; ?> </td>
                   
                        <td><img src="siswa/img/<?php echo $data->gambar; ?>" alt=""></td>
                        <td>
                            <a href="edit.php?id_siswa=<?= $data->id_siswa; ?>">
                                <input type="submit" value="edit" class="btn btn-warning">
                            </a>

                            <?php
                            if ($_SESSION['role'] == 'admin') {
                            ?>
                                <a href="hapus.php?id_siswa=<?= $data->id_siswa?>">
                                    <input type="submit" value="hapus" onclick="confirm('yakin hapus data?')" class="btn btn-danger">
                                </a>
                            <?php
                            }
                            ?>

                        </td>

                    </tr>

                <?php
                }
                ?>


            </tbody>
        </table>
    </div>
</body>

</html>