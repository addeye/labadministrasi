<?php
include "../koneksi/koneksi.php";
$idruanglab=$_GET['idlab'];
$idb=$_GET['idb'];
echo "<option value=''>Pilih Barang</option>";
$que=mysql_query("SELECT * FROM tbbarang WHERE id_ruanglab='$idruanglab'");
while($d=mysql_fetch_array($que)){
	if($d['id_barang']==$idb){$tes='selected';} else {$tes="";}	
	echo "<option value='$d[id_barang]' $tes >$d[nama_barang]</option>";
}
// for($a=$jam_start; $a<=12; $a++){
// 	if($a==$jam2){$tes='selected';} else {$tes="";}	
// 	echo "<option value='$a' $tes >Ke - ".$a."</option>";
// }
?>