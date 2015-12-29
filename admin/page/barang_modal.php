<?php
session_start();
include "../koneksi/koneksi.php";

$page = "barang";
$page_act = "barang_act";
$tabel = "tbbarang";
$pk = "id_barang";
$id=$_GET['id'];

if($id!=0){
  $que=mysql_query("SELECT * FROM tbbarang WHERE id_barang='$id'");
  $d=mysql_fetch_array($que);
  $kode_barang=$d['kode_barang'];
  $nama_barang=$d['nama_barang'];
  $merk = $d['merk'];
  $kondisi = $d['kondisi'];
  $milik = $d['milik'];
  $penguasaan=$d['penguasaan'];
  $tahun=$d['tahun'];
  $jumlah_unit=$d['jumlah_unit'];
  $jumlah_rusak=$d['jumlah_rusak'];  
  $id_ruanglab=$d['id_ruanglab'];
  $tanggal_terima=$d['tanggal_terima'];
  $dari = $d['dari'];
  $nofaktur=$d['nofaktur'];
  $tglfaktur=$d['tglfaktur'];
  $harga_satuan=$d['harga_satuan'];
  $nosurat=$d['nosurat'];
  $tanggal_surat=$d['tanggal_surat'];
  $penerima_barang=$d['penerima_barang'];
  $semester=$d['semester'];
  $tahun_anggaran=$d['tahun_anggaran'];
  $keterangan = $d['keterangan'];

  $aksi='update';
  $judul='Update';
} else {
  $kode_barang="";
  $nama_barang="";
  $merk ="";
  $kondisi ="";
  $milik ="";
  $penguasaan="";
  $tahun="";
  $jumlah_unit="";
  $jumlah_rusak="";  
  $id_ruanglab="";
  $tanggal_terima="";
  $dari="";
  $nofaktur="";
  $tglfaktur="";
  $harga_satuan="";
  $nosurat="";
  $tanggal_surat="";
  $penerima_barang="";
  $semester="";
  $tahun_anggaran="";
  $keterangan ="";
  $id_ruanglab=$_SESSION['id_ruanglab'];

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
    <h4 class="modal-title" id="myModalLabel"><?=$judul?> Data Barang</h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-4">
       <div class="form-group">      
       <input type="text" class="form-control" name="kode_barang" value="<?=$kode_barang?>" placeholder="Kode Barang" data-toggle="tooltip" data-placement="bottom" title="Kode Barang">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">      
        <input type="text" class="form-control" name="nama_barang" value="<?=$nama_barang?>" placeholder="Nama Barang" data-toggle="tooltip" data-placement="bottom" title="Nama Barang" required>
      </div>
    </div>
    <div class="col-md-4">
     <div class="form-group">      
      <input type="text" class="form-control" name="merk" value="<?=$merk?>" placeholder="Merk Barang" data-toggle="tooltip" data-placement="bottom" title="Merk Barang">
    </div>
  </div>
<!--   <div class="col-md-6">
    <div class="form-group"> 
     <select name="kondisi" class="form-control">
      <option>Kondisi</option>
      <option value="Baik" <?php if($kondisi=="Baik"){echo "selected";} ?>>Baik</option>
      <option value="Rusak" <?php if($kondisi=="Rusak"){echo "selected";} ?>>Rusak</option>
    </select>                                           
  </div>
</div> -->
<div class="col-md-6">
  <div class="form-group"> 
   <select name="milik" class="form-control">
    <option>Milik</option>
    <option value="SD" <?php if($milik=="SD"){echo "selected";} ?>>Sendiri</option>
    <option value="SW" <?php if($milik=="SW"){echo "selected";} ?>>Pinjaman</option>
  </select>                                           
</div>
</div>
<div class="col-md-6">
  <div class="form-group"> 
   <select name="penguasaan" class="form-control">
    <option>Penguasaan</option>
    <?php $que=mysql_query("SELECT * FROM tbpenguasaan");
    while($d=mysql_fetch_array($que)) { ?>
    <option value="<?=$d['id_penguasaan']?>" <?php if($penguasaan==$d['id_penguasaan']){echo "selected";} ?> ><?=$d['nama_penguasaan']?></option>
    <?php } ?>
  </select>                                           
</div>
</div>
<div class="col-md-2">
  <div class="form-group">  
    <span class="input-group-addon">Tahun</span>    
    <input type="text" class="form-control" name="tahun" value="<?=$tahun?>" placeholder="Tahun Barang" data-toggle="tooltip" data-placement="bottom" title="Tahun Barang" required>
  </div>
</div>
<div class="col-md-2">
  <div class="form-group">      
    <input type="text" class="form-control" name="jumlah_unit" value="<?=$jumlah_unit?>" placeholder="Jumlah Unit" data-toggle="tooltip" data-placement="bottom" title="Jumlah Unit" required>
    <span class="input-group-addon">Unit</span>
  </div>
</div>
<div class="col-md-2">
  <div class="form-group">      
    <input type="text" class="form-control" name="jumlah_rusak" value="<?=$jumlah_rusak?>" placeholder="Jumlah Rusak" data-toggle="tooltip" data-placement="bottom" title="Nama Barang" required>
    <span class="input-group-addon">Rusak</span>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group" id="tgl">
    <input type="text" class="form-control datepicker" name="tanggal_terima" value="<?=$tanggal_terima?>" placeholder="Tanggal Terima" required>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <input type="text" name="dari" placeholder="Dari" value="<?=$dari?>" class="form-control">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <input type="text" class="form-control" name="nofaktur" value="<?=$nofaktur?>" placeholder="No Faktur">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group" id="tgl">
    <input type="text" class="form-control datepicker" value="<?=$tglfaktur?>" name="tglfaktur" placeholder="Tanggal Faktur">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <input type="text" name="harga_satuan" id="biaya" value="<?=$harga_satuan?>" placeholder="Harga Satuan" class="form-control">              
  </div>
</div>
<div class="col-md-6"><label><span class="pay">0,00</span></label></div>
<div class="col-md-7">
  <div class="form-group">
    <input type="text" class="form-control" name="nosurat" value="<?=$nosurat?>" placeholder="No Surat">  
  </div>
</div>
<div class="col-md-5">
  <div class="form-group" id="tgl">
    <input type="text" class="form-control datepicker" name="tanggal_surat" value="<?=$tanggal_surat?>" placeholder="Tanggal Surat">  
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <select name="penerima_barang" class="form-control">
      <option value="">Penerima Barang</option>
      <?php $queptugas = mysql_query("SELECT * FROM tbpetugas WHERE ruanglab!='0' ");
      while($pt = mysql_fetch_array($queptugas)) {?>
      <option value="<?=$pt['id_petugas']?>"><?=$pt['nama_petugas']?></option>
      <?php } ?>
    </select>
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
<div class="col-md-12">
  <div class="form-group">      
    <textarea class="form-control" name="keterangan" placeholder="Keterangan"><?=$keterangan?></textarea>
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