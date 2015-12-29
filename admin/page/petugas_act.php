<?php
include "../koneksi/koneksi.php";
$page = "petugas";

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
$nip_petugas = $_POST['nip_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$ruanglab = $_POST['ruanglab'];
$que_insert = mysql_query("INSERT INTO `tbpetugas`(`id_petugas`, `nip_petugas`, `nama_petugas`,`ruanglab`) VALUES (NULL,'$nip_petugas','$nama_petugas','$ruanglab')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
$nip_petugas = $_POST['nip_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$ruanglab = $_POST['ruanglab'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbpetugas` SET `nip_petugas`='$nip_petugas',`nama_petugas`='$nama_petugas',`ruanglab`='$ruanglab' WHERE `id_petugas`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbpetugas` WHERE `id_petugas`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>