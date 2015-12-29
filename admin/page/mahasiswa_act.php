<?php
include "../koneksi/koneksi.php";
$page = "mahasiswa";

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
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$id_rombel = $_POST['id_rombel'];
$que_insert = mysql_query("INSERT INTO `tbmahasiswa`(`id_mahasiswa`, `nim`, `nama`, `id_rombel`) VALUES (NULL,'$nim','$nama','$id_rombel')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$id_rombel = $_POST['id_rombel'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbmahasiswa` SET `nim`='$nim',`nama`='$nama',`id_rombel`='$id_rombel' WHERE `id_mahasiswa`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbmahasiswa` WHERE `id_mahasiswa`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>