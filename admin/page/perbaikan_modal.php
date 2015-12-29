<?php
include "../koneksi/koneksi.php";
$page = "perbaikan";
$page_act = "perbaikan_act";
$tabel = "tbperbaikan";
$pk = "id_perbaikan";
$id=$_GET['id'];

if($id!=0){
  $que=mysql_query("SELECT * FROM $tabel WHERE $pk='$id'");
  $d=mysql_fetch_array($que);
  $id_barang=$d['id_barang'];
  $jenis_kerusakan = $d['jenis_kerusakan'];
  $jenis_pemeliharaan = $d['jenis_pemeliharaan'];
  $pemelihara = $d['pemelihara'];
  $tanggal_pemeliharaan = $d['tanggal_pemeliharaan'];
  $biaya_pemeliharaan = $d['biaya_pemeliharaan'];
  $bukti_pemeliharaan = $d['bukti_pemeliharaan'];
  $keterangan = $d['keterangan'];
  $sumber_dana=$d['sumber_dana'];
  $semester=$d['semester'];
  $tahun_anggaran=$d['tahun_anggaran'];

  $aksi='update';
  $judul='Update';
} else {
  $id_barang="";
  $jenis_kerusakan ="";
  $jenis_pemeliharaan ="";
  $pemelihara ="";
  $tanggal_pemeliharaan ="";
  $biaya_pemeliharaan ="";
  $bukti_pemeliharaan ="";
  $keterangan ="";
  $sumber_dana="";
  $semester="";
  $tahun_anggaran="";
  $aksi='insert';
  $judul='Tambah';
}

?>
<form method="post" action="page/<?=$page_act?>.php">
  <input type="hidden" name="id" value="<?=$id?>">
  <input type="hidden" name="aksi" value="<?=$aksi?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?=$judul?> Perbaikan</h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">      
          <select name="id_barang" class="form-control">
            <option>Nama Barang</option>
            <?php $quebrg=mysql_query("SELECT * FROM tbbarang WHERE kondisi='Rusak'");
            while($b=mysql_fetch_array($quebrg)){
              ?>
              <option value="<?=$b['id_barang']?>" <?php if($b['id_barang']==$id_barang){echo "selected";} ?> ><?=$b['nama_barang']?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">      
            <select name="jenis_kerusakan" class="form-control">
              <option>Jenis Kerusakan</option>
              <?php $quej=mysql_query("SELECT * FROM tbjeniskerusakan");
              while($j=mysql_fetch_array($quej)){
                ?>
                <option value="<?=$j['id_jeniskerusakan']?>" <?php if($j['id_jeniskerusakan']==$jenis_kerusakan){echo "selected";} ?> > <?=$j['jeniskerusakan']?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" class="form-control" name="jenis_pemeliharaan" placeholder="Jenis Pemeliharaan" value="<?=$jenis_pemeliharaan?>">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" class="form-control" name="pemelihara" placeholder="Yang Memelihara" value="<?=$pemelihara?>">
            </div>
          </div>
          <div class="col-md-4">
            <div id="tgl" class="form-group">
              <input type="text" name="tanggal_pemeliharaan" value="<?=$tanggal_pemeliharaan?>" placeholder="Tanggal Pemeliharaan" class="form-control datepicker">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <input type="text" name="biaya_pemeliharaan" id="biaya" value="<?=$biaya_pemeliharaan?>" placeholder="Biaya" class="form-control">              
            </div>
          </div>
          <div class="col-md-3"><label><span class="pay">0,00</span></label></div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" class="form-control" name="bukti_pemeliharaan" placeholder="Bukti Pemeliharaan" value="<?=$bukti_pemeliharaan?>">
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
            <textarea class="form-control" name="keterangan" placeholder="Keterangan"><?=$keterangan?></textarea>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <select name="sumber_dana" class="form-control">
              <option value="">Pilih Sumber Dana</option>
              <?php $quesum=mysql_query("SELECT * FROM tbpenguasaan");
              while($s=mysql_fetch_array($quesum)) { ?>
              <option value="<?=$s['id_penguasaan']?>" <?php if($sumber_dana==$s['id_penguasaan']){echo "selected";} ?>><?=$s['nama_penguasaan']?></option>
              <?php } ?>
            </select>
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
  </script>