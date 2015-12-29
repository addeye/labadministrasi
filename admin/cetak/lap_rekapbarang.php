<?php
include "../koneksi/koneksi.php";
$idruanglab = $_GET['id_ruang'];
$queruang=mysql_query("SELECT * FROM tbruanglab WHERE id_ruanglab='$idruanglab'");
$r = mysql_fetch_array($queruang);
$nama_ruang = $r['kode_lab'].' '.$r['nama_lab'];
$quebarang = mysql_query("SELECT b.*,p.nama_penguasaan 
FROM tbbarang b 
LEFT JOIN tbpenguasaan p on b.penguasaan=p.id_penguasaan
WHERE b.id_ruanglab='$idruanglab'");
 ?>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<div align="center">
		<h3>BARANG INVENTARIS <?=$nama_ruang?></h3>
		<table width="700" border="1" cellspacing="0" cellpadding="2">
			<tr>
				<th>No</th>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Jumlah</th>
				<th>Rusak</th>
				<th>Penguasaan</th>
			</tr>
			<?php $no=1; while($b=mysql_fetch_array($quebarang)) {?>
			<tr>
				<td><?=$no?></td>
				<td><?=$b['kode_barang']?></td>
				<td><?=$b['nama_barang']?></td>
				<td><?=$b['jumlah_unit']?> buah</td>
				<td><?=$b['jumlah_rusak']?> Buah</td>
				<td><?=$b['nama_penguasaan']?></td>
			</tr>
			<?php $no++; } ?>
		</table>
		</div>
	</body>
</html>