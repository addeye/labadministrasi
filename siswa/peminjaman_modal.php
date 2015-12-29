<?php
session_start();
include "../admin/koneksi/koneksi.php";
$page = "peminjaman";
$page_act = "peminjaman_act";
$tabel = "tbpeminjaman";
$pk = "id_peminjaman";
$id=$_GET['id'];

if($id!=0){
  $que=mysql_query("SELECT * FROM $tabel WHERE $pk='$id'");
  $d=mysql_fetch_array($que);
  $id_ruanglab = $d['id_ruanglab'];
  $tgl_pakai = $d['tgl_pakai'];
  $jam_mulai=$d['jam_mulai'];
  $jam_akhir=$d['jam_akhir'];

  $aksi='update';
  $judul='Update';
} else {
  $id_ruanglab ="";
  $tgl_pakai ="";
  $jam_mulai="";
  $jam_akhir="";
  $aksi='insert';
  $judul='Tambah';
}
?>
<form method="post" action="siswa/<?=$page_act?>.php">
  <input type="hidden" name="id" value="<?=$id?>">
  <input type="hidden" name="aksi" value="<?=$aksi?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?=$judul?> Peminjaman</h4>
  </div>
  <div class="modal-body">
    <div class="form-group">      
<input type="hidden" name="id_mahasiswa" value="<?=$_SESSION['id_mahasiswa']?>">
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <select id="jammulai" name="jam_mulai" class="form-control jammulai">
              <option value="0">Jam Mulai</option>
              <?php $quejam=mysql_query("SELECT * FROM tbjam");
              while($j=mysql_fetch_array($quejam)) {
                ?>
                <option value="<?=$j['jam']?>" <?php if($j['jam']==$jam_mulai){echo "selected";} ?> >Ke - <?=$j['jam']?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="hidden" id="jamselesaiup" value="<?=$jam_akhir?>">
              <select name="jam_akhir" class="form-control jamselesai" disabled>                    
              </select>
            </div>
          </div>      
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">  
              <select name="id_ruanglab" class="form-control">
                <option>Nama Ruang</option>
                <?php $queruang=mysql_query("SELECT * FROM tbruanglab");
                while($ru=mysql_fetch_array($queruang)){
                  ?>
                  <option value="<?=$ru['id_ruanglab']?>" <?php if($id_ruanglab==$ru['id_ruanglab']){echo "selected";} ?> ><?=$ru['kode_lab']?> <?=$ru['nama_lab']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
             <div id="tgl" class="form-group">
               <input type="text" name="tgl_pakai" class="form-control datepicker" value="<?=$tgl_pakai?>">
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
      var jam = $('#jammulai').val();
      var jam2 = $('#jamselesaiup').val();
      if(jam==0){
        $('.jammulai').change(function(){
          var jam = $('#jammulai').val();
          $.get('siswa/jam_help.php',{jams: jam,jam2:jam2},function(data){
            $('.jamselesai').removeAttr('disabled');
            $('.jamselesai').html(data);
            console.log('jam=0');
          })
        });
      } else {
        $.get('siswa/jam_help.php',{jams: jam,jam2:jam2},function(data){
          $('.jamselesai').removeAttr('disabled');
          $('.jamselesai').html(data);
          console.log(jam2);
        })
      }
      var d = new Date();
      var curr_date = d.getDate();
      var curr_month = d.getMonth()+1;
      var curr_year = d.getFullYear();
      var datenow = curr_year+'-'+curr_month+'-'+curr_date;
      console.log(datenow);
      $('#tgl .datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        daysOfWeekDisabled: [0,6],
        startDate: datenow,
      });
    </script>