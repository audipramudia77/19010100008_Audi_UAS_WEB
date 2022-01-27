<?php
require 'database.php';
$id_siswa=$_GET['id_siswa'];
$query="DELETE FROM siswa WHERE id_siswa=$id_siswa";
$sql=mysqli_query($koneksi,$query);
if ($sql){
    echo "data berhasil dihapus";
    header('location:index.php');
}else{
    echo "data gagal terhapus";
}
