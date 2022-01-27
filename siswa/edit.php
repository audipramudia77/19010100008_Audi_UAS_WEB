<!doctype html>
<html>
<head>
    <title>Tambah Data Artikel</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="alert alert-info">Edit Data Artikel</h2>

    <?php
    require 'database.php';
    if (isset($_POST['simpan'])) {
        $id_siswa=$_POST['id_siswa'];
        $txtnis = $_POST['txtnis'];
        $txtnama_siswa = $_POST['txtnama_siswa'];
        $txtjk = $_POST['txtjk'];
        $txtkelas = $_POST['txtkelas'];
        $txtprestasi = $_POST['txtprestasi'];

        $sql = "UPDATE siswa SET 
        nis='$txtnis',nama_siswa='$txtnama_siswa',jk='$txtjk',kelas='$txtkelas',prestasi='$txtprestasi' WHERE id_siswa=$id_siswa";

        $query = mysqli_query($koneksi, $sql);
        if ($query) {
            header('location: index.php');
        } else {
            echo 'Query Error : ' . mysqli_error($koneksi);
        }
    }else{
        $id_siswa=$_GET['id_siswa'];
        $query="SELECT * FROM siswa WHERE id_siswa=$id_siswa";
        $sql=mysqli_query($koneksi,$query);
        $data=mysqli_fetch_object($sql);

    }

    ?>

    <form action="" method="post">
        <input type="hidden" name="id_siswa" value="<?=$id_siswa?>">
        <div class="mb-3">
            <label>NIS</label>
            <input required type="text" name="txtnis" class="form-control" value="<?=$data->nis;?>">
        </div>

        <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" name="txtnama_siswa" class="form-control" value="<?=$data->nama_siswa;?>">
        </div>

        <div class="mb-3">
            <label>Jeni Kelamin</label>
            <select name="txtjk" class="form-control">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
                <?=$data->jk;?>
            </select>
           
        </div>

        <div class="mb-3">
            <label>Keyword</label>
            <select name="txtkelas"  class="form-control">
                <option value="Mipa-1">Mipa-1</option>
                <option value="Mipa-2">Mipa-2</option>
                <option value="Mipa-3">Mipa-3</option>
                <option value="Mipa-4">Mipa-4</option>
                <option value="Mipa-5">Mipa-5</option>
                <option value="Mipa-6">Mipa-6</option>
                <option value="Ips-1">Ips-1</option>
                <option value="Ips-2">Ips-2</option>
                <option value="ips-3">Ips-3</option>
                <?=$data->kelas;?>
            </select>
        </div>
        <div class="mb-3">
            <label>Prestasi</label>
            <input required type="text" name="txtprestasi" class="form-control" value="<?=$data->prestasi;?>">
        </div>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

</div>
</body>
</html>