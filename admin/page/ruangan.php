<?php
$page = "ruangan";
$page_act = "ruangan_act";

$que= mysql_query("select * from tbruanglab");
if(isset($_GET['edit'])){
	$quedata =mysql_query("select * from tbruanglab where id_ruanglab ='$_GET[id]' ");
	$data = mysql_fetch_array($quedata);

	$nama_lab = $data['nama_lab'];
	$kode_lab = $data['kode_lab'];
	$id_ruanglab = $data['id_ruanglab'];
	$aksi = "update";
} else {
	$nama_lab = "";
	$kode_lab = "";
	$id_ruanglab = "";
	$aksi = "insert";
}

?>

<section class="content">
	<div class="row">
		<div class="col-md-4">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Tambah Ruangan</h3>
				</div><!-- /.box-header -->
				<?php
				if(isset($_GET['in'])){
					echo ' <div class="alert alert-success alert-dismissable">
					<i class="fa fa-check"></i>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<b>Pemberitahuan!</b> Data Berhasil Masuk.
				</div>';
			}
			?>
			<!-- form start -->
			<form role="form" method="post" action="page/ruangan_act.php">
				<input type="hidden" name="id" value="<?=$id_ruanglab?>">
				<input type="hidden" name="aksi" value="<?=$aksi?>">
				<div class="box-body">
					<div class="form-group">
						<input class="form-control" name="kode_lab" value="<?=$kode_lab?>" placeholder="kode Ruangan" required type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="nama_lab" value="<?=$nama_lab?>" placeholder="nama Ruangan" required type="text">
					</div>                
				</div><!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" name="save" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div><!-- /.box -->                            
	</div>

	<div class="col-md-8">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Daftar Ruangan</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<div class="box-body table-responsive">
				<table id="example1" class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode RUANGAN</th>
							<th>Nama Ruangan</th>							
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $n=1; 
					while($d=mysql_fetch_array($que)) { ?>
					<tr>
					<td><?=$n?></td>
					<td><?=$d['kode_lab']?></td>
					<td><?=$d['nama_lab']?></td>
					<td>
						<a href="index.php?page=<?=$page?>&edit&id=<?=$d['id_ruanglab']?>" class="btn btn-success btn-sm btn-edit" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="page/<?=$page_act?>.php?aksi=delete&id=<?=$d['id_ruanglab']?>" class="btn btn-danger btn-sm cara2" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
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