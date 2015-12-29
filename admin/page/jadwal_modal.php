<?php
session_start();
include "../koneksi/koneksi.php";
$page = "jadwal";
$page_act = "jadwal_act";
$tabel = "tbjadwal";
$pk = "id_jadwal";
$id=$_GET['id'];

if($id!=0){
  $que=mysql_query("SELECT * FROM tbjadwal WHERE id_jadwal='$id'");
  $d=mysql_fetch_array($que);
  $id_dosen=$d['id_dosen'];
  $id_matakuliah = $d['id_matakuliah'];
  $id_ruang = $d['id_ruang'];
  $id_rombel = $d['id_rombel'];
  $jam_mulai=$d['jam_mulai'];
  $jam_selesai=$d['jam_selesai'];
  $id_hari=$d['id_hari'];
  $semester=$d['semester'];
  $tahun_ajaran = $d['tahun_ajaran'];

  $aksi='update';
  $judul='Update';
} else {
  $id_dosen="";
  $id_matakuliah = "";
  $id_ruang = $_SESSION['id_ruanglab'];
  $id_rombel = "";
  $jam_mulai= "";
  $jam_selesai= "";
  $id_hari= "";
  $semester= "";
  $tahun_ajaran = "";
  $aksi='insert';
  $judul='Tambah';
}

if($_SESSION['id_level']=='1' or $_SESSION['id_level']=='3' or $_SESSION['id_level']=='4'){
  $attr="";
  $nameattr="";  
} else {
  $attr="disabled";
  $nameattr="id_ruang";
}

?>
<form method="post" action="page/<?=$page_act?>.php">
  <input type="hidden" name="id" value="<?=$id?>">
  <input type="hidden" name="aksi" value="<?=$aksi?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?=$judul?> Jadwal</h4>
  </div>
  <div class="modal-body">
    <div class="form-group">      
      <select name="id_dosen" class="form-control">
        <option>Nama Dosen</option>
        <?php $quedosen=mysql_query("SELECT * FROM tbdosen");
        while($dos=mysql_fetch_array($quedosen)){
          ?>
          <option value="<?=$dos['id_dosen']?>" <?php if($dos['id_dosen']==$id_dosen){echo "selected";} ?> ><?=$dos['nip']?> <?=$dos['nama']?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">      
        <select name="id_matakuliah" class="form-control">
          <option>Nama Matakuliah</option>
          <?php $quematkul=mysql_query("SELECT * FROM tbmatakuliah");
          while($mat=mysql_fetch_array($quematkul)){
            ?>
            <option value="<?=$mat['id_matakuliah']?>" <?php if($mat['id_matakuliah']==$id_matakuliah){echo "selected";} ?> ><?=$mat['matakuliah']?></option>
            <?php } ?>
          </select>
        </div>
        <div class="row">
        <div class="col-md-5">
        <div class="form-group">
        <input type="hidden" name="<?=$nameattr?>" value="<?=$id_ruang?>">      
          <select name="id_ruang" class="form-control" <?=$attr?>>
            <option>Nama Ruang</option>
            <?php $queruang=mysql_query("SELECT * FROM tbruanglab");
            while($ru=mysql_fetch_array($queruang)){
              ?>
              <option value="<?=$ru['id_ruanglab']?>" <?php if($id_ruang==$ru['id_ruanglab']){echo "selected";} ?> ><?=$ru['kode_lab']?> <?=$ru['nama_lab']?></option>
              <?php } ?>
            </select>
          </div>
          </div>
          <div class="col-md-7">
          <div class="form-group">      
            <select name="id_rombel" class="form-control">
              <option>Rombel</option>
              <?php $querombel=mysql_query("SELECT r.*,p.nama_prodi FROM tbrombel r LEFT JOIN tbprodi p on r.prodi=p.id_prodi");
              while($ro=mysql_fetch_array($querombel)){
                ?>
                <option value="<?=$ro['id_rombel']?>" <?php if($ro['id_rombel']==$id_rombel){echo "selected";} ?> ><?=$ro['nama_prodi']?> <?=$ro['kelas']?> <?=$ro['angkatan']?></option>
                <?php } ?>
              </select>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-4">
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
              <div class="col-md-4">
                <div class="form-group">
                <input type="hidden" id="jamselesaiup" value="<?=$jam_selesai?>">
                  <select name="jam_selesai" class="form-control jamselesai" disabled>                    
                  </select>
                </div>
              </div>      
              <div class="col-md-4">
                <div class="form-group">      
                  <select name="id_hari" class="form-control">
                    <option value="">Hari</option>
                      <?php $quehari=mysql_query("SELECT * FROM tbhari");
                        while($ha = mysql_fetch_array($quehari)) {
                      ?>
                      <option value="<?=$ha['id_hari']?>" <?php if($ha['id_hari']==$id_hari){echo "selected";} ?> ><?=$ha['nama_hari']?></option>
                      <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
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
                <select name="tahun_ajaran" class="form-control">
                  <option>Tahun Ajaran</option>
                  <?php $quetahun=mysql_query("SELECT * FROM tbtahunajaran");
                  while($th=mysql_fetch_array($quetahun)){
                  ?>
                  <option value="<?=$th['id_tahunajaran']?>" <?php if($tahun_ajaran==$th['id_tahunajaran']){echo "selected";} ?> ><?=$th['tahunajaran']?></option>
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
<script>
var jam = $('#jammulai').val();
var jam2 = $('#jamselesaiup').val();
if(jam==0){
  $('.jammulai').change(function(){
    var jam = $('#jammulai').val();
      $.get('page/jam_help.php',{jams: jam,jam2:jam2},function(data){
        $('.jamselesai').removeAttr('disabled');
        $('.jamselesai').html(data);
        console.log('jam=0');
      })
    });
} else {
        $.get('page/jam_help.php',{jams: jam,jam2:jam2},function(data){
        $('.jamselesai').removeAttr('disabled');
        $('.jamselesai').html(data);
        console.log(jam2);
      })
}
</script>