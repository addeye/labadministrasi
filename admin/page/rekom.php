<?php
$filter='';
$quebarang=mysql_query("SELECT * FROM tbrekom");

$page = "rekom";
$page_act = "rekom_act";
$tabel = "tbrekom";
$pk = "id_rekom";
?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <a href="#" id="0" class="btn btn-primary btn-ls btn-tambahrekom" data-toggle="modal" data-target="#myModal">
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
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <select id="kondisi" name="kondisi" class="form-control">
                <option value="">Semester</option>
                <option value="Gasal" <?php if($filter=='Gasal'){echo "selected";} ?>>Gasal</option>
                <option value="Genap" <?php if($filter=='Genap'){echo "selected";} ?>>Genap</option>
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <input type="text" value="2015" name="tahun" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
          <button class="btn btn-info btn-ls btn-cetakbaranghabis">Cari</button>
          </div>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jumlah Unit</th>
              <th>Harga Satuan</th>
              <th>Keterangan</th>
              <th>Semester</th>
              <th>Tahun Anggaran</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $n=1; while($d=mysql_fetch_array($quebarang)) {
              $ids=$d[$pk];
              ?>
              <tr>
               <td><?=$n?></td>              
               <td><?=$d['nama_barang']?></td>
               <td><?=$d['jumlah_unit']?></td>
               <td><?=$d['harga_satuan']?></td>
               <td><?=$d['keterangan']?></td>
               <td><?=$d['semester']?></td>
               <td><?=$d['tahun_anggaran']?></td>
               <td>
                <!-- <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Nilai"><span class="glyphicon glyphicon-tasks"></span></a> -->
                <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Biodata"><span class="glyphicon glyphicon-th-list"></span></a> -->
                <a href="#" id="<?=$d[$pk]?>" class="btn btn-success btn-sm btn-editrekom" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
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