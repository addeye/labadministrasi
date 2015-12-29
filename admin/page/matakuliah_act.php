<?php
include "../koneksi/koneksi.php";
$page = "matakuliah";

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
$matakuliah = $_POST['matakuliah'];
$kode_matakuliah = $_POST['kode_matakuliah'];
$que_insert = mysql_query("INSERT INTO `tbmatakuliah`(`id_matakuliah`, `kode_matakuliah`, `matakuliah`) VALUES (NULL,'$kode_matakuliah','$matakuliah')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
$matakuliah = $_POST['matakuliah'];
$kode_matakuliah = $_POST['kode_matakuliah'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbmatakuliah` SET `kode_matakuliah`='$kode_matakuliah',`matakuliah`='$matakuliah' WHERE `id_matakuliah`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbmatakuliah` WHERE `id_matakuliah`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>