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
              <li><a href="<?= base_url('/master/tabelmasterKS')?>">Master Kartu Studi</a></li>
              <li class="active">Cetak KHS Mahasiswa</li>
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
          <a class="btn btn-info" href="<?= base_url('master/cetakkhs/'.$nim.'/'.$semester.'/'.$thn_akademik)?>">
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
            <h3 class="d-flex justify-content-center font-weight-bold" style="font-family: serif">KARTU HASIL STUDI
              (KHS)</h3>
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
                  <th>KODE MK</th>
                  <th>MATA KULIAH</th>
                  <th colspan="2" class="text-center">NILAI</th>
                  <th>Jam</th>
                  <th>SKS</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $jumnilai=0;
                $jumsks=0;
                $jumjam=0;
                foreach($cekData as $col):?>
                <tr>
                  <td><?= $col->kode_matkul;?></td>
                  <td><?= $col->nama_matkul;?></td>
                  <td><?= $col->huruf;?></td>
                  <td><?= skornilai($col->huruf, $col->sks); $jumnilai+=skornilai($col->huruf, $col->sks);?></td>
                  <td><?= $col->jam;    $jumjam+=$col->jam;?></td>
                  <td><?= $col->sks;    $jumsks+=$col->sks;?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="font-weight-bold">
                  <td colspan="3" align="right">J U M L A H</td>
                  <td><?= $jumnilai;?></td>
                  <td><?= $jumsks;?></td>
                  <td><?= $jumjam;?></td>
                </tr>
              </tbody>
            </table>
            <div class="row" style="font-family: serif">
              <div class="col-8">
                <h4 class="font-weight-bold" style="font-family: serif; border-color: black;">IP (Indeks Prestasi) :
                  <?= number_format($jumnilai/$jumsks, 2);?></h4>
              </div>
              <div class="col-4">
                <h5>Aceh utara, <?= format_indo(date('Y-m-d'));?></h5>
                <h5>Ketua Jurusan Teknologi Informasi Dan Komputer</h5>
                <br>
                <br>
                <h5><?= $nama_kajur; ?></h5>
                <h5>NIP. <?= $nip_kajur; ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div><!-- .animated -->
</div><!-- .content -->