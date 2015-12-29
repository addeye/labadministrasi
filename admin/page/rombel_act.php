<?php
include "../koneksi/koneksi.php";
$page = "rombel";

if(isset($_POST['aksi'])){
	$aksi = $_POST['aksi'];
} else {
	$aksi = $_GET['aksi'];
}

switch ($aksi) {
	case 'insert':
		insert($page);
		break;
	case 'update':
		update($page);
		break;
	case 'delete':
		delete($page);
		break;
}

function insert($page) {
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$kelas = $_POST['kelas'];
$que_insert = mysql_query("INSERT INTO `tbrombel`(`id_rombel`, `prodi`, `angkatan`, `kelas`) VALUES (NULL,'$prodi','$angkatan','$kelas')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$kelas = $_POST['kelas'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbrombel` SET `prodi`='$prodi',`angkatan`='$angkatan',`kelas`='$kelas' WHERE `id_rombel`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbrombel` WHERE `id_rombel`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>