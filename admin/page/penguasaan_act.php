<?php
include "../koneksi/koneksi.php";
$page = "penguasaan";

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
$nama_penguasaan = $_POST['nama_penguasaan'];
$keterangan = $_POST['keterangan'];
$que_insert = mysql_query("INSERT INTO `tbpenguasaan`(`id_penguasaan`, `nama_penguasaan`, `keterangan`) VALUES (NULL,'$nama_penguasaan','$keterangan')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
$nama_penguasaan = $_POST['nama_penguasaan'];
$keterangan = $_POST['keterangan'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbpenguasaan` SET `nama_penguasaan`='$nama_penguasaan',`keterangan`='$keterangan' WHERE `id_penguasaan`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbpenguasaan` WHERE `id_penguasaan`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>