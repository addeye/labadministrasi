<?php
include "../koneksi/koneksi.php";
$page = "rekom";
$page_act = "rekom_act";
$tabel = "tbrekom";
$pk = "id_rekom";
$id=$_GET['id'];

if($id!=0){
  $que=mysql_query("SELECT * FROM $tabel WHERE $pk='$id'");
  $d=mysql_fetch_array($que);
  $nama_barang = $d['nama_barang'];
  $jumlah_unit = $d['jumlah_unit'];
  $harga_satuan = $d['harga_satuan'];
  $keterangan = $d['keterangan'];
  $semester = $d['semester'];
  $tahun_anggaran = $d['tahun_anggaran'];

  $aksi='update';
  $judul='Update';
} else {
  $id_barang="";
  $nama_barang ="";
  $jumlah_unit ="";
  $harga_satuan ="";  
  $keterangan ="";
  $semester ="";
  $tahun_anggaran ="";
  $aksi='insert';
  $judul='Tambah';
}

?>
<form method="post" action="page/<?=$page_act?>.php">
  <input type="hidden" name="id" value="<?=$id?>">
  <input type="hidden" name="aksi" value="<?=$aksi?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?=$judul?> Rekomendasi Barang</h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
        <input value="<?=$nama_barang?>" type="text" name="nama_barang" placeholder="Nama Barang" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">      
            <input type="text" class="form-control" name="jumlah_unit" value="<?=$jumlah_unit?>" placeholder="Jumlah Unit">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="harga_satuan" id="biaya" value="<?=$harga_satuan?>" placeholder="Biaya" class="form-control">
              <label><span class="pay">0,00</span></label>
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
            <input type="text" class="form-control" value="<?=$tahun_anggaran?>" name="tahun_anggaran" placeholder="Tahun Anggaran" data-toggle="tooltip" data-placement="bottom" title="Tahun Anggaran">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <textarea class="form-control" name="keterangan" placeholder="Keterangan"><?=$keterangan?></textarea>
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