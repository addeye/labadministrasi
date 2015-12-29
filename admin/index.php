 <?php
 session_start();
 include "koneksi/koneksi.php";

 if(isset($_POST['userid']) and isset($_POST['password']) ){
 	$user = $_POST['userid'];
 	$pass = $_POST['password'];

 	$sqllogin = "SELECT u.*,t.nip_petugas,t.nama_petugas,t.ruanglab,r.kode_lab,r.nama_lab,l.`level`
 	FROM tbpengguna u 
 	LEFT JOIN tbpetugas t on u.id_petugas=t.id_petugas
 	LEFT JOIN tblevel l on u.id_level=l.id_level
 	LEFT JOIN tbruanglab r on t.ruanglab=r.id_ruanglab
 	WHERE t.nip_petugas='$user'
 	and `password`='$pass'";
 	$querylogin = mysql_query($sqllogin);
 	$cek = mysql_num_rows($querylogin);

 	if($cek!=0){
 		$r=mysql_fetch_array($querylogin);
 		$_SESSION['id'] = $r['id_pengguna'];
 		$_SESSION['id_petugas'] = $r['id_petugas'];
 		$_SESSION['nip'] = $r['nip_petugas'];
 		$_SESSION['nama'] = $r['nama_petugas'];
 		$_SESSION['level'] = $r['level'];
 		$_SESSION['id_level'] = $r['id_level'];
 		$_SESSION['id_ruanglab'] = $r['ruanglab'];
 		$_SESSION['kode_lab'] = $r['kode_lab'];
 		$_SESSION['nama_lab'] = $r['nama_lab'];
 	} 
 }

 if (!isset($_SESSION['id']) or $_SESSION['id']=='')
 {

 	header('Location: ../login.php?off');
 }  
$quejmlin = mysql_query("SELECT * FROM tbpengadaan WHERE view='0'");
$jmlin = mysql_num_rows($quejmlin);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>Dashboard SIMA-LAB</title>
 	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 	<!-- bootstrap 3.0.2 -->
 	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 	<!-- font Awesome -->
 	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
 	<!-- Ionicons -->
 	<link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
 	<!-- Morris chart -->
 	<link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
 	<!-- fullCalendar -->
 	<link href="../css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
 	<!-- DATA TABLES -->
 	<link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 	<!-- Theme style -->
 	<link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
 	<!-- Datepicker CSS -->
 	<link href="../css/datepicker.css" rel="stylesheet" type="text/css" />

 	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
          <style type="text/css">
/*             input[type="text"], select{
        text-transform: uppercase;
    }*/
    .status{background-color: #F89D90;}
    .aktif{background-color: #59C594;}
</style>
</head>
<body class="skin-blue fixed">
	<!-- header logo: style can be found in header.less -->
	<header class="header">
		<a href="index.php" class="logo">
			<!-- Add the class icon to your logo image or logo icon to add the margining -->
			<span class="glyphicon glyphicon-list-alt"></span> SIMA-LAB 
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="navbar-right">
				<ul class="nav navbar-nav">
				<?php if($_SESSION['id_level']==4){ ?>
				<li class="dropdown messages-menu">
                            <a href="?page=pengadaan">
                                <i class="fa fa-warning"></i>
                                <span class="label label-success"><?=$jmlin?></span>
                            </a>
                        </li>
                        <?php } ?>
					<!-- Messages: style can be found in dropdown.less-->

					<!-- Notifications: style can be found in dropdown.less -->

					<!-- Tasks: style can be found in dropdown.less -->

					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-user"></i>
							<span><?=$_SESSION['level']?> <?=$_SESSION['kode_lab']?><i class="caret"></i></span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-footer">                                    
								<div class="text-center">
									<a href="../login.php?logadmin" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="left-side sidebar-offcanvas">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="../img/avatar.png" class="img-circle" alt="User Image" />
					</div>
					<div class="pull-left info">
						<p></p>

						<a href="#"><i class="fa fa-circle text-success"></i><?=$_SESSION['nama']?></a>
					</div>
				</div>
				<?php 
				if($_SESSION['id_level']=='1'){
					include "sidemenu_admin.php";
				} else if ($_SESSION['id_level']=='2') {
					include "sidemenu_teknisi.php";
				} else if ($_SESSION['id_level']=='3') {
					include "sidemenu_kajur.php";
				} else if ($_SESSION['id_level']=='4') {
					include "sidemenu_kalab.php";
				} else {
					include "sidemenu_kasublab.php";
				}
				?>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Right side column. Contains the navbar and content of the page -->
		<aside class="right-side">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Halaman Utama
					<small><?=$_SESSION['nama_lab']?></small>
					<?php ?>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content-header">
				<?php
				if (isset ($_GET['page']) and file_exists("page/".$_GET['page'].".php"))
					{ include "page/".$_GET['page'].".php";} 
				else {include "page/depan.php";}
				?> 
			</section>
			<!-- /.content -->


		</aside><!-- /.right-side -->
	</div><!-- ./wrapper -->

	<!-- add new calendar event modal -->


	<!-- jQuery 2.0.2 -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery UI 1.10.3 -->
	<script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<!-- Morris.js charts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
	<!-- Sparkline -->
	<script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
	<!-- Datepicker Boostrap -->
	<script src="../js/bootstrap-datepicker.js" type="text/javascript"></script>
	<!-- DATA TABES SCRIPT -->
	<script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
	<script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
	<!-- fullCalendar -->
	<script src="../js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
	<!-- jQuery Knob Chart -->
	<script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
	<!-- iCheck -->
	<script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

	<!-- AdminLTE App -->
	<script src="../js/AdminLTE/app.js" type="text/javascript"></script>

	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<!-- <script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>      -->

	<!-- AdminLTE for demo purposes -->
	<script src="" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#kondisi').change(function(){
				valkondisi = $('#kondisi').val();
				window.location.href = "index.php?page=barang&filter="+valkondisi;
				console.log('deye');
			})
			$('.btn-cetakbarang').click(function(){
				id_ruang = $('#idruang').val();
				window.open('cetak/lap_rekapbarang.php?id_ruang='+id_ruang, '_blank');
				console.log(id_ruang);
			})
			$('.btn-cetakbaranghabis').click(function(){
				id_ruang = $('#idruang').val();
				semester = $('#semester').val();
				tahun_anggaran = $('#tahun_anggaran').val();
				window.open('cetak/lap_rekapbaranghabis.php?id_ruang='+id_ruang+'&sem='+semester+'&thn='+tahun_anggaran, '_blank');
				console.log(id_ruang);
			})

			$('.btn-cetakperbaikan').click(function(){
				id_ruang = $('#idruang').val();
				semester = $('#semester').val();
				tahun_anggaran = $('#tahun_anggaran').val();
				sumber_dana = $('#sumber_dana').val();
				window.open('cetak/lap_perbaikan.php?id_ruang='+id_ruang+'&sem='+semester+'&thn='+tahun_anggaran+'&sd='+sumber_dana, '_blank');
				console.log(id_ruang);
			})

			$('.btn-edit, .btn-tambah').click(function(){
				id_barang = this.id;
				$.get('page/barang_modal.php',{id:id_barang},function(data){
					$(".modal-content").html(data);
					$("#myModal").modal().show();
				});
			});
			$('.btn-editjadwal, .btn-tambahjadwal').click(function(){
				id_jadwal = this.id;
				$.get('page/jadwal_modal.php',{id:id_jadwal},function(data){
					$(".modal-content").html(data);
					$("#myModal").modal().show();
				});
			});
			$('.btn-editpeminjaman, .btn-tambahpeminjaman').click(function(){
				id_peminjaman = this.id;
				$.get('page/peminjaman_modal.php',{id:id_peminjaman},function(data){
					$(".modal-content").html(data);
					$("#myModal").modal().show();
				});
			});
			$('.btn-editperbaikan, .btn-tambahperbaikan').click(function(){
				id_perbaikan = this.id;
				$.get('page/perbaikan_modal.php',{id:id_perbaikan},function(data){
					$(".modal-content").html(data);
					$("#myModal").modal().show();
				});
			});
			$('.btn-editbaranghabis, .btn-tambahbaranghabis').click(function(){
				id_baranghabis = this.id;
				$.get('page/baranghabis_modal.php',{id:id_baranghabis},function(data){
					$(".modal-content").html(data);
					$("#myModal").modal().show();
				});
			});
			$('.btn-editrekom, .btn-tambahrekom').click(function(){
				id_rekom = this.id;
				$.get('page/rekom_modal.php',{id:id_rekom},function(data){
					$(".modal-content").html(data);
					$("#myModal").modal().show();
				});
			});
			$('.btn-editpengadaan, .btn-tambahpengadaan').click(function(){
				id_pengadaan = this.id;
				$.get('page/pengadaan_modal.php',{id:id_pengadaan},function(data){
					$(".modal-content").html(data);
					$("#myModal").modal().show();
				});
			});



			

		});
</script>
<script type="text/javascript">
	$(function() {
		$("#example1").dataTable();
		$("#examples").dataTable();
		$('#example2').dataTable({
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false
		});
		$('a.cara2').click(function(){
			if(! confirm('Yakin akan menghapus data ini?')){
				return false;    
			}
		});

	});
</script>

</body>
</html>