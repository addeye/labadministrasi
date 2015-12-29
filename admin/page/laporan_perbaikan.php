<?php
if($_SESSION['id_level']=='1'){
  $quepart="";  
} else {
  $quepart="WHERE b.id_ruanglab='$_SESSION[id_ruanglab]'";
}
$quebarang=mysql_query("SELECT b.*,p.nama_penguasaan,r.kode_lab,r.nama_lab FROM tbbarang b
  LEFT JOIN tbpenguasaan p on b.penguasaan=p.id_penguasaan
  LEFT JOIN tbruanglab r on b.id_ruanglab=r.id_ruanglab
  $quepart
  ORDER BY b.id_barang DESC
  ");
$page = "barang";
$page_act = "barang_act";
$tabel = "tbbarang";
$pk = "id_barang";
?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Rekap Data Perbaikan/Perawatan Barang</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-2">        
              <div class="form-group">
              <select id="sumber_dana" name="sumber_dana" class="form-control">
                  <option value="">Sumber Dana</option>
                  <?php $quesd=mysql_query("SELECT * FROM tbpenguasaan");
                  while($sd = mysql_fetch_array($quesd)) { ?>
                  <option value="<?=$sd['id_penguasaan']?>"><?=$sd['nama_penguasaan']?></option>
                  <?php } ?>
                </select>           
              </div>
            </div>
            <div class="col-md-3">        
              <div class="form-group">
                <select id="idruang" name="ruanglab" class="form-control">
                  <option value="">Pilih ruangan</option>
                  <?php $quelb=mysql_query("SELECT * FROM tbruanglab");
                  while($ru = mysql_fetch_array($quelb)) { ?>
                  <option value="<?=$ru['id_ruanglab']?>"><?=$ru['kode_lab']?> <?=$ru['nama_lab']?></option>
                  <?php } ?>
                </select>           
              </div>
            </div>
            <div class="col-md-3">        
              <div class="form-group">
                <select id="semester" name="semester" class="form-control">
                  <option value="">Pilih Semester</option>
                  <option value="Gasal">Gasal</option>
                  <option value="Genap">Genap</option>
                </select>           
              </div>
            </div>
            <div class="col-md-1">        
              <div class="form-group">
                <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran" value="2015">         
              </div>
            </div>
            <div class="col-md-3">
              <button class="btn btn-primary btn-ls btn-cetakperbaikan">Cetak</button>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
</section>