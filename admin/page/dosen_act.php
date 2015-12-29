<?php
include "../koneksi/koneksi.php";
$page = "dosen";

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
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$que_insert = mysql_query("INSERT INTO `tbdosen`(`id_dosen`, `nip`, `nama`) VALUES (NULL,'$nip','$nama')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbdosen` SET `nip`='$nip',`nama`='$nama' WHERE `id_dosen`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbdosen` WHERE `id_dosen`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>