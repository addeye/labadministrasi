<?php
if($_SESSION['id_level']=='1' or $_SESSION['id_level']=='3' or $_SESSION['id_level']=='4'){
  $quepart="";  
} else {
  $quepart="WHERE p.id_ruanglab='$_SESSION[id_ruanglab]'";
}
$quebarang=mysql_query("SELECT p.*,m.nim,m.nama,r.kode_lab,r.nama_lab,pro.nama_prodi,ro.kelas,ro.angkatan FROM tbpeminjaman p 
LEFT JOIN tbmahasiswa m on p.id_mahasiswa=m.id_mahasiswa
LEFT JOIN tbruanglab r on p.id_ruanglab=r.id_ruanglab
LEFT JOIN tbrombel ro on m.id_rombel=ro.id_rombel
LEFT JOIN tbprodi pro on ro.prodi=pro.id_prodi
$quepart
ORDER BY p.id_peminjaman DESC");

$page = "peminjaman";
$page_act = "peminjaman_act";
$tabel = "tbpeminjaman";
$pk = "id_peminjaman";
?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <a href="#" id="0" class="btn btn-primary btn-ls btn-tambahpeminjaman" data-toggle="modal" data-target="#myModal">
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
          <h3 class="box-title">Data Semua Pinjaman</h3>                                    
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
              <th>Jam</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Prodi</th>
              <th>Kelas</th>
              <th>Angkatan</th>
              <th>Ruang</th>
              <th>Tanggal</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $n=1; while($d=mysql_fetch_array($quebarang)) {
              $ids=$d[$pk];
              ?>
              <tr>
               <td><?=$n?></td>
               <td><?=$d['jam_mulai']?>-<?=$d['jam_akhir']?></td>
               <td><?=$d['nim']?></td>
               <td><?=$d['nama']?></td>
               <td><?=$d['nama_prodi']?></td>
               <td><?=$d['kelas']?></td>
               <td><?=$d['angkatan']?></td>
               <td><?=$d['kode_lab']?> <?=$d['nama_lab']?></td>
               <td><?=$d['tgl_pakai']?></td>
               <td>
                <!-- <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Nilai"><span class="glyphicon glyphicon-tasks"></span></a> -->
                <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Biodata"><span class="glyphicon glyphicon-th-list"></span></a> -->
                <a href="#" id="<?=$d[$pk]?>" class="btn btn-success btn-sm btn-editpeminjaman" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
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