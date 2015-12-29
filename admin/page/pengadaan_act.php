<?php
include "../koneksi/koneksi.php";
$page = "pengadaan";

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
  $nama_barang=$_POST['nama_barang'];
  $jenis_barang=$_POST['jenis_barang'];
  $spk_tanggal = $_POST['spk_tanggal'];
  $spk_nomor = $_POST['spk_nomor'];
  $kuitansi_tanggal = $_POST['kuitansi_tanggal'];
  $kuitansi_nomor=$_POST['kuitansi_nomor'];
  $jumlah_barang=$_POST['jumlah_barang'];
  $harga_satuan=$_POST['harga_satuan'];
  $unit=$_POST['unit'];  
  $keterangan=$_POST['keterangan'];
  $id_penguasaan=$_POST['id_penguasaan'];
  $semester=$_POST['semester'];
  $tahun_anggaran=$_POST['tahun_anggaran'];

	$que_insert = mysql_query("INSERT INTO `tbpengadaan`(`id_pengadaan`, `nama_barang`, `jenis_barang`, `spk_tanggal`, `spk_nomor`, `kuitansi_tanggal`, `kuitansi_nomor`, `jumlah_barang`, `harga_satuan`, `unit`, `keterangan`, `id_penguasaan`, `semester`, `tahun_anggaran`) 
										VALUES (NULL,'$nama_barang','$jenis_barang','$spk_tanggal','$spk_nomor','$kuitansi_tanggal','$kuitansi_nomor','$jumlah_barang','$harga_satuan','$unit','$keterangan','$id_penguasaan','$semester','$tahun_anggaran')");
	header('Location: ../?page='.$page.'&in');
}

function update($page){
  $nama_barang=$_POST['nama_barang'];
  $jenis_barang=$_POST['jenis_barang'];
  $spk_tanggal = $_POST['spk_tanggal'];
  $spk_nomor = $_POST['spk_nomor'];
  $kuitansi_tanggal = $_POST['kuitansi_tanggal'];
  $kuitansi_nomor=$_POST['kuitansi_nomor'];
  $jumlah_barang=$_POST['jumlah_barang'];
  $harga_satuan=$_POST['harga_satuan'];
  $unit=$_POST['unit'];  
  $keterangan=$_POST['keterangan'];
  $id_penguasaan=$_POST['id_penguasaan'];
  $semester=$_POST['semester'];
  $tahun_anggaran=$_POST['tahun_anggaran'];
	$id = $_POST['id'];
	$que_update =mysql_query("UPDATE `tbpengadaan` SET `nama_barang`='$nama_barang',`jenis_barang`='$jenis_barang',`spk_tanggal`='$spk_tanggal',`spk_nomor`='$spk_nomor',`kuitansi_tanggal`='$kuitansi_tanggal',`kuitansi_nomor`='$kuitansi_nomor',`jumlah_barang`='$jumlah_barang',`harga_satuan`='$harga_satuan',`unit`='$unit',`keterangan`='$keterangan',`id_penguasaan`='$id_penguasaan',`semester`='$semester',`tahun_anggaran`='$tahun_anggaran' WHERE `id_pengadaan`='$id'");
	header('Location: ../?page='.$page.'&in');
}

function delete($page){
	$id = $_GET['id'];
	mysql_query("DELETE FROM `tbpengadaan` WHERE `id_pengadaan`='$id'");
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
	mysql_query("UPDATE tbpengadaan SET valid='$v' WHERE id_pengadaan='$id'");
	header('Location: ../?page='.$page.'');
}


?>