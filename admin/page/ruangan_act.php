<?php
include "../koneksi/koneksi.php";
if(isset($_POST['aksi'])){
	$aksi = $_POST['aksi'];
} else {
	$aksi = $_GET['aksi'];
}

switch ($aksi) {
	case 'insert':
		insert();
		break;
	case 'update':
		update();
		break;
	case 'delete':
		delete();
		break;
}

function insert() {
$nama_lab = $_POST['nama_lab'];
$kode_lab = $_POST['kode_lab'];
$que_insert = mysql_query("INSERT INTO `tbruanglab`(`id_ruanglab`, `kode_lab`, `nama_lab`) VALUES (NULL,'$kode_lab','$nama_lab')");
header('Location: ../?page=ruangan&in');
}

function update(){
$nama_lab = $_POST['nama_lab'];
$kode_lab = $_POST['kode_lab'];
$id_ruanglab = $_POST['id'];
$que_update =mysql_query("UPDATE `tbruanglab` SET `kode_lab`='$kode_lab',`nama_lab`='$nama_lab' WHERE `id_ruanglab`='$id_ruanglab'");
header('Location: ../?page=ruangan&in');
}

function delete(){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbruanglab` WHERE id_ruanglab='$id'");
header('Location: ../?page=ruangan');
}
 

 ?>