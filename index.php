 <?php
 session_start();
 include "admin/koneksi/koneksi.php";

 if(isset($_POST['userid']) and isset($_POST['password']) ){
 	$sqllogin = "select * from tbmahasiswa where nim='$_POST[userid]' and password='$_POST[password]'";
 	$querylogin = mysql_query($sqllogin);
 	$cek = mysql_num_rows($querylogin);

 	if($cek!=0){
 		$r=mysql_fetch_array($querylogin);
 		$_SESSION['id_mahasiswa'] = $r['id_mahasiswa'];
    $_SESSION['nama_mahasiswa'] = $r['nama'];
    $_SESSION['nim'] = $r['nim'];

  } 
}

if (empty($_SESSION['id_mahasiswa']) )
{
 header('Location: login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Dashboard E-Data</title>
 <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 <!-- bootstrap 3.0.2 -->
 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 <!-- font Awesome -->
 <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
 <!-- Ionicons -->
 <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
 <!-- Morris chart -->
 <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
 <!-- jvectormap -->
 <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
 <!-- fullCalendar -->
 <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
 <!-- Daterange picker -->
 <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
 <!-- bootstrap wysihtml5 - text editor -->
 <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
 <!-- Theme style -->
 <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
 <!-- Datepicker CSS -->
 <link href="css/datepicker.css" rel="stylesheet" type="text/css" />

 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
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
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <i class="glyphicon glyphicon-user"></i>
                 <span>MAHASISWA<i class="caret"></i></span>
               </a>
               <ul class="dropdown-menu">
                 <!-- User image -->
                 <li class="user-header bg-light-blue">
                  <img src="foto/avatar2.png" class="img-circle" alt="User Image" />
                  <p>
                   <?=$_SESSION['nama_mahasiswa']?>
                   <small>NIS <?=$_SESSION['nim']?></small>
                 </p>
               </li>
               <!-- Menu Body -->
               <li class="user-body">
                <div class="col-xs-4 text-center">
                 <a href="#"></a>
               </div>
               <div class="col-xs-4 text-center">
                 <a href="?siswa=settingsiswa"><i class="fa fa-wrench"></i>Setting</a>
               </div>
               <div class="col-xs-4 text-center">
                 <a href="#"></a>
               </div>
             </li>
             <!-- Menu Footer-->
             <li class="user-footer">
              <div class="pull-left">
               <a href="?siswa=biodatasiswa" class="btn btn-default btn-flat">Biodata</a>
             </div>
             <div class="pull-right">
               <a href="login.php?logadmin" class="btn btn-default btn-flat">Sign out</a>
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
      <img src="foto/avatar2.png" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
      <p></p>

      <a href="#"><i class="fa fa-circle text-success"></i> <?=$_SESSION['nama_mahasiswa']?></a>
    </div>
  </div>
  <!-- search form -->
                   <!--  <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                      </form> -->
                      <!-- /.search form -->
                      <!-- sidebar menu: : style can be found in sidebar.less -->
                      <ul class="sidebar-menu">
                       <li>
                        <a href="index.php">
                         <i class="fa fa-home"></i> <span>Beranda</span>
                       </a>
                     </li>
                     <li>
                      <a href="?siswa=peminjaman">
                        <i class="fa fa-pencil-square"></i> <span>Pinjam Ruang</span>
                      </a>
                    </li>
                    <li>
                      <a href="?siswa=pinjambarang">
                        <i class="fa fa-pencil-square"></i> <span>Pinjam Barang</span>
                      </a>
                    </li>
                    <li>
                      <a href="?siswa=prestasi">
                        <i class="fa fa-pencil-square"></i> <span>Riwayat Peminjaman</span>
                      </a>
                    </li>                       
                  </ul>
                </section>
                <!-- /.sidebar -->
              </aside>

              <!-- Right side column. Contains the navbar and content of the page -->
              <aside class="right-side">
               <!-- Content Header (Page header) -->
               <section class="content-header">
                <h1>
                 Halaman Utama
                 <small>Siswa</small>
               </h1>
               <ol class="breadcrumb">
                 <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                 <li class="active">Dashboard</li>
               </ol>
             </section>

             <!-- Main content -->
             <?php
             if (isset ($_GET['siswa']) and file_exists("siswa/".$_GET['siswa'].".php"))
              { include "siswa/".$_GET['siswa'].".php";} 
            else {include "siswa/depan.php";}
            ?>    
            <!--END Main content -->

          </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

        <!-- jQuery 2.0.2 -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Datepicker Boostrap -->
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!-- // <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>      -->

        <!-- AdminLTE for demo purposes -->
        <script src="" type="text/javascript"></script>

        <!-- Page script -->
        <script type="text/javascript">
          $(function() {

                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
                function(start, end) {
                  $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                  checkboxClass: 'icheckbox_minimal',
                  radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                  checkboxClass: 'icheckbox_minimal-red',
                  radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                  checkboxClass: 'icheckbox_flat-red',
                  radioClass: 'iradio_flat-red'
                });


              });
</script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.btn-editpeminjaman, .btn-tambahpeminjaman').click(function(){
      id_peminjaman = this.id;
      $.get('siswa/peminjaman_modal.php',{id:id_peminjaman},function(data){
        $(".modal-content").html(data);
        $("#myModal").modal().show();
      });
    });
    $('.btn-editpinjambarang, .btn-tambahpinjambarang').click(function(){
      id_pinjambarang = this.id;
      $.get('siswa/pinjambarang_modal.php',{id:id_pinjambarang},function(data){
        $(".modal-content").html(data);
        $("#myModal").modal().show();
      });
    });

    $('#ruang,#semester,#tahunajaran').change(function(){
      valsemester = $('#semester').val();
      valtahunajaran = $('#tahunajaran').val();
      valruang = $('#ruang').val();
      if(valruang!='' && valsemester!='' && valtahunajaran!=''){
        $('#carijadwal').removeClass('disabled');
      }
        // console.log(valsemester);
      })
    $('#carijadwal').click(function(){
      valsemester = $('#semester').val();
      valtahunajaran = $('#tahunajaran').val();
      valruang = $('#ruang').val();
      window.location.href = "index.php?filter&ruang="+valruang+"&semester="+valsemester+"&tahunajaran="+valtahunajaran;
      console.log('deye');
    })

  });
</script>
<script type="text/javascript">
  $(function() {
    $("#example1").dataTable();
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

