<?php
if($_SESSION['id_level']=='1' or $_SESSION['id_level']=='3' or $_SESSION['id_level']=='4'){
  if(isset($_GET['filter']) and $_GET['filter']!=''){
    $filter=$_GET['filter'];
    $quepart="WHERE b.jumlah_rusak $filter";
  } else {
    $filter="";
    $quepart="";
  }  
} else {
    if(isset($_GET['filter']) and $_GET['filter']!=''){
    $filter=$_GET['filter'];
    $quepart="WHERE b.id_ruanglab='$_SESSION[id_ruanglab]' and b.kondisi $filter";
  } else {
    $filter="";
    $quepart="WHERE b.id_ruanglab='$_SESSION[id_ruanglab]'";
  } 
}


$quebarang=mysql_query("SELECT b.*,p.nama_penguasaan,r.kode_lab,r.nama_lab FROM tbbarang b
  LEFT JOIN tbpenguasaan p on b.penguasaan=p.id_penguasaan
  LEFT JOIN tbruanglab r on b.id_ruanglab=r.id_ruanglab
  $quepart
  ORDER BY b.id_barang DESC
  ");
$page = "barang";
$page_act = "barang_act";
$tabel = "tbbarang";
$pk = "id_barang";
?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <a href="javascript:void(0);" id="0" class="btn btn-primary btn-ls btn-tambah" data-toggle="modal" data-target="#myModal">
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
          <h3 class="box-title">Data Semua Barang</h3>                                    
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
          <div class="col-md-4">
            <div class="form-group">
            <select id="kondisi" name="kondisi" class="form-control">
                <option value="">Kondisi</option>
                <option value="=0" <?php if($filter=='=0'){echo "selected";} ?>>Baik</option>
                <option value=">0" <?php if($filter=='>0'){echo "selected";} ?>>Rusak</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Merk</th>
              <th>Kondisi</th>
              <th>Milik</th>
              <th>Penguasaan</th>
              <th>Tahun</th>
              <th>Jumlah</th>
              <th>Rusak</th>
              <th>Keterangan</th>
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
               <td><?=$d['nama_barang']?></td>
               <td><?=$d['merk']?></td>
               <?php if($d['jumlah_rusak']==0){$kondisib='Baik';} else {$kondisib='Rusak';} ?>
               <td><?=$kondisib?></td>
               <td><?=$d['milik']?></td>
               <td><?=$d['nama_penguasaan']?></td>
               <td><?=$d['tahun']?></td>
               <td><?=$d['jumlah_unit']?></td>
               <td><?=$d['jumlah_rusak']?></td>
               <td><?=$d['keterangan']?></td>
               <td><?=$d['kode_lab']?><?=$d['nama_lab']?></td>
               <td>
                <!-- <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Nilai"><span class="glyphicon glyphicon-tasks"></span></a> -->
                <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Biodata"><span class="glyphicon glyphicon-th-list"></span></a> -->
                <a href="javascript:void(0);" id="<?=$d['id_barang']?>" class="btn btn-success btn-sm btn-edit" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
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