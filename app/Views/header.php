<!-- Header-->
<header id="header" class="header">
      <div class="top-left">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?= base_url('/master')?>">
            <img src="<?= base_url()?>/images/PIM.png" alt="pim" height="40px" width="40px;" style="float:none">SIAKAD PIM
          </a>
          <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
      </div>
      <div class="top-right">
        <div class="header-menu">
          <div class="header-left">
            <div class="user-area dropdown float-right">
              <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Selamat Datang! <?= $_SESSION['namalengkap'];?>
                <!-- <img class="user-avatar rounded-circle" src="images/nisa.jpg" alt="User Avatar"> -->
                <i class="fa fa-angle-down"></i>
              </a>
              <div class="user-menu dropdown-menu">
                <a class="nav-link" href="<?= base_url('login/logout')?>"><i class="fa fa-sign-out"></i>Keluar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
</header>
<!-- /#header -->