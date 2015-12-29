<?php
include "../koneksi/koneksi.php";
$page = "jadwal";

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
  $id_dosen=$_POST['id_dosen'];
  $id_matakuliah =$_POST['id_matakuliah'];
  $id_ruang =$_POST['id_ruang'];
  $id_rombel =$_POST['id_rombel'];
  $jam_mulai=$_POST['jam_mulai'];
  $jam_selesai=$_POST['jam_selesai'];
  $id_hari=$_POST['id_hari'];
  $semester=$_POST['semester'];
  $tahun_ajaran =$_POST['tahun_ajaran'];

$que_insert = mysql_query("INSERT INTO `tbjadwal`(`id_jadwal`, `id_dosen`, `id_matakuliah`, `id_ruang`, `id_rombel`, `jam_mulai`, `jam_selesai`, `id_hari`, `semester`, `tahun_ajaran`) 
								VALUES (NULL,'$id_dosen','$id_matakuliah','$id_ruang','$id_rombel','$jam_mulai','$jam_selesai','$id_hari','$semester','$tahun_ajaran')");
header('Location: ../?page='.$page.'&in');
}

function update($page){
  $id_dosen=$_POST['id_dosen'];
  $id_matakuliah =$_POST['id_matakuliah'];
  $id_ruang =$_POST['id_ruang'];
  $id_rombel =$_POST['id_rombel'];
  $jam_mulai=$_POST['jam_mulai'];
  $jam_selesai=$_POST['jam_selesai'];
  $id_hari=$_POST['id_hari'];
  $semester=$_POST['semester'];
  $tahun_ajaran =$_POST['tahun_ajaran'];
$id = $_POST['id'];
$que_update =mysql_query("UPDATE `tbjadwal` SET `id_dosen`='$id_dosen',`id_matakuliah`='$id_matakuliah',`id_ruang`='$id_ruang',`id_rombel`='$id_rombel',`jam_mulai`='$jam_mulai',`jam_selesai`='$jam_selesai',`id_hari`='$id_hari',`semester`='$semester',`tahun_ajaran`='$tahun_ajaran' WHERE `id_jadwal`='$id'");
header('Location: ../?page='.$page.'&in');
}

function delete($page){
$id = $_GET['id'];
mysql_query("DELETE FROM `tbjadwal` WHERE `id_jadwal`='$id'");
header('Location: ../?page='.$page.'');
}
 

 ?>