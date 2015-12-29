<?php
include "../koneksi/koneksi.php";
$id_ruang=$_GET['id_ruang'];
$sem = $_GET['sem'];
$thn = $_GET['thn'];
$que = mysql_query("SELECT b.*,r.kode_lab,r.nama_lab
	FROM tbbaranghabis b 
	LEFT JOIN tbruanglab r on b.id_ruanglab=r.id_ruanglab
	WHERE b.id_ruanglab='$id_ruang' and b.semester='$sem' and b.tahun_anggaran='$thn'");

$queket = mysql_query("SELECT pt.*,pg.id_level,l.`level`,r.kode_lab,r.nama_lab
FROM tbpetugas pt 
LEFT JOIN tbpengguna pg on pt.id_petugas=pg.id_petugas
LEFT JOIN tblevel l on pg.id_level=l.id_level
LEFT JOIN tbruanglab r on pt.ruanglab=r.id_ruanglab
WHERE pg.id_level='4'");
$fot = mysql_fetch_array($queket);

$queruang = mysql_query("SELECT * FROM tbruanglab  where id_ruanglab='$id_ruang'");
$ru =mysql_fetch_array($queruang);

?>

	<html>
	<head>
		<title></title>
	</head>
	<body>
		<div align="center">
			<h3> LAPORAN  PENGELUARAN BARANG HABIS PAKAI<br> 
			SEMESTER <?=strtoupper($sem)?> TAHUN ANGGARAN <?=$thn?></h3>
			<table border="0" width="900" cellpadding="4" cellspacing="0">
				<tr>
					<td><label>RUANGAN : <?=$ru['kode_lab']?> <?=$ru['nama_lab']?></label></td>
					<td></td>
				</tr>
			</table>
			<br>
			<table width="900" border="1" cellspacing="0" cellpadding="2">
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">Tgl.Terima</th>
					<th colspan="2">Surat Bon</th>
					<th rowspan="2">Untuk Bahan</th>
					<th rowspan="2">Banyaknya</th>
					<th rowspan="2">Nama Barang</th>
					<th rowspan="2">Harga Satuan</th>
					<th rowspan="2">Jumlah Harga</th>
					<th rowspan="2">Tgl. Penyerahan</th>
					<th rowspan="2">Keterangan</th>
				</tr>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
				</tr>
				<?php $no=1; while($d=mysql_fetch_array($que)){
					$total=$d['harga_satuan']*$d['jumlah'];
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$d['tanggal_terima']?></td>
						<td><?=$d['nosuratbon']?></td>
						<td><?=$d['tanggalsuratbon']?></td>
						<td><?=$d['kegunaan']?></td>
						<td><?=$d['jumlah']?></td>
						<td><?=$d['nama_barang']?></td>
						<td><?=$d['harga_satuan']?></td>
						<td><?=$total?></td>
						<td><?=$d['tanggal_penyerahan']?></td>
						<td><?=$d['keterangan']?></td>
					</tr>
					<?php $no++; } ?>
				</table>
				<br>
				<br>
				<table width="900" border="0" cellspacing="0" cellpadding="5">
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="300">Surabaya, <?= DateToIndo(date('Y-m-d')) ?></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="300">Mengetahui,<br>Ketua Laboratorium</td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><br><br></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="300"><?=$fot['nama_petugas']?><br>NIP <?=$fot['nip_petugas']?></td>
					</tr>
				</table>
			</div>
		</body>
		</html>