<?php
$page = "pengguna";
$page_act = "pengguna_act";
$tabel = "tbpengguna";
$pk = "id_pengguna";

$que= mysql_query("SELECT p.*,t.nip_petugas,t.nama_petugas,l.`level` FROM $tabel p 
LEFT JOIN tbpetugas t on p.id_petugas=t.id_petugas
LEFT JOIN tblevel l on p.id_level=l.id_level");
if(isset($_GET['edit'])){
	$quedata =mysql_query("select * from $tabel where $pk ='$_GET[id]' ");
	$data = mysql_fetch_array($quedata);

	$id_petugas = $data['id_petugas'];
	$password = $data['password'];
	$id_level = $data['id_level'];
	$id = $data[$pk];
	$aksi = "update";
} else {
	$id_petugas = "";
	$password = "";
	$id_level = "";
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
					<h3 class="box-title">Tambah Petugas</h3>
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
						<select name="id_petugas" class="form-control">
							<option>Pilih Petugas</option>
							<?php $quepetugas=mysql_query("SELECT * FROM tbpetugas");
							while($pt=mysql_fetch_array($quepetugas)){ ?>
							<option value="<?=$pt['id_petugas']?>" <?php if($pt['id_petugas']==$id_petugas){echo "selected";} ?> ><?=$pt['nama_petugas']?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<input class="form-control" name="password" value="<?=$password?>" placeholder="Password" required type="text">
					</div>
					<div class="form-group">
						<select name="id_level" class="form-control">
							<option value="">Pilih Level</option>
							<?php $quelevel=mysql_query("SELECT * FROM tblevel");
							while($l=mysql_fetch_array($quelevel)){ ?>
							<option value="<?=$l['id_level']?>" <?php if($l['id_level']==$id_level){echo "selected";} ?> ><?=$l['level']?></option>
							<?php } ?>
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
				<h3 class="box-title">Daftar Petugas</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<div class="box-body table-responsive">
				<table id="example1" class="table table-bordered">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIP</th>
							<th>Petugas</th>
							<th>Password</th>							
							<th>Level</th>							
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
					<td><?=$d['nip_petugas']?></td>
					<td><?=$d['nama_petugas']?></td>
					<td><?=$d['password']?></td>
					<td><?=$d['level']?></td>
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