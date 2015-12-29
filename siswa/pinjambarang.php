<?php
$quebarang=mysql_query("SELECT pb.*,m.nim,m.nama,b.kode_barang,b.nama_barang,l.kode_lab,l.nama_lab
FROM tbpinjambarang pb
LEFT JOIN tbmahasiswa m on pb.id_mahasiswa=m.id_mahasiswa
LEFT JOIN tbbarang b on pb.id_barang=b.id_barang
LEFT JOIN tbruanglab l on pb.id_ruanglab=l.id_ruanglab
WHERE m.id_mahasiswa='$_SESSION[id_mahasiswa]'");

$page = "pinjambarang";
$page_act = "pinjambarang_act";
$tabel = "tbpinjambarang";
$pk = "id_pinjambarang";
?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <a href="#" id="0" class="btn btn-primary btn-ls btn-tambahpinjambarang" data-toggle="modal" data-target="#myModal">
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
          <h3 class="box-title">Status Pinjaman</h3>                                    
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
              <th>NIM</th>
              <th>Nama Mahasiswa</th>
              <th>Kode</th>
              <th>Barang</th>
              <th>Dipakai Di Ruang</th>
              <th>Jam</th>
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
               <td><?=$d['nim']?></td>
               <td><?=$d['nama']?></td>
               <td><?=$d['kode_barang']?></td>
               <td><?=$d['nama_barang']?></td>
               <td><?=$d['kode_lab']?> <?=$d['nama_lab']?></td>
               <td><?=$d['jam_mulai']?>-<?=$d['jam_akhir']?></td>
               <td><?=$d['tgl_pakai']?></td>
               <td>
                <!-- <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Nilai"><span class="glyphicon glyphicon-tasks"></span></a> -->
                <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Biodata"><span class="glyphicon glyphicon-th-list"></span></a> -->
                <a href="#" id="<?=$d[$pk]?>" class="btn btn-success btn-sm btn-editpinjambarang" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="siswa/<?=$page_act?>.php?aksi=delete&id=<?=$ids?>" class="btn btn-danger btn-sm cara2" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>              
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