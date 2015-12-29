<?php
$quebarang=mysql_query("SELECT * FROM tbpengadaan");
$page = "pengadaan";
$page_act = "pengadaan_act";
$tabel = "tbpengadaan";
$pk = "id_pengadaan";

if($_SESSION['id_level']==4){
$quejml = mysql_query("SELECT * FROM tbpengadaan WHERE view='0'");
$jml=mysql_num_rows($quejml);
if($jml!=0){
while($jp=mysql_fetch_array($quejml)){
  mysql_query("UPDATE tbpengadaan SET view='1' WHERE id_pengadaan='$jp[id_pengadaan]'");
}
}
}

?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
       <?php if($_SESSION['id_level']=='5'){ ?>
      <a href="javascript:void(0);" id="0" class="btn btn-primary btn-ls btn-tambahpengadaan" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-fw fa-plus"></i>Tambah Data
      </a>
      <?php } ?>
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
          <h3 class="box-title">Pengadaan Barang</h3>                                    
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
              <th>Nama Barang</th>
              <th>Jenis Barang</th>
              <th>Jumlah Barang</th>
              <th>Harga Satuan</th>
              <th>Jumlah Harga</th>
              <th>Keterangan</th>
              <th>Validasi</th>
            </tr>
          </thead>
          <tbody>
            <?php $n=1; while($d=mysql_fetch_array($quebarang)) {
              $ids=$d[$pk];
              ?>
              <tr>
               <td><?=$n?></td>
               <td><?=$d['nama_barang']?></td>
               <td><?=$d['jenis_barang']?></td>
               <td><?=$d['jumlah_barang']?></td>
               <td><?=buatrp($d['harga_satuan'])?></td>
               <td><?=buatrp($d['harga_satuan']*$d['jumlah_barang'])?></td>
               <td><?=$d['keterangan']?></td>
               <td>
               <a href="javascript:void(0);" id="<?=$d[$pk]?>" class="btn btn-success btn-sm btn-editpengadaan" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
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