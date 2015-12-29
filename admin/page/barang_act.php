<?php
include "../koneksi/koneksi.php";
$page = "barang";

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
	$kode_barang=$_POST['kode_barang'];
	$nama_barang=$_POST['nama_barang'];
	$merk = $_POST['merk'];
	// $kondisi = $_POST['kondisi'];
	$milik = $_POST['milik'];
	$penguasaan=$_POST['penguasaan'];
	$tahun=$_POST['tahun'];
	$jumlah_unit=$_POST['jumlah_unit'];
	$jumlah_rusak=$_POST['jumlah_rusak'];  
	$id_ruanglab=$_POST['id_ruanglab'];
	$tanggal_terima=$_POST['tanggal_terima'];
	$dari = $_POST['dari'];
	$nofaktur=$_POST['nofaktur'];
	$tglfaktur=$_POST['tglfaktur'];
	$harga_satuan=$_POST['harga_satuan'];
	$nosurat=$_POST['nosurat'];
	$tanggal_surat=$_POST['tanggal_surat'];
	$penerima_barang=$_POST['penerima_barang'];
	$semester=$_POST['semester'];
	$tahun_anggaran=$_POST['tahun_anggaran'];
	$keterangan = $_POST['keterangan'];

	$que_insert = mysql_query("INSERT INTO `tbbarang`(`id_barang`, `kode_barang`, `nama_barang`, `merk`, `milik`, `penguasaan`, `tahun`, `jumlah_unit`, `jumlah_rusak`, `id_ruanglab`, `tanggal_terima`, `dari`, `nofaktur`, `tglfaktur`, `harga_satuan`, `nosurat`, `tanggal_surat`, `penerima_barang`, `semester`, `tahun_anggaran`, `keterangan`) 
								VALUES (NULL,'$kode_barang','$nama_barang','$merk','$kondisi','$milik','$penguasaan','$tahun','$jumlah_unit','$jumlah_rusak','$id_ruanglab','$tanggal_terima','$dari','$nofaktur','$tglfaktur','$harga_satuan','$nosurat','$tanggal_surat','$penerima_barang','$semester','$tahun_anggaran','$keterangan')");
	header('Location: ../?page='.$page.'&in');
}

function update($page){
	$kode_barang=$_POST['kode_barang'];
	$nama_barang=$_POST['nama_barang'];
	$merk = $_POST['merk'];
	// $kondisi = $_POST['kondisi'];
	$milik = $_POST['milik'];
	$penguasaan=$_POST['penguasaan'];
	$tahun=$_POST['tahun'];
	$jumlah_unit=$_POST['jumlah_unit'];
	$jumlah_rusak=$_POST['jumlah_rusak'];  
	$id_ruanglab=$_POST['id_ruanglab'];
	$tanggal_terima=$_POST['tanggal_terima'];
	$dari = $_POST['dari'];
	$nofaktur=$_POST['nofaktur'];
	$tglfaktur=$_POST['tglfaktur'];
	$harga_satuan=$_POST['harga_satuan'];
	$nosurat=$_POST['nosurat'];
	$tanggal_surat=$_POST['tanggal_surat'];
	$penerima_barang=$_POST['penerima_barang'];
	$semester=$_POST['semester'];
	$tahun_anggaran=$_POST['tahun_anggaran'];
	$keterangan = $_POST['keterangan'];
	$id = $_POST['id'];
	$que_update =mysql_query("UPDATE `tbbarang` SET `kode_barang`='$kode_barang',`nama_barang`='$nama_barang',`merk`='$merk',`milik`='$milik',`penguasaan`='$penguasaan',`tahun`='$tahun',`jumlah_unit`='$jumlah_unit',`jumlah_rusak`='$jumlah_rusak',`id_ruanglab`='$id_ruanglab',`tanggal_terima`='$tanggal_terima',`dari`='$dari',`nofaktur`='$nofaktur',`tglfaktur`='$tglfaktur',`harga_satuan`='$harga_satuan',`nosurat`='$nosurat',`tanggal_surat`='$tanggal_surat',`penerima_barang`='$penerima_barang',`semester`='$semester',`tahun_anggaran`='$tahun_anggaran',`keterangan`='$keterangan' WHERE `id_barang`='$id'");
	header('Location: ../?page='.$page.'&in');
}

function delete($page){
	$id = $_GET['id'];
	mysql_query("DELETE FROM `tbbarang` WHERE `id_barang`='$id'");
	header('Location: ../?page='.$page.'');
}


?>