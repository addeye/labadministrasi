<?php
include "../koneksi/koneksi.php";
$id_ruang=$_GET['id_ruang'];
$sem = $_GET['sem'];
$thn = $_GET['thn'];
$sumber_dana = $_GET['sd'];
$que=mysql_query("SELECT pr.*,b.kode_barang,b.nama_barang,jk.jeniskerusakan,pg.nama_penguasaan 
FROM tbperbaikan pr 
LEFT JOIN tbbarang b on pr.id_barang=b.id_barang
LEFT JOIN tbjeniskerusakan jk on pr.jenis_kerusakan=jk.id_jeniskerusakan
LEFT JOIN tbpenguasaan pg on pr.sumber_dana=pg.id_penguasaan
LEFT JOIN tbruanglab r on b.id_ruanglab=r.id_ruanglab
WHERE pr.sumber_dana='$sumber_dana'
and pr.semester='$sem' and pr.tahun_anggaran='$thn'
and b.id_ruanglab='$id_ruang'");

$quesd = mysql_query("SELECT * FROM tbpenguasaan where id_penguasaan='$sumber_dana'");
$pg = mysql_fetch_array($quesd);

$queket = mysql_query("SELECT pt.*,pg.id_level,l.`level`,r.kode_lab,r.nama_lab
FROM tbpetugas pt 
LEFT JOIN tbpengguna pg on pt.id_petugas=pg.id_petugas
LEFT JOIN tblevel l on pg.id_level=l.id_level
LEFT JOIN tbruanglab r on pt.ruanglab=r.id_ruanglab
WHERE pt.ruanglab='$id_ruang' and pg.id_level='4'");
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
		<h3> LAPORAN PERBAIKAN DAN PERAWATAN BARANG<br> 
			SEMESTER <?=strtoupper($sem)?> TAHUN ANGGARAN <?=$thn?></h3>
			<table border="0" width="900" cellpadding="4" cellspacing="0">
				<tr>
					<td><label>RUANGAN : <?=$ru['kode_lab']?> <?=$ru['nama_lab']?></label></td>
					<td></td>
				</tr>
				<tr>
					<td><label>SUMBER DANA : <?=$pg['nama_penguasaan']?></label></td>
					<td></td>
				</tr>
			</table>
			<br>
			<table width="900" border="1" cellspacing="0" cellpadding="2">
				<tr>
					<th rowspan="">No</th>
					<th rowspan="">No Kode Barang</th>
					<th colspan="">Nama Barang Yang Dipelihara</th>
					<th rowspan="">Jenis Pemeliharaan</th>
					<th rowspan="">Yang Memelihara</th>
					<th rowspan="">Tanggal Pemeliharaan</th>
					<th rowspan="">Biaya Pemeliharaan</th>
					<th rowspan="">Bukti Pemeliharaan</th>
					<th rowspan="">Keterangan</th>
				</tr>
				<?php $no=1; while($d=mysql_fetch_array($que)){
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$d['kode_barang']?></td>
						<td><?=$d['nama_barang']?></td>
						<td><?=$d['jenis_pemeliharaan']?></td>
						<td><?=$d['pemelihara']?></td>
						<td><?=$d['tanggal_pemeliharaan']?></td>
						<td><?=$d['biaya_pemeliharaan']?></td>
						<td><?=$d['bukti_pemeliharaan']?></td>
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