<?php
$page = "dosen";
$page_act = "dosen_act";
$tabel = "tbdosen";
$pk = "id_dosen";

$que= mysql_query("select * from $tabel");
if(isset($_GET['edit'])){
	$quedata =mysql_query("select * from $tabel where $pk ='$_GET[id]' ");
	$data = mysql_fetch_array($quedata);

	$nip = $data['nip'];
	$nama = $data['nama'];
	$id = $data['id_dosen'];
	$aksi = "update";
} else {
	$nip = "";
	$nama = "";
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
					<h3 class="box-title">Tambah Dosen</h3>
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
						<input class="form-control" name="nip" value="<?=$nip?>" placeholder="NIP" required type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="nama" value="<?=$nama?>" placeholder="Nama Dosen" required type="text">
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
				<h3 class="box-title">Daftar Dosen</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<div class="box-body table-responsive">
				<table id="example1" class="table table-bordered">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIP</th>
							<th>Nama Dosen</th>							
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
					<td><?=$d['nip']?></td>
					<td><?=$d['nama']?></td>
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