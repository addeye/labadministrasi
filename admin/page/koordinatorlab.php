<?php
$page = "koordinatorlab";
$page_act = "koordinatorlab_act";
$tabel = "tbkoordinatorlab";
$pk = "id_koordinatorlab";

$que= mysql_query("select * from $tabel");
if(isset($_GET['edit'])){
	$quedata =mysql_query("select * from $tabel where $pk ='$_GET[id]' ");
	$data = mysql_fetch_array($quedata);

	$id_petugas = $data['id_petugas'];
	$id_ruang = $data['id_ruang'];
	$id = $data[$pk];
	$aksi = "update";
} else {
	$id_petugas = "";
	$id_ruang = "";
	$id = "";
	$aksi = "insert";
}

?>

<section class="content">
	<div class="row">
		<div class="col-md-4">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Tambah Koor</h3>
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
			<form role="form" method="post" action="page/<?=$page_act?>.php">
				<input type="hidden" name="id" value="<?=$id?>">
				<input type="hidden" name="aksi" value="<?=$aksi?>">
				<div class="box-body">
					<div class="form-group">
						<select name="prodi" class="form-control">
							<option>Pilih Prodi</option>
							<?php $queprodi=mysql_query("SELECT * FROM tbprodi");
							while($pro=mysql_fetch_array($queprodi)){ ?>
							<option value="<?=$pro['id_prodi']?>" <?php if($pro['id_prodi']==$prodi){echo "selected";} ?>><?=$pro['nama_prodi']?></option>
							<?php } ?> 
						</select>
					</div>
					<div class="form-group">
						<input class="form-control" name="angkatan" value="<?=$angkatan?>" placeholder="Tahun Angkatan" required type="text">
					</div> 
					<div class="form-group">
						<select name="kelas" class="form-control">
							<option value="A" <?php if($kelas=='A'){echo "selected";} ?>>A</option>
							<option value="B" <?php if($kelas=='B'){echo "selected";} ?>>B</option>
							<option value="C" <?php if($kelas=='C'){echo "selected";} ?>>C</option>
							<option value="D" <?php if($kelas=='D'){echo "selected";} ?>>D</option>
							<option value="E" <?php if($kelas=='E'){echo "selected";} ?>>E</option>
						</select>
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
				<h3 class="box-title">Daftar Koor</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<div class="box-body table-responsive">
				<table id="example1" class="table table-bordered">
					<thead>
						<tr>
							<th>NO</th>
							<th>Prodi</th>
							<th>Angkatan</th>
							<th>Kelas</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $n=1; 
					while($d=mysql_fetch_array($que)) { 
						$ids=$d[$pk];
						?>
					<tr>
					<td><?=$n?></td>
					<td><?=$d['nama_prodi']?></td>
					<td><?=$d['angkatan']?></td>
					<td><?=$d['kelas']?></td>
					<td>
						<a href="index.php?page=<?=$page?>&edit&id=<?=$ids?>" class="btn btn-success btn-sm btn-edit" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
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