<?php
if($_SESSION['id_level']=='1' or $_SESSION['id_level']=='3' or $_SESSION['id_level']=='4'){
  $quepart="";  
} else {
  $quepart="WHERE j.id_ruang='$_SESSION[id_ruanglab]'";
}
$quebarang=mysql_query("SELECT j.*,d.nip,d.nama,m.matakuliah,r.kode_lab,r.nama_lab,pro.nama_prodi,rm.kelas,rm.angkatan,th.tahunajaran,h.nama_hari FROM tbjadwal j 
LEFT JOIN tbdosen d on j.id_dosen=d.id_dosen
LEFT JOIN tbruanglab r on j.id_ruang=r.id_ruanglab
LEFT JOIN tbmatakuliah m on j.id_matakuliah=m.id_matakuliah
LEFT JOIN tbrombel rm on j.id_rombel=rm.id_rombel
LEFT JOIN tbprodi pro on rm.prodi=pro.id_prodi
LEFT JOIN tbtahunajaran th on j.tahun_ajaran=th.id_tahunajaran
LEFT JOIN tbhari h on j.id_hari=h.id_hari
$quepart
ORDER BY j.id_jadwal DESC");

$page = "jadwal";
$page_act = "jadwal_act";
$tabel = "tbjadwal";
$pk = "id_jadwal";
?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <a href="#" id="0" class="btn btn-primary btn-ls btn-tambahjadwal" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-fw fa-plus"></i>Tambah Data
      </a>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content"></div>

        </div>
      </div>      
    </div>
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Semua Siswa</h3>                                    
        </div><!-- /.box-header -->
        <?php
        if (isset($_GET['done'])) {
          echo '<div class="alert alert-success alert-dismissable">
          <i class="fa fa-check"></i>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <b>Pemberitahuan!</b> Data Berhasil Masuk
        </div>';}
        if (isset($_GET['up'])) {
          echo '<div class="alert alert-success alert-dismissable">
          <i class="fa fa-check"></i>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <b>Pemberitahuan!</b> Data Berhasil Update
        </div>';
      }
      ?>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Hari</th>
              <th>Jam</th>
              <th>Nama Dosen</th>
              <th>Ruang</th>
              <th>Matakuliah</th>
              <th>Program Studi</th>
              <th>Kelas</th>
              <th>Angkatan</th>
              <th>Semester</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $n=1; while($d=mysql_fetch_array($quebarang)) {
              $ids=$d[$pk];
              ?>
              <tr>
               <td><?=$n?></td>
               <td><?=$d['nama_hari']?></td>
               <td><?=$d['jam_mulai']?>-<?=$d['jam_selesai']?></td>
               <td><?=$d['nama']?></td>
               <td><?=$d['nama_lab']?></td>
               <td><?=$d['matakuliah']?></td>
               <td><?=$d['nama_prodi']?></td>
               <td><?=$d['kelas']?></td>
               <td><?=$d['angkatan']?></td>
               <td><?=$d['semester']?> <?=$d['tahunajaran']?></td>
               <td>
                <!-- <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Nilai"><span class="glyphicon glyphicon-tasks"></span></a> -->
                <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Biodata"><span class="glyphicon glyphicon-th-list"></span></a> -->
                <a href="#" id="<?=$d[$pk]?>" class="btn btn-success btn-sm btn-editjadwal" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="page/<?=$page_act?>.php?aksi=delete&id=<?=$ids?>" class="btn btn-danger btn-sm cara2" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>              
              </td>
            </tr>
            <?php $n++;} ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>
</section>