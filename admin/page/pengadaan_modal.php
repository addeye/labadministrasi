<?php
session_start();
include "../koneksi/koneksi.php";

$page = "pengadaan";
$page_act = "pengadaan_act";
$tabel = "tbpengadaan";
$pk = "id_pengadaan";
$id=$_GET['id'];

if($id!=0){
  $que=mysql_query("SELECT * FROM tbpengadaan WHERE id_pengadaan='$id'");
  $d=mysql_fetch_array($que);
  $nama_barang=$d['nama_barang'];
  $jenis_barang=$d['jenis_barang'];
  $spk_tanggal = $d['spk_tanggal'];
  $spk_nomor = $d['spk_nomor'];
  $kuitansi_tanggal = $d['kuitansi_tanggal'];
  $kuitansi_nomor=$d['kuitansi_nomor'];
  $jumlah_barang=$d['jumlah_barang'];
  $harga_satuan=$d['harga_satuan'];
  $unit=$d['unit'];  
  $keterangan=$d['keterangan'];
  $id_penguasaan=$d['id_penguasaan'];
  $semester=$d['semester'];
  $tahun_anggaran=$d['tahun_anggaran'];

  $aksi='update';
  $judul='Update';
} else {
  $nama_barang="";
  $jenis_barang="";
  $spk_tanggal ="";
  $spk_nomor ="";
  $kuitansi_tanggal ="";
  $kuitansi_nomor="";
  $jumlah_barang="";
  $harga_satuan="";
  $unit="";  
  $keterangan="";
  $id_penguasaan="";
  $semester="";
  $tahun_anggaran="";


  $aksi='insert';
  $judul='Tambah';
}
// if($_SESSION['id_level']=='1' or $_SESSION['id_level']=='3' or $_SESSION['id_level']=='4'){
//   $attr="";
//   $nameattr="";  
// } else {
//   $attr="disabled";
//   $nameattr="id_ruanglab";
// }

?>
<form method="post" action="page/<?=$page_act?>.php">
  <input type="hidden" name="id" value="<?=$id?>">
  <input type="hidden" name="aksi" value="<?=$aksi?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?=$judul?> Data Pengadaan Barang</h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-7">
       <div class="form-group">      
         <input type="text" class="form-control" name="nama_barang" value="<?=$nama_barang?>" placeholder="Nama Barang" data-toggle="tooltip" data-placement="bottom" title="Nama Barang">
       </div>
     </div>
     <div class="col-md-5">
      <div class="form-group">      
        <select name="jenis_barang" class="form-control">
          <option value="">Pilih Jenis Barang</option>
          <option value="Inventaris" <?php if($jenis_barang=='Inventaris'){echo "selected";} ?>>Inventaris</option>
          <option value="Barang Habis" <?php if($jenis_barang=='Barang Habis'){echo "selected";} ?>>Barang Habis</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
     <div class="form-group" id="tgl">      
       <input type="text" class="form-control datepicker" name="spk_tanggal" value="<?=$spk_tanggal?>" placeholder="Tanggal Surat" data-toggle="tooltip" data-placement="bottom" title="Tanggal Surat">
     </div>
   </div>
   <div class="col-md-6">
    <div class="form-group">
      <input type="text" class="form-control" value="<?=$spk_nomor?>" name="spk_nomor" placeholder="Nomor Surat" data-toggle="tooltip" data-placement="bottom" title="Nomor Surat">
    </div>
  </div>
  <div class="col-md-6">
   <div class="form-group" id="tgl">      
     <input type="text" class="form-control datepicker" name="kuitansi_tanggal" value="<?=$kuitansi_tanggal?>" placeholder="Tanggal Kuitansi" data-toggle="tooltip" data-placement="bottom" title="Tanggal Kuitansi">
   </div>
 </div>
 <div class="col-md-6">
  <div class="form-group">
    <input type="text" class="form-control" value="<?=$kuitansi_nomor?>" name="kuitansi_nomor" placeholder="Nomor Kuitansi" data-toggle="tooltip" data-placement="bottom" title="Nomor Kuitansi">
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <input type="text" class="form-control" value="<?=$jumlah_barang?>" name="jumlah_barang" placeholder="Jumlah Barang" data-toggle="tooltip" data-placement="bottom" title="Jumlah Barang">
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
    <input type="text" class="form-control" value="<?=$unit?>" name="unit" placeholder="Dipergunakan Di Unit" data-toggle="tooltip" data-placement="bottom" title="Dipergunakan Di Unit">
  </div>
</div>
<div class="col-md-12">
 <div class="form-group">      
   <textarea class="form-control" name="keterangan" placeholder="Keterangan" data-toggle="tooltip" data-placement="bottom" title="Keterangan"><?=$keterangan?></textarea>
 </div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <select name="id_penguasaan" class="form-control">
      <option value="">Pilih Sumber Dana</option>
      <?php $qued = mysql_query("SELECT * FROM tbpenguasaan");
      while($p=mysql_fetch_array($qued)) {?>
          <option value="<?=$p['id_penguasaan']?>" <?php if($id_penguasaan==$p['id_penguasaan']){echo "selected";} ?> ><?=$p['nama_penguasaan']?></option>
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
<div class="col-md-6">
  <div class="form-group">
    <input type="text" class="form-control" value="<?=$tahun_anggaran?>" name="tahun_anggaran" placeholder="Tahun Anggaran" data-toggle="tooltip" data-placement="bottom" title="Tahun Anggaran">
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