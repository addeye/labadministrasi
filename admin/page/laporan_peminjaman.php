<?php
if($_SESSION['id_level']=='1'){
  $quepart="";  
} else {
  $quepart="WHERE b.id_ruanglab='$_SESSION[id_ruanglab]'";
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
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Rekap Data Barang Per Ruang</h3>
        </div>
        <div class="box-body">
        <div class="row">
        <div class="col-md-6">        
          <div class="form-group">
            <select name="ruanglab" class="form-control">
              <option>Pilih ruangan</option>
              <?php $quelb=mysql_query("SELECT * FROM tbruanglab");
              while($ru = mysql_fetch_array($quelb)) { ?>
              <option value="<?=$ru['id_ruanglab']?>"><?=$ru['kode_lab']?> <?=$ru['nama_lab']?></option>
              <?php } ?>
            </select>           
          </div>
          </div>
          <div class="col-md-6">
            <button class="btn btn-primary btn-ls btn-tambah">Cetak</button>
          </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Semua Barang</h3>                                    
        </div><!-- /.box-header -->
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
                 <td><?=$d['kondisi']?></td>
                 <td><?=$d['milik']?></td>
                 <td><?=$d['nama_penguasaan']?></td>
                 <td><?=$d['tahun']?></td>
                 <td><?=$d['jumlah_unit']?></td>
                 <td><?=$d['jumlah_rusak']?></td>
                 <td><?=$d['keterangan']?></td>
               </tr>
               <?php $n++;} ?>
             </tbody>
           </table>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </div>
   </div>
 </section>