<?php
if($_SESSION['id_level']=='1' or $_SESSION['id_level']=='3' or $_SESSION['id_level']=='4'){
  $quepart="";  
} else {
  $quepart="WHERE b.id_ruanglab='$_SESSION[id_ruanglab]'";
}
$quebarang=mysql_query("SELECT b.*,r.kode_lab,r.nama_lab FROM tbbaranghabis b JOIN tbruanglab r on b.id_ruanglab=r.id_ruanglab
$quepart
ORDER BY b.id_baranghabis DESC
 ");
$page = "baranghabis";
$page_act = "baranghabis_act";
$tabel = "tbbaranghabis";
$pk = "id_baranghabis";
?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <a href="javascript:void(0);" id="0" class="btn btn-primary btn-ls btn-tambahbaranghabis" data-toggle="modal" data-target="#myModal">
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
          <h3 class="box-title">Data Barang Habis Pakai</h3>                                    
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
              <th>Tanggal Terima</th>
              <th>No Surat Bon</th>
              <th>Tangal Bon</th>
              <th>Untuk Bahan</th>
              <th>Banyaknya</th>
              <th>Nama Barang</th>
              <th>Harga Satuan</th>
              <th>Tanggal Penyerahan</th>
              <th>Ruangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $n=1; while($d=mysql_fetch_array($quebarang)) {
              $ids=$d[$pk];
              ?>
              <tr>
               <td><?=$n?></td>
               <td><?=$d['tanggal_terima']?></td>
               <td><?=$d['nosuratbon']?></td>
               <td><?=$d['tanggalsuratbon']?></td>
               <td><?=$d['kegunaan']?></td>
               <td><?=$d['jumlah']?></td>
               <td><?=$d['nama_barang']?></td>
               <td><?=$d['harga_satuan']?></td>
               <td><?=$d['tanggal_penyerahan']?></td>
               <td><?=$d['kode_lab']?> <?=$d['nama_lab']?></td>
               <td>
                <!-- <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Nilai"><span class="glyphicon glyphicon-tasks"></span></a> -->
                <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Biodata"><span class="glyphicon glyphicon-th-list"></span></a> -->
                <a href="javascript:void(0);" id="<?=$d[$pk]?>" class="btn btn-success btn-sm btn-editbaranghabis" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
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