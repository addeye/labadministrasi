<?php
include "../koneksi/koneksi.php";
$page = "tahunajaran";

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
$tahunajaran = $_POST['tahunajaran'];
$que_insert = mysql_query("INSERT INTO `tbtahunajaran`(`id_tahunajaran`, `tahunajaran`) VALUES (NULL,'$tahunajaran')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
$tahunajaran = $_POST['tahunajaran'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbtahunajaran` SET `tahunajaran`='$tahunajaran' WHERE `id_tahunajaran`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbtahunajaran` WHERE `id_tahunajaran`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>