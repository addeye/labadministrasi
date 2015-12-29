<?php
$jam_start=$_GET['jams'];
$jam_start=$jam_start+1;
$jam2 = $_GET['jam2'];
echo "<option>Jam Selesai</option>";
for($a=$jam_start; $a<=12; $a++){
	if($a==$jam2){$tes='selected';} else {$tes="";}	
	echo "<option value='$a' $tes >Ke - ".$a."</option>";
}
?>