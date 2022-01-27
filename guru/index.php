<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Jenis Kelamin</th>
                    <th>MAPEL</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php
                require 'database.php';
                $query = "SELECT * FROM guru";
                $sql = mysqli_query($koneksi, $query);
                $no = 1;
                while ($data = mysqli_fetch_object($sql)) {
                ?>
                <tr>
                        <td> <?php echo $no++; ?> </td>
                        <td> <?php echo $data->nip; ?> </td>
                        <td> <?php echo $data->nama_guru; ?> </td>
                        <td> <?php echo $data->jk; ?> </td>
                        <td> <?php echo $data->mapel; ?> </td>
                        <td>
                            <a href="edit.php?id_guru=<?= $data->id_guru; ?>">
                                <input type="submit" value="edit" class="btn btn-warning">
                            </a>

                            <?php
                            if ($_SESSION['role'] == 'admin') {
                            ?>
                                <a href="hapus.php?id_guru=<?= $data->id_guru?>">
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