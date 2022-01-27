<?php
require 'database.php';
$id_guru=$_GET['id_guru'];
$query="DELETE FROM guru WHERE id_guru=$id_guru";
$sql=mysqli_query($koneksi,$query);
if ($sql){
    echo "data berhasil dihapus";
    header('location:index.php');
}else{
    echo "data gagal terhapus";
}
