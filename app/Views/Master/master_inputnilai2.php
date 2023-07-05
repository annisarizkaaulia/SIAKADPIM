<div class="breadcrumbs">
  <div class="breadcrumbs-inner">
    <div class="row m-0">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Beranda</h1>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li><a href="<?= base_url('/')?>">Beranda</a></li>
              <li><a href="<?= base_url('/master/tabelmasterIN')?>">Master Input Nilai</a></li>
              <li><a href="<?= base_url('/master/caridataIN')?>">Input Nilai Mahasiswa</a></li>
              <li class="active">Input Nilai Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="animated fadeIn">
    <div class="row">
      <!--/.col-->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-2">
                <img src="<?= base_url()?>/images/pim.png" alt="pnl" height="100px" width="95px;" style="float:none">
              </div>
              <div class="col-8" style="font-family: serif">
                <h5 class="d-flex justify-content-center font-weight-bold">KEMENTERIAN
                  PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h5>
                <h2 class="d-flex justify-content-center font-weight-bold">PUPUK
                  ISKANDAR MUDA</h2>
                <h6 class="d-flex justify-content-center">Jl. Banda Aceh-Medan,
                  PO.Box 021 Aceh Utara, Indonesia</h6>
                <h6 class="d-flex justify-content-center">Telp (62-645) 56222; Fax (62-645)
                  56095</h6>
              </div>
            </div>
            <hr>
            <h3 class="d-flex justify-content-center font-weight-bold" style="font-family: serif">Nilai Mata Kuliah Mahasiswa</h3>
            <table class="table-cek mx-auto" style="font-family: serif">
              <tr>
                <td>KODE MATA KULIAH</td>
                <td>:</td>
                <td>&nbsp<?= $kode_matkul; ?></td>
              <tr>
              <tr>
                <td>NAMA MATA KULIAH</td>
                <td>:</td>
                <td>&nbsp<?= $nama_matkul; ?></td>
              <tr>
              <tr>
                <td>SKS</td>
                <td>:</td>
                <td>&nbsp<?= $sks; ?></td>
              <tr>
                <td>TAHUN AJARAN (SEMESTER)</td>
                <td>:</td>
                <td>&nbsp<?= $thn_akademik."&nbsp".$semester ?></td>
              </tr>
            </table>
            <br>
            <table class="table table-striped table-bordered" style="font-family: serif; border-color: black;">
              <thead>
                <tr>
                  <th>ACTION</th>
                  <th>NIM</th>
                  <th>NAMA</th>
                  <th>NILAI</th>
                  <th>HURUF</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach($cekDatamatkul as $col):?>
                <tr>
                  <td class="mx-auto">
                    <button class="btn btn-warning" type="button" name="edit"
                      onclick="window.location.href='<?= base_url("master/editIN/$col->id_krs")?>'">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger" type="button" name="hapus" onclick="deletekrs(<?= $col->id_krs ?>)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                  <td><?= $col->nim; ?></td>
                  <td><?= $col->nama; ?></td>
                  <td><?= $col->nilai; ?></td>
                  <td><?= $col->huruf; ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div><!-- .animated -->
</div><!-- .content -->