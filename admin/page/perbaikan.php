<?php
$quebarang=mysql_query("SELECT p.*,b.nama_barang,b.merk,j.jeniskerusakan,k.nama_penguasaan FROM tbperbaikan p 
LEFT JOIN tbbarang b on p.id_barang=b.id_barang
LEFT JOIN tbjeniskerusakan j on p.jenis_kerusakan=j.id_jeniskerusakan
LEFT JOIN tbpenguasaan k on p.sumber_dana=k.id_penguasaan
ORDER BY p.id_perbaikan DESC");

$page = "perbaikan";
$page_act = "perbaikan_act";
$tabel = "tbperbaikan";
$pk = "id_perbaikan";
?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <a href="#" id="0" class="btn btn-primary btn-ls btn-tambahperbaikan" data-toggle="modal" data-target="#myModal">
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
          <h3 class="box-title">Data Perbaikan</h3>                                    
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
              <th>No<br>kode<br>Barang</th>
              <th>Nama Barang</th>
              <th>Jenis Pemeliharaan</th>
              <th>Yang Memelihara</th>
              <th>Tanggal Pemeliharaan</th>
              <th>Biaya Pemeliharaan</th>
              <th>Bukti</th>
              <th>Ket</th>
              <th>Sumber</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $n=1; while($d=mysql_fetch_array($quebarang)) {
              $ids=$d[$pk];
              ?>
              <tr>
               <td><?=$n?></td>
               <td></td>
               <td><?=$d['nama_barang']?></td>
               <td><?=$d['jenis_pemeliharaan']?></td>
               <td><?=$d['pemelihara']?></td>
               <td><?=$d['tanggal_pemeliharaan']?></td>
               <td><?=$d['biaya_pemeliharaan']?></td>
               <td><?=$d['bukti_pemeliharaan']?></td>
               <td><?=$d['keterangan']?></td>               
               <td><?=$d['nama_penguasaan']?></td>               
               <td>
               <a href="#" id="<?=$d[$pk]?>" class="btn btn-success btn-sm btn-editperbaikan" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
               <?php if($_SESSION['id_level']=='5'){ ?>
                <!-- <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Nilai"><span class="glyphicon glyphicon-tasks"></span></a> -->
                <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Biodata"><span class="glyphicon glyphicon-th-list"></span></a> -->
                
                <a href="page/<?=$page_act?>.php?aksi=delete&id=<?=$ids?>" class="btn btn-danger btn-sm cara2" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>              
              <?php } else {
                  if($d['valid']=='0'){
                    $clsbtn='btn-danger';
                    $clsglyp ='glyphicon-unchecked';
                  } else {                    
                    $clsbtn='btn-info';
                    $clsglyp ='glyphicon-check';
                  }
                 ?>
                <a href="page/<?=$page_act?>.php?aksi=valid&id=<?=$ids?>&v=<?=$d['valid']?>" class="btn <?=$clsbtn?> btn-sm" data-placement="top" title="Edit"><span class="glyphicon <?=$clsglyp?>"></span></a>
                 <?php } ?>
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