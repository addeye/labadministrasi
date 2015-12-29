<?php
include "../koneksi/koneksi.php";
$page = "perbaikan";

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
	case 'valid':
	valid($page);
	break;
}

function insert($page) {
	$id_barang=$_POST['id_barang'];
	$jenis_kerusakan=$_POST['jenis_kerusakan'];
	$jenis_pemeliharaan=$_POST['jenis_pemeliharaan'];
	$pemelihara=$_POST['pemelihara'];
	$tanggal_pemeliharaan=$_POST['tanggal_pemeliharaan'];
	$biaya_pemeliharaan=$_POST['biaya_pemeliharaan'];
	$bukti_pemeliharaan=$_POST['bukti_pemeliharaan'];
	$keterangan =$_POST['keterangan'];
	$sumber_dana=$_POST['sumber_dana'];
	$semester = $_POST['semester'];
	$tahun_anggaran = $_POST['tahun_anggaran'];

	$que_insert = mysql_query("INSERT INTO `tbperbaikan`(`id_perbaikan`, `id_barang`, `jenis_kerusakan`, `jenis_pemeliharaan`, `pemelihara`, `tanggal_pemeliharaan`, `biaya_pemeliharaan`, `bukti_pemeliharaan`, `keterangan`, `sumber_dana`,semester,tahun_anggaran) 
		VALUES (NULL,'$id_barang','$jenis_kerusakan','$jenis_pemeliharaan','$pemelihara','$tanggal_pemeliharaan','$biaya_pemeliharaan','$bukti_pemeliharaan','$keterangan','$sumber_dana','$semester','$tahun_anggaran')");
	header('Location: ../?page='.$page.'&in');
}

function update($page){
	$id_barang=$_POST['id_barang'];
	$jenis_kerusakan=$_POST['jenis_kerusakan'];
	$jenis_pemeliharaan=$_POST['jenis_pemeliharaan'];
	$pemelihara=$_POST['pemelihara'];
	$tanggal_pemeliharaan=$_POST['tanggal_pemeliharaan'];
	$biaya_pemeliharaan=$_POST['biaya_pemeliharaan'];
	$bukti_pemeliharaan=$_POST['bukti_pemeliharaan'];
	$keterangan =$_POST['keterangan'];
	$sumber_dana=$_POST['sumber_dana'];
	$semester = $_POST['semester'];
	$tahun_anggaran = $_POST['tahun_anggaran'];
	$id = $_POST['id'];
	$que_update =mysql_query("UPDATE `tbperbaikan` SET `id_barang`='$id_barang',`jenis_kerusakan`='$jenis_kerusakan',`jenis_pemeliharaan`='$jenis_pemeliharaan',`pemelihara`='$pemelihara',`tanggal_pemeliharaan`='$tanggal_pemeliharaan',`biaya_pemeliharaan`='$biaya_pemeliharaan',`bukti_pemeliharaan`='$bukti_pemeliharaan',`keterangan`='$keterangan',`sumber_dana`='$sumber_dana',semester='$semester',tahun_anggaran='$tahun_anggaran' WHERE `id_perbaikan`='$id'");
	header('Location: ../?page='.$page.'&in');
}

function delete($page){
	$id = $_GET['id'];
	mysql_query("DELETE FROM `tbperbaikan` WHERE `id_perbaikan`='$id'");
	header('Location: ../?page='.$page.'');
}

function valid($page){
	$id = $_GET['id'];
	$v = $_GET['v'];
	if($v=='0'){
		$v='1';
	} else {
		$v='0';
	}
	mysql_query("UPDATE tbperbaikan SET valid='$v' WHERE id_perbaikan='$id'");
	header('Location: ../?page='.$page.'');
}


?>