<?php
 $db=mysql_connect("localhost","root","");
 $sel=mysql_select_db("lab_unesa",$db); 

 date_default_timezone_set('Asia/Jakarta');
 
function buatrp($angka){
	$jadi = number_format($angka,2,',','.');
	return 'Rp. '.$jadi;
}
function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
	
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
		
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
}
	
	// echo(DateToIndo("2011-08-25")); //Akan menghasilkan 25 Agustus 2011

?>