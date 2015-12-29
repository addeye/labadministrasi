<?php
include "../koneksi/koneksi.php";
$page = "rekom";

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
	$nama_barang = $_POST['nama_barang'];
	$jumlah_unit = $_POST['jumlah_unit'];
	$harga_satuan = $_POST['harga_satuan'];
	$keterangan = $_POST['keterangan'];
	$semester = $_POST['semester'];
	$tahun_anggaran = $_POST['tahun_anggaran'];

	$que_insert = mysql_query("INSERT INTO `tbrekom`(`id_rekom`, `nama_barang`, `jumlah_unit`, `harga_satuan`, `keterangan`, `semester`, `tahun_anggaran`, `validasi`) 
									VALUES (NULL,'$nama_barang','$jumlah_unit','$harga_satuan','$keterangan','$semester','$tahun_anggaran','0')");
	header('Location: ../?page='.$page.'&in');
}

function update($page){
	$nama_barang = $_POST['nama_barang'];
	$jumlah_unit = $_POST['jumlah_unit'];
	$harga_satuan = $_POST['harga_satuan'];
	$keterangan = $_POST['keterangan'];
	$semester = $_POST['semester'];
	$tahun_anggaran = $_POST['tahun_anggaran'];
	$id = $_POST['id'];
	$que_update =mysql_query("UPDATE `tbrekom` SET `nama_barang`='$nama_barang',`jumlah_unit`='$jumlah_unit',`harga_satuan`='$harga_satuan',`keterangan`='$keterangan',`semester`='$semester',`tahun_anggaran`='$tahun_anggaran' WHERE `id_rekom`='$id'");
	header('Location: ../?page='.$page.'&in');
}

function delete($page){
	$id = $_GET['id'];
	mysql_query("DELETE FROM `tbrekom` WHERE `id_rekom`='$id'");
	header('Location: ../?page='.$page.'');
}


?>