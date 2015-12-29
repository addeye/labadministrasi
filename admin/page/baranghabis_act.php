<?php
include "../koneksi/koneksi.php";
$page = "baranghabis";

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
	$tanggal_terima=$_POST['tanggal_terima'];
	$nosuratbon=$_POST['nosuratbon'];
	$tanggalsuratbon = $_POST['tanggalsuratbon'];
	$kegunaan = $_POST['kegunaan'];
	$jumlah = $_POST['jumlah'];
	$nama_barang=$_POST['nama_barang'];
	$harga_satuan=$_POST['harga_satuan'];
	$tanggal_penyerahan=$_POST['tanggal_penyerahan'];
	$id_ruanglab=$_POST['id_ruanglab'];  
	$keterangan=$_POST['keterangan'];
	$semester=$_POST['semester'];
	$tahun_anggaran=$_POST['tahun_anggaran'];

	$que_insert = mysql_query("INSERT INTO `tbbaranghabis`(`id_baranghabis`, `tanggal_terima`, `nosuratbon`, `tanggalsuratbon`, `kegunaan`, `jumlah`, `nama_barang`, `harga_satuan`, `tanggal_penyerahan`, `id_ruanglab`, `keterangan`, `semester`, `tahun_anggaran`) 
													VALUES (NULL,'$tanggal_terima','$nosuratbon','$tanggalsuratbon','$kegunaan','$jumlah','$nama_barang','$harga_satuan','$tanggal_penyerahan','$id_ruanglab','$keterangan','$semester','$tahun_anggaran')");
	header('Location: ../?page='.$page.'&in');
}

function update($page){
	$tanggal_terima=$_POST['tanggal_terima'];
	$nosuratbon=$_POST['nosuratbon'];
	$tanggalsuratbon = $_POST['tanggalsuratbon'];
	$kegunaan = $_POST['kegunaan'];
	$jumlah = $_POST['jumlah'];
	$nama_barang=$_POST['nama_barang'];
	$harga_satuan=$_POST['harga_satuan'];
	$tanggal_penyerahan=$_POST['tanggal_penyerahan'];
	$id_ruanglab=$_POST['id_ruanglab'];  
	$keterangan=$_POST['keterangan'];
	$semester=$_POST['semester'];
	$tahun_anggaran=$_POST['tahun_anggaran'];
	$id = $_POST['id'];
	$que_update =mysql_query("UPDATE `tbbaranghabis` SET `tanggal_terima`='$tanggal_terima',`nosuratbon`='$nosuratbon',`tanggalsuratbon`='$tanggalsuratbon',`kegunaan`='$kegunaan',`jumlah`='$jumlah',`nama_barang`='$nama_barang',`harga_satuan`='$harga_satuan',`tanggal_penyerahan`='$tanggal_penyerahan',`id_ruanglab`='$id_ruanglab',`keterangan`='$keterangan',`semester`='$semester',`tahun_anggaran`='$tahun_anggaran' WHERE `id_baranghabis`='$id'");
	header('Location: ../?page='.$page.'&in');
}

function delete($page){
	$id = $_GET['id'];
	mysql_query("DELETE FROM `tbbaranghabis` WHERE `id_baranghabis`='$id'");
	header('Location: ../?page='.$page.'');
}


?>