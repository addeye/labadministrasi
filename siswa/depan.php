<?php
if(isset($_GET['filter'])){
	$thn = $_GET['tahunajaran'];
	$sem = $_GET['semester'];
	$ruang = $_GET['ruang'];
	$quesub = "WHERE r.id_ruanglab='$_GET[ruang]'
	and j.semester='$_GET[semester]'
	and j.tahun_ajaran='$_GET[tahunajaran]'";
} else {
	$thn ='';
	$sem ='';
	$ruang ='';
	$quesub='';
}
$quebarang=mysql_query("SELECT j.*,d.nip,d.nama,m.matakuliah,r.kode_lab,r.nama_lab,pro.nama_prodi,rm.kelas,rm.angkatan,th.tahunajaran,h.nama_hari FROM tbjadwal j 
	LEFT JOIN tbdosen d on j.id_dosen=d.id_dosen
	LEFT JOIN tbruanglab r on j.id_ruang=r.id_ruanglab
	LEFT JOIN tbmatakuliah m on j.id_matakuliah=m.id_matakuliah
	LEFT JOIN tbrombel rm on j.id_rombel=rm.id_rombel
	LEFT JOIN tbprodi pro on rm.prodi=pro.id_prodi
	LEFT JOIN tbtahunajaran th on j.tahun_ajaran=th.id_tahunajaran
	LEFT JOIN tbhari h on j.id_hari=h.id_hari
	$quesub
	ORDER BY h.id_hari ASC");
$page = "jadwal";
$page_act = "jadwal_act";
$tabel = "tbjadwal";
$pk = "id_jadwal";
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Jadwal Lab</h3>                                    
				</div><!-- /.box-header -->
				<div class="col-md-3">
					<div class="form-group">
						<select id="ruang" class="form-control">
							<option value="">Pilih Ruang</option>
							<?php $quelab=mysql_query("SELECT * FROM tbruanglab");
							while($l = mysql_fetch_array($quelab)){
								?>							
								<option value="<?=$l['id_ruanglab']?>" <?php if($l['id_ruanglab']==$ruang){echo "selected";} ?> ><?=$l['kode_lab']?> <?=$l['nama_lab']?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<select id="semester" class="form-control">
								<option value="">Semester</option>
								<option value="Gasal" <?php if($sem=='Gasal'){echo "selected";} ?> >Gasal</option>
								<option value="Genap" <?php if($sem=='Genap'){echo "selected";} ?>>Genap</option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<select id="tahunajaran" class="form-control">
								<option value="">Tahun Ajaran</option>
								<?php $quethn=mysql_query("SELECT * FROM tbtahunajaran");
								while($t=mysql_fetch_array($quethn)){?>
								<option value="<?=$t['id_tahunajaran']?>" <?php if($t['id_tahunajaran']==$thn){echo "selected";} ?> ><?=$t['tahunajaran']?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<button id="carijadwal" class="btn btn-info disabled">Cari</button>
						</div>
					</div>
					<div class="box-body table-responsive">
						<table id="" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Hari</th>
									<th>Jam</th>
									<th>Nama Dosen</th>
									<th>Ruang</th>
									<th>Matakuliah</th>
									<th>Program Studi</th>
									<th>Kelas</th>
									<th>Angkatan</th>
									<th>Semester</th>
								</tr>
							</thead>
							<tbody>
								<?php $n=1; while($d=mysql_fetch_array($quebarang)) {
									$ids=$d[$pk];
									?>
									<tr>
										<td><?=$n?></td>
										<td><?=$d['nama_hari']?></td>
										<td><?=$d['jam_mulai']?>-<?=$d['jam_selesai']?></td>
										<td><?=$d['nama']?></td>
										<td><?=$d['nama_lab']?></td>
										<td><?=$d['matakuliah']?></td>
										<td><?=$d['nama_prodi']?></td>
										<td><?=$d['kelas']?></td>
										<td><?=$d['angkatan']?></td>
										<td><?=$d['semester']?> <?=$d['tahunajaran']?></td>             
									</tr>
									<?php $n++;} ?>
								</tbody>
							</table>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
			</div>
		</section>