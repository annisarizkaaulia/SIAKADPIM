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
              <li class="active">Master Input Nilai</li>
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
        <button type="button" class="btn btn-info" type="button" name="submit" id="submit">
          <a class="btn btn-info" href="<?= base_url('master/inputnilai')?>">
            <i class="fa fa-search"></i> Input Nilai Mahasiswa
          </a>
        </button>
        <div class="card">
          <?php if(session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
          <?php endif; ?>
          <div class="card-header">Data Tabel Input Nilai Mahasiswa</div>
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
            <h3 class="d-flex justify-content-center font-weight-bold" style="font-family: serif">Nilai Mahasiswa</h3>
            <table id="bootstrap-data-table1" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Tahun Akademik</th>
                  <th>Semester</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Nama mata kuliah</th>
                  <th>Nilai</th>
                  <th>Huruf</th>
                  <th>Nama prodi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($mhs9 as $col):?>
                <tr>
                  <td><?= $col->thn_akademik; ?></td>
                  <td><?= $col->semester; ?></td>
                  <td><?= $col->nim; ?></td>
                  <td><?= $col->nama; ?></td>
                  <td><?= $col->nama_matkul; ?></td>
                  <td><?= $col->nilai; ?></td>
                  <td><?= $col->huruf; ?></td>
                  <td><?= $col->nama_pro; ?></td>
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