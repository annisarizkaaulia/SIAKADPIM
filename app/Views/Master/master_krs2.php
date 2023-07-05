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
              <li><a href="<?= base_url('/master/tabelmasterKS')?>">Master KRS</a></li>
              <li class="active">Cetak Halaman KRS</li>
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
          <a class="btn btn-info" href="<?= base_url('master/formKRS/'.$nim.'/'.$semester.'/'.$thn_akademik)?>">
            <i class="fa fa-plus-circle"></i> Tambah Data KRS
          </a>
        </button>
        <button type="button" class="btn btn-info" type="button" name="submit" id="submit">
          <a class="btn btn-info" href="<?= base_url('master/cetakkrs/'.$nim.'/'.$semester.'/'.$thn_akademik)?>">
            <i class="fa fa-print"></i> Print
          </a>
        </button>
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
            <h3 class="d-flex justify-content-center font-weight-bold" style="font-family: serif">KARTU RENCANA STUDI
              (KRS)</h3>
            <table class="table-cek mx-auto" style="font-family: serif">
              <tr>
                <td>NIM</td>
                <td>:</td>
                <td>&nbsp<?= $nim; ?></td>
              <tr>
              <tr>
                <td>NAMA</td>
                <td>:</td>
                <td>&nbsp<?= $nama; ?></td>
              <tr>
              <tr>
                <td>NAMA PROGRAM STUDI</td>
                <td>:</td>
                <td>&nbsp<?= $nama_pro; ?></td>
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
                  <th>KODE MK</th>
                  <th>MATA KULIAH</th>
                  <th>SKS</th>
                  <th>Jam</th>
                </tr>
              </thead>
              <tbody>
                <?php 
              $jumsks=0;
              $jumjam=0;
              foreach($cekData as $col):?>
                <tr>
                  <td>
                    <button class="btn btn-warning" type="button" name="edit"
                      onclick="window.location.href='<?= base_url("master/editKRS/$col->id_krs")?>'">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger" type="button" name="hapus" onclick="deletekrs(<?= $col->id_krs ?>)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                  <td><?= $col->kode_matkul; ?></td>
                  <td><?= $col->nama_matkul; ?></td>
                  <td><?= $col->sks; 
                $jumsks+=$col->sks;?>
                  </td>
                  <td><?= $col->jam; 
                 $jumjam+=$col->jam;?>
                  </td>
                </tr>
                <?php endforeach; ?>
                <tr class="font-weight-bold">
                  <td colspan="3" align="right">J U M L A H</td>
                  <td><?= $jumsks;?></td>
                  <td><?= $jumjam;?></td>
                </tr>
              </tbody>
            </table>
            <div class="row" style="font-family: serif">
              <div class="col-3">
                <h5>Dosen Pembimbing Akademik</h5>
                <br>
                <br>
                <br>
                <hr>
                <h5>NIP.</h5>
              </div>
              <div class="col-2 offset-md-6">
                <h5>Aceh utara, <?= format_indo(date('Y-m-d'));?></h5>
                <h5>Mahasiswa</h5>
                <br>
                <br>
                <h5><?= $nama; ?></h5>
                <h5>NIM. <?= $nim; ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div><!-- .animated -->
</div><!-- .content -->