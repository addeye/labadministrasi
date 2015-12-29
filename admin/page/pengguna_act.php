<?php
include "../koneksi/koneksi.php";
$page = "pengguna";

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
$id_petugas = $_POST['id_petugas'];
$password = $_POST['password'];
$id_level = $_POST['id_level'];
$que_insert = mysql_query("INSERT INTO `tbpengguna`(`id_pengguna`, `id_petugas`, `password`, `id_level`) VALUES (NULL,'$id_petugas','$password','$id_level')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
$id_petugas = $_POST['id_petugas'];
$password = $_POST['password'];
$id_level = $_POST['id_level'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbpengguna` SET `id_petugas`='$id_petugas',`password`='$password',`id_level`='$id_level' WHERE `id_pengguna`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbpengguna` WHERE `id_pengguna`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>