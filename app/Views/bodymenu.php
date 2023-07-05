<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="<?= base_url('/master')?>"><i class="menu-icon fa fa-home"></i>Beranda </a>
        </li>
        <li>
          <a href="<?= base_url('/master/wilayah')?>"> <i class="menu-icon fa fa-map-marker"></i>Master Wilayah </a>
        </li>
        <li>
          <a href="<?= base_url('/master/mhs')?>"> <i class="menu-icon fa fa-folder"></i>Master Mahasiswa</a>
        </li>
        <li>
          <a href="<?= base_url('/master/jurusan')?>"> <i class="menu-icon fa fa-folder"></i>Master Jurusan</a>
        </li>
        <li>
          <a href="<?= base_url('/master/prodi')?>"> <i class="menu-icon fa fa-folder"></i>Master Prodi</a>
        </li>
        <li>
          <a href="<?= base_url('/master/matkul')?>"> <i class="menu-icon fa fa-folder"></i>Master Mata Kuliah</a>
        </li>
        <li>
          <a href="<?= base_url('/master/tahunakademik')?>"> <i class="menu-icon fa fa-folder"></i>Master Tahun Akademik</a>
        </li>
        <li>
          <a href="<?= base_url('/master/tabelmasterKS')?>"> <i class="menu-icon fa fa-folder"></i>Master Kartu Studi</a>
        </li>
        <li>
          <a href="<?= base_url('/master/tabelmasterIN')?>"> <i class="menu-icon fa fa-folder"></i>Master Input Nilai</a>
        </li>
        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
            <i class="menu-icon fa fa-table"></i>Transaksi
          </a>
          <ul class="sub-menu children dropdown-menu">
            <li>
              <i class="fa fa-folder"></i>
              <a href="<?= base_url('/master/absen')?>">Master Absen</a>
            </li>
            <li>
              <i class="fa fa-folder"></i>
              <a href="<?= base_url('/master/spp')?>">Master SPP</a>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</aside>
<!-- /#left-panel -->