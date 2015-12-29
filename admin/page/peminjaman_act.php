<?php
include "../koneksi/koneksi.php";
$page = "peminjaman";

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
  $id_mahasiswa=$_POST['id_mahasiswa'];
  $id_ruanglab =$_POST['id_ruanglab'];
  $tgl_pakai =$_POST['tgl_pakai'];
  $jam_mulai=$_POST['jam_mulai'];
  $jam_akhir=$_POST['jam_akhir'];

$que_insert = mysql_query("INSERT INTO `tbpeminjaman`(`id_peminjaman`, `id_mahasiswa`, `id_ruanglab`, `tgl_pakai`, `jam_mulai`, `jam_akhir`) 
                            VALUES (NULL,'$id_mahasiswa','$id_ruanglab','$tgl_pakai','$jam_mulai','$jam_akhir')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
  $id_mahasiswa=$_POST['id_mahasiswa'];
  $id_ruanglab =$_POST['id_ruanglab'];
  $tgl_pakai =$_POST['tgl_pakai'];
  $jam_mulai=$_POST['jam_mulai'];
  $jam_akhir=$_POST['jam_akhir'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbpeminjaman` SET `id_mahasiswa`='$id_mahasiswa',`id_ruanglab`='$id_ruanglab',`tgl_pakai`='$tgl_pakai',`jam_mulai`='$jam_mulai',`jam_akhir`='$jam_akhir' WHERE `id_peminjaman`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbpeminjaman` WHERE `id_peminjaman`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>