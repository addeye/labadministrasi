<ul class="sidebar-menu">
<li class="<?php if(!$_GET['page']){echo 'active';} ?>">
    <a href="index.php">
        <i class="fa fa-home"></i> <span>BERANDA</span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>MASTER DATA</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class=""><a href="?page=penguasaan"><i class="fa fa-angle-double-right"></i> Penguasaan</a></li>
        <li class=""><a href="?page=tahunajaran"><i class="fa fa-angle-double-right"></i> Tahun Ajaran</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>INVENTORY LAB</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">        
        <li class=""><a href="?page=barang"><i class="fa fa-angle-double-right"></i> Barang</a></li>
        <li class=""><a href="?page=baranghabis"><i class="fa fa-angle-double-right"></i> Barang Habis</a></li>
        <li class=""><a href="?page=perbaikan"><i class="fa fa-angle-double-right"></i> Perbaikan</a></li>
        <li class=""><a href="?page=rekom"><i class="fa fa-angle-double-right"></i> Rekom Barang</a></li>        
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>ACTIVITY LAB</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class=""><a href="?page=jadwal"><i class="fa fa-angle-double-right"></i> Jadwal</a></li>
        <li class=""><a href="?page=peminjaman"><i class="fa fa-angle-double-right"></i> Peminjaman</a></li>
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