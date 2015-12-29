<?php
$que= mysql_query("select * from biodata where aktif!='N' ORDER BY log DESC");

?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <button type="button" class="btn btn-primary btn-ls" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-fw fa-plus"></i>Tambah Data
      </button>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <form method="post" action="page/datasiswa_import_act.php">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data Siswa</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">      
                  <input type="text" class="form-control" name="nis" placeholder="NIS" data-toggle="tooltip" data-placement="bottom" title="NIS PESERTA DIDIK" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="nama" placeholder="NAMA SISWA" data-toggle="tooltip" data-placement="bottom" title="NAMA SISWA" required>
                </div>
                <div class="form-group"> 
                 <label for="exampleInputEmail1">Jenis Kelamin</label>
                 <div class="radio">
                  <label>
                    <input type="radio" checked name="jeniskelamin" id="optionsRadios1" value="L">
                    Laki-laki
                  </label>
                </div>  
                <div class="radio">
                  <label>
                    <input type="radio" name="jeniskelamin" id="optionsRadios1" value="P" >
                    Perempuan
                  </label>
                </div>                                            
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="keysiswa" placeholder="Password" data-toggle="tooltip" data-placement="bottom" title="Password" required >
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="save" class="btn btn-primary">Save</button>
            </div>
          </form>
          <form method="post" enctype="multipart/form-data" id="form-import" action="page/datasiswa_import_act.php">
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputFile">File Input</label>
                <input id="exampleInputFile" name="file" type="file">
                <p class="help-block"><a href="file/template_data_siswa.xlsx"><i class="fa fa-fw fa-cloud-download"></i>Download Tamplate</a></p>
              </div>
              <div class="box-footer">
                <button type="submit" name="import" class="btn btn-primary"><i class="fa fa-fw fa-file"></i>IMPORT</button>
              </div>
            </div>
          </form>            
        </div>
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
            <th>NO</th>
            <th>NO UJIAN</th>
            <th>NAMA SISWA</th>
            <th>L/P</th>
            <th>KEY SISWA</th>
            <th>UPDATE</th>
            <th>ACTION</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $n = 1;
          while ($d=mysql_fetch_array($que)) { ?>
          <tr>
            <td><?=$n?></td>
            <td><?=$d['no_unas']?></td>
            <td><?=$d['namasiswa']?></td>
            <td><?=$d['jeniskelamin']?></td>
            <td><?=$d['keysiswa']?></td>
            <td><?=$d['log']?></td>
            <td>
              <a href="?page=nilai_siswa&id=<?=$d['id']?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Nilai"><span class="glyphicon glyphicon-tasks"></span></a>
              <a href="?page=datasiswa_view&id=<?=$d['id']?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Biodata"><span class="glyphicon glyphicon-th-list"></span></a>
              <a href="index.php?page=datasiswa_up&id=<?=$d['id']?>" class="btn btn-success btn-sm btn-edit" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
              <a href="page/datasiswa_import_act.php?hapus&id=<?=$d['id']?>" class="btn btn-danger btn-sm cara2" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>              
            </td>
            <td><a href="page/cetak_buku_induk.php" class="btn btn-flat" target="_blank"><i class="fa fa-print"></i> Print</a></td>            
          </tr>
          <?php $n++; } ?>
        </tbody>
        <tfoot>
          <tr>
           <th>NO</th>
           <th>NIS</th>
           <th>NAMA SISWA</th>
           <th>L/P</th>
           <th>KEY SISWA</th>
           <th>UPDATE</th>
           <th>ACTION</th>
         </tr>
       </tfoot>
     </table>
   </div><!-- /.box-body -->
 </div><!-- /.box -->
</div>
</div>
</section>