<?php
session_start();
include "koneksi/koneksi.php";

if(isset($_GET['logadmin'])){
    session_destroy();
}

    // if(isset($_GET['logadmin']) and isset($_SESSION['idadmin'])){
    //     $v_log=date('j-n-Y, H:i');
    //     mysql_query("update admin set login_terakhir = '$v_log' where id_admin = '$_SESSION[idadmin]' ");
    //     $_SESSION['id']=NULL;
    //     session_destroy();

    // }    

    ?>
    <!DOCTYPE html>
    <html >

    <head>

        <meta charset="utf-8">
        <title>Fullscreen Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <style type="text/css">
        /*.border{
            border: solid;
            width: 320px;
            border-radius: 20px;
        }*/
        .pic {
            cursor: pointer;
            max-width:50% !important;
    height:auto;
    /*display:block;*/
        }
        h2{
            color: #FA5655;
        }

        #adminbtn {
            background: url('assets/img/admin.png');
        }
        .adminselect{background: url('assets/img/adminselect.png');}

        #adminbtn:focus{
            background: url('assets/img/adminselect.png');
        }

        #siswabtn {
            background: url('assets/img/siswa.png');
        }
        .siswaselect{
            background: url('assets/img/adminselect.png');
        }

        #siswabtn:focus{
            background: url('assets/img/siswaselect.png');
        }      
#adminform, #siswaform{
    display: none;
}
.header-login{
    width: 100%;
    height: 35px;
    background: rgba(25,0,0,0.5);
}
.title-header{
    font-size: 18px;
    padding: 5px;
}

#footer {
   position:absolute;
   bottom:0;
   width:100%;
   height:30px;   /* Height of the footer */
   background:rgba(25,0,0,0.5);
   text-align: left;
}
.text-footer{
    padding: 5px;
    margin-bottom: 5px;
    font-size: 12px;
    color: #3E3E3F;
}
small{
    font-size: 10px;
}
.content{
    font-size: 36px;
    outline-color: #1A1A1A;
    color: rgba(7,114,236,0.7);
    font-weight: bold;
}
</style>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->

        </head>

        <body>          
            <div class="header-login"><div class="title-header"><strong >SIMA-LAB TEKNIK INFORMATIKA UNESA</strong></div></div>
            <?php 
            if(isset($_GET['off'])){
                echo '<h2><b>Username And Password Expired</b></h2>';    
            }
        ?>
            <img id="adminbtn" class="pic" src="assets/img/admin.png">
            <img id="siswabtn" class="pic" src="assets/img/siswa.png">
            <div id="siswaform" class="page-container border">
                <br>
                <h1>PESERTA DIDIK</h1>
                <form action="index.php" method="post">
                    <input type="text" name="userid" class="username" placeholder="Username">
                    <input type="password" name="password" class="password" placeholder="Password">
                    <button type="submit">MASUK SISTEM</button>
                    <div class="error"><span>+</span></div>
                </form>
                <br>
                <b class="text-footer">© 2015 Powered</b>   
            </div> 

            <div id="adminform" class="page-container border">
                <br>
                <h1>ADMINISTRATOR</h1>
                <form action="admin/index.php" method="post">
                    <input type="text" name="userid" class="username" placeholder="Username">
                    <input type="password" name="password" class="password" placeholder="Password">
                    <button type="submit">LOGIN NOW</button>
                    <div class="error"><span>+</span></div>
                </form>
                <br>
                <b class="text-footer">© 2015 Powered</b>   
            </div>
             

            <!-- Javascript -->
            <script src="assets/js/jquery-1.8.2.min.js"></script>
            <script src="assets/js/supersized.3.2.7.min.js"></script>
            <script src="assets/js/supersized-init.js"></script>
            <script src="assets/js/scripts.js"></script>

        </body>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#siswaform #adminform').hide();

                $('#adminbtn').click(function() {
                    $('#siswaform').hide('slow', function() {
                        $('#adminform').show('slow');
                        $('#adminbtn').attr('src','assets/img/adminselect.png');
                        $('#siswabtn').attr('src','assets/img/siswa.png');

                    });
                });
                $('#siswabtn').click(function() {
                    $('#adminform').hide('slow', function() {
                        $('#siswaform').show('slow');
                        $('#siswabtn').attr('class','pic siswaselect');
                        $('#siswabtn').attr('src','assets/img/siswaselect.png');
                        $('#adminbtn').attr('src','assets/img/admin.png');

                    });
                });
            });
        </script>
        </html>

