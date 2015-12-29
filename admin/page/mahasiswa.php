<?php
$page = "mahasiswa";
$page_act = "mahasiswa_act";
$tabel = "tbmahasiswa";
$pk = "id_mahasiswa";

$que= mysql_query("SELECT m.*,p.nama_prodi,r.kelas,r.angkatan FROM tbmahasiswa m LEFT JOIN tbrombel r on m.id_rombel=r.id_rombel LEFT JOIN tbprodi p ON r.prodi=p.id_prodi");
if(isset($_GET['edit'])){
	$quedata =mysql_query("select * from $tabel where $pk ='$_GET[id]' ");
	$data = mysql_fetch_array($quedata);

	$nim = $data['nim'];
	$nama = $data['nama'];
	$id_rombel = $data['id_rombel'];
	$id = $data['id_mahasiswa'];
	$aksi = "update";
} else {
	$nim = "";
	$nama = "";
	$id_rombel = "";
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
					<h3 class="box-title">Tambah Mahasiswa</h3>
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
						<input class="form-control" name="nim" value="<?=$nim?>" placeholder="NIM Mahasiswa" required type="text">
					</div>
					<div class="form-group">
						<input class="form-control" name="nama" value="<?=$nama?>" placeholder="Nama Mahasiswa" required type="text">
					</div>
					<div class="form-group">
						<select name="id_rombel" class="form-control">
							<option value="">Pilih Rombel</option>
							<?php $querom=mysql_query("SELECT r.*,p.nama_prodi FROM tbrombel r LEFT JOIN tbprodi p on r.prodi=p.id_prodi");
							while($r=mysql_fetch_array($querom)){ ?>
							<option value="<?=$r['id_rombel']?>" <?php if($r['id_rombel']==$id_rombel){echo "selected";} ?> ><?=$r['nama_prodi']?> <?=$r['kelas']?> <?=$r['angkatan']?></option>
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
				<h3 class="box-title">Daftar Mahasiswa</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<div class="box-body table-responsive">
				<table id="example1" class="table table-bordered">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIM</th>
							<th>Nama Mahasiswa</th>							
							<th>Prodi</th>							
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
					<td><?=$d['nim']?></td>
					<td><?=$d['nama']?></td>
					<td><?=$d['nama_prodi']?> <?=$d['kelas']?> <?=$d['angkatan']?></td>
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