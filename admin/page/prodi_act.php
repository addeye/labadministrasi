<?php
include "../koneksi/koneksi.php";
$page = "prodi";

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
$nama_prodi = $_POST['nama_prodi'];
$que_insert = mysql_query("INSERT INTO `tbprodi`(`id_prodi`, `nama_prodi`) VALUES (NULL,'$nama_prodi')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
$nama_prodi = $_POST['nama_prodi'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbprodi` SET `nama_prodi`='$nama_prodi' WHERE `id_prodi`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbprodi` WHERE `id_prodi`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>