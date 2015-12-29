<ul class="sidebar-menu">
<li class="<?php if(!$_GET['page']){echo 'active';} ?>">
    <a href="index.php">
        <i class="fa fa-home"></i> <span>BERANDA</span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-camera"></i> <span>DATA MASTER</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">        
        <li class=""><a href="?page=penguasaan"><i class="fa fa-angle-double-right"></i> PENGUASAAN</a></li>
        <li class=""><a href="?page=tahunajaran"><i class="fa fa-angle-double-right"></i> TAHUN AJARAN</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-bug"></i> <span>AKADEMIK</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class=""><a href="?page=dosen"><i class="fa fa-angle-double-right"></i> DOSEN</a></li>
        <li class=""><a href="?page=ruangan"><i class="fa fa-angle-double-right"></i> RUANGAN</a></li>
        <li class=""><a href="?page=prodi"><i class="fa fa-angle-double-right"></i> PRODI</a></li>
        <li class=""><a href="?page=rombel"><i class="fa fa-angle-double-right"></i> ROMBEL</a></li>
        <li class=""><a href="?page=matakuliah"><i class="fa fa-angle-double-right"></i> MATAKULIAH</a></li>
    </ul>
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
        <li class=""><a href="?page=perbaikan"><i class="fa fa-angle-double-right"></i> PERBAIKAN</a></li>
        <li class=""><a href="?page=pengadaan"><i class="fa fa-angle-double-right"></i> PENGADAAN</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>PEMINJAMAN</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class=""><a href="?page=pinjambarang"><i class="fa fa-angle-double-right"></i> BARANG</a></li>
        <li class=""><a href="?page=peminjaman"><i class="fa fa-angle-double-right"></i> RUANGLAB</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>ADMINISTRATOR</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class=""><a href="?page=petugas"><i class="fa fa-angle-double-right"></i> PETUGAS</a></li>
        <li class=""><a href="?page=pengguna"><i class="fa fa-angle-double-right"></i> PENGGUNA</a></li>        
        <li class=""><a href="?page=mahasiswa"><i class="fa fa-angle-double-right"></i> MAHASISWA</a></li>
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