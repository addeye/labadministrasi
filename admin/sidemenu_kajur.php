<ul class="sidebar-menu">
<li class="<?php if(!$_GET['page']){echo 'active';} ?>">
    <a href="index.php">
        <i class="fa fa-home"></i> <span>BERANDA</span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>LABORATORIUM</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class=""><a href="?page=barang"><i class="fa fa-angle-double-right"></i> BARANG</a></li>
        <li class=""><a href="?page=baranghabis"><i class="fa fa-angle-double-right"></i> BARANG HABIS</a></li>
        <li class=""><a href="?page=jadwal"><i class="fa fa-angle-double-right"></i> JADWAL</a></li>
        <li class=""><a href="?page=peminjaman"><i class="fa fa-angle-double-right"></i> PEMINJAMAN</a></li>
        <li class=""><a href="?page=perbaikan"><i class="fa fa-angle-double-right"></i> PERBAIKAN</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>LAPORAN</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class=""><a href="?page=laporan_barang"><i class="fa fa-angle-double-right"></i> REKAP BARANG</a></li>
        <li class=""><a href="?page=laporan_baranghabis"><i class="fa fa-angle-double-right"></i> BARANG HABIS</a></li>        
        <li class=""><a href="?page=laporan_perbaikan"><i class="fa fa-angle-double-right"></i> PERAWATAN</a></li>
    </ul>
</li>
</ul>