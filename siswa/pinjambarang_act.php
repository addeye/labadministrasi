<?php
include "../admin/koneksi/koneksi.php";
$page = "pinjambarang";

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
  $id_mahasiswa = $_POST['id_mahasiswa'];
  $id_barang = $_POST['id_barang'];
  $tgl_pakai=$_POST['tgl_pakai'];
  $jam_mulai=$_POST['jam_mulai'];
  $jam_akhir=$_POST['jam_akhir'];
  $id_ruanglab = $_POST['id_ruanglab'];

$que_insert = mysql_query("INSERT INTO `tbpinjambarang`(`id_pinjambarang`, `id_mahasiswa`, `id_barang`, `tgl_pakai`, `jam_mulai`, `jam_akhir`, `id_ruanglab`) 
									VALUES (NULL,'$id_mahasiswa','$id_barang','$tgl_pakai','$jam_mulai','$jam_akhir','$id_ruanglab')");
header('Location: ../?siswa='.$page.'&in');
}

function update($page){
  $id_mahasiswa = $_POST['id_mahasiswa'];
  $id_barang = $_POST['id_barang'];
  $tgl_pakai=$_POST['tgl_pakai'];
  $jam_mulai=$_POST['jam_mulai'];
  $jam_akhir=$_POST['jam_akhir'];
  $id_ruanglab = $_POST['id_ruanglab'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbpinjambarang` SET `id_mahasiswa`='$id_mahasiswa',`id_barang`='$id_barang',`tgl_pakai`='$tgl_pakai',`jam_mulai`='$jam_mulai',`jam_akhir`='$jam_akhir',`id_ruanglab`='$id_ruanglab' WHERE `id_pinjambarang`='$id'");
header('Location: ../?siswa='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbpinjambarang` WHERE `id_pinjambarang`='$id'");
header('Location: ../?siswa='.$page.'');
}
 

 ?>