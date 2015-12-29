<?php
session_start();
include "../koneksi/koneksi.php";

$page = "baranghabis";
$page_act = "baranghabis_act";
$tabel = "tbbaranghabis";
$pk = "id_baranghabis";
$id=$_GET['id'];

if($id!=0){
  $que=mysql_query("SELECT * FROM tbbaranghabis WHERE id_baranghabis='$id'");
  $d=mysql_fetch_array($que);
  $tanggal_terima=$d['tanggal_terima'];
  $nosuratbon=$d['nosuratbon'];
  $tanggalsuratbon = $d['tanggalsuratbon'];
  $kegunaan = $d['kegunaan'];
  $jumlah = $d['jumlah'];
  $nama_barang=$d['nama_barang'];
  $harga_satuan=$d['harga_satuan'];
  $tanggal_penyerahan=$d['tanggal_penyerahan'];
  $id_ruanglab=$d['id_ruanglab'];  
  $keterangan=$d['keterangan'];
  $semester=$d['semester'];
  $tahun_anggaran=$d['tahun_anggaran'];

  $aksi='update';
  $judul='Update';
} else {
  $tanggal_terima="";
  $nosuratbon="";
  $tanggalsuratbon ="";
  $kegunaan ="";
  $jumlah ="";
  $nama_barang="";
  $harga_satuan="";
  $tanggal_penyerahan="";
  $id_ruanglab=$_SESSION['id_ruanglab'];  
  $keterangan="";
  $semester="";
  $tahun_anggaran="";


  $aksi='insert';
  $judul='Tambah';
}
if($_SESSION['id_level']=='1' or $_SESSION['id_level']=='3' or $_SESSION['id_level']=='4'){
  $attr="";
  $nameattr="";  
} else {
  $attr="disabled";
  $nameattr="id_ruanglab";
}

?>
<form method="post" action="page/<?=$page_act?>.php">
  <input type="hidden" name="id" value="<?=$id?>">
  <input type="hidden" name="aksi" value="<?=$aksi?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?=$judul?> Data Barang Habis Pakai</h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-4">
       <div class="form-group" id="tgl">      
         <input type="text" class="form-control datepicker" name="tanggal_terima" value="<?=$tanggal_terima?>" placeholder="Tanggal Terima" data-toggle="tooltip" data-placement="bottom" title="Tanggal Terima">
       </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">      
        <input type="text" class="form-control" name="nosuratbon" value="<?=$nosuratbon?>" placeholder="No Surat Bon" data-toggle="tooltip" data-placement="bottom" title="No Surat Bon" required>
      </div>
    </div>
    <div class="col-md-4">
     <div class="form-group" id="tgl">      
       <input type="text" class="form-control datepicker" name="tanggalsuratbon" value="<?=$tanggalsuratbon?>" placeholder="Tanggal Surat Bon" data-toggle="tooltip" data-placement="bottom" title="Tanggal Surat Bon">
     </div>
   </div>
   <div class="col-md-12">
    <div class="form-group">
      <input type="text" class="form-control" value="<?=$kegunaan?>" name="kegunaan" placeholder="Kegunaan" data-toggle="tooltip" data-placement="bottom" title="Kegunaan">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <input type="text" class="form-control" value="<?=$jumlah?>" name="jumlah" placeholder="Jumlah Barang" data-toggle="tooltip" data-placement="bottom" title="Jumlah Unit">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <input type="text" class="form-control" value="<?=$nama_barang?>" name="nama_barang" placeholder="Nama Barang" data-toggle="tooltip" data-placement="bottom" title="Nama Barang">
    </div>
  </div>
  <div class="col-md-4">
   <div class="form-group" id="tgl">      
     <input type="text" class="form-control datepicker" name="tanggal_penyerahan" value="<?=$tanggal_penyerahan?>" placeholder="Tanggal Penyerahan" data-toggle="tooltip" data-placement="bottom" title="Tanggal Penyerahan">
   </div>
 </div>
 <div class="col-md-4">
  <div class="form-group">
    <input type="text" name="harga_satuan" id="biaya" value="<?=$harga_satuan?>" placeholder="Harga Satuan" class="form-control">              
  </div>
</div>
<div class="col-md-4"><label><span class="pay">0,00</span></label></div>
<div class="col-md-12">
 <div class="form-group">      
   <textarea class="form-control" name="keterangan" placeholder="Keterangan" data-toggle="tooltip" data-placement="bottom" title="Keterangan"><?=$keterangan?></textarea>
 </div>
</div>
<div class="col-md-3">
 <div class="form-group">
   <div class="radio">
    <label>
      <input type="radio" name="semester" value="Gasal" <?php if($semester=='Gasal'){echo "checked";} ?>>
      Gasal
    </label>
  </div>
</div>
</div>
<div class="col-md-3">
  <div class="form-group">  
    <div class="radio">
      <label>
        <input type="radio" name="semester" value="Genap" <?php if($semester=='Genap'){echo "checked";} ?>>
        Genap
      </label>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <input type="text" class="form-control" value="<?=$tahun_anggaran?>" name="tahun_anggaran" placeholder="Tahun Anggaran" data-toggle="tooltip" data-placement="bottom" title="Tahun Anggaran">
  </div>
</div>
<div class="col-md-12">
  <div class="form-group"> 
    <input type="hidden" name="<?=$nameattr?>" value="<?=$id_ruanglab?>">
    <select name="id_ruanglab" class="form-control" <?=$attr?>>
      <option>Kode Ruang Lab</option>
      <?php
      $quelab = mysql_query("SELECT * FROM tbruanglab");
      while($r=mysql_fetch_array($quelab)){
       ?>
       <option value="<?=$r['id_ruanglab']?>" <?php if($id_ruanglab==$r['id_ruanglab']){echo "selected";} ?> ><?=$r['kode_lab']?> <?=$r['nama_lab']?></option>
       <?php } ?>
     </select>                                           
   </div>
 </div>
</div>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="submit" name="save" class="btn btn-primary">Save</button>
</div>
</form> 
<script type="text/javascript">
  $('#tgl .datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
  });
  biaya = $('#biaya').val();
  $('#biaya').keyup(function(){
   biaya = $('#biaya').val();        
   viewbaiaya = formatCurrency(biaya);
   $('.pay').html(viewbaiaya);
 });
  if(biaya!=''){
    viewbaiaya = formatCurrency(biaya);
    $('.pay').html(viewbaiaya);
  } 

  function formatCurrency(num) 
  {
    num = num.toString().replace(/\$|\,/g,'');
    if(isNaN(num))
      num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num*100+0.50000000001);
    cents = num%100;
    num = Math.floor(num/100).toString();
    if(cents<10)
      cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
      num = num.substring(0,num.length-(4*i+3))+'.'+
    num.substring(num.length-(4*i+3));
    return (((sign)?'':'-') + 'Rp ' + num + ',' + cents);
  }
  $('[data-toggle="tooltip"]').tooltip();
</script>   