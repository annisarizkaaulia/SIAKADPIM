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
              <li class="active">Master Absen</li>
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
      <div class="col-md-12">
        <div class="card">
          <div class="card-body card-block">
            <form action="<?= base_url('master/editsubmitAbsen/'.$id_absen)?>" method="POST">
            <?= csrf_field(); ?>
              <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $absenloop->tanggal ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <select name="nim" id="nim" class="form-control">
                    <option disabled selected>- pilih -</option>
                    <?php foreach ($nimabsen as $col1):?>
                        <option value="<?= $col1->nim?>" <?php if($absenloop->nim == $col1->nim) echo "selected"?>>
                        <?= $col1->nim." - ".$col1->nama ?>
                        </option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
                <div class="col-sm-10">
                  <select name="tipe" id="tipe" class="form-control">
                    <option value="0">- Pilih -</option>
                    <option value="1" <?php if($absenloop->tipe == "1") echo "selected"?>>Masuk</option>
                    <option value="2" <?php if($absenloop->tipe == "2") echo "selected"?>>Keluar</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="jam" class="col-sm-2 col-form-label">Pukul</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" id="jam" name="jam" value="<?= (old('jam')) ? old('jam') : $absenloop->jam ?>">
                </div>
              </div>
              <div class="mb-3 row modal fade" id="mediumModal" tabindex="-1" role="dialog"
                aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="mediumModalLabel">Notifikasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>
                        Apakah anda yakin ingin menyimpan?
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                      <button type="submit" class="btn btn-primary" name="simpan">Ya, simpan!</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="d-md-block col-3 mx-auto">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#mediumModal"><i
                    class="fa fa-save"></i> Simpan
                  data</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <button type="button" class="btn btn-info" type="button" name="submit" id="submit">
          <a class="btn btn-info" href="<?= base_url('master/grafikabsen')?>">
            <i class="fa fa-bar-chart"></i> Grafik Mahasiswa
          </a>
        </button>
        <div class="card">
          <div class="card-header">Data Tabel Absen</div>
          <div class="card-body">
          <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>
            <table id="bootstrap-data-table3" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>Tanggal</th>
                  <th>Nim</th>
                  <th>Nama</th>
                  <th>Tipe</th>
                  <th>Pukul</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                <?php foreach($mhs5 as $col):?>
                <tr>
                  <td class="col-2 mx-auto">
                    <button class="btn btn-warning" type="button" name="edit"
                      onclick="window.location.href='<?= base_url("master/editAbsen/$col->id_absen")?>'">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger" type="button" name="hapus" onclick="deleteabs(<?= $col->id_absen?>)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                  <td><?= date('d-m-Y', strtotime($col->tanggal)); ?></td>
                  <td><?= $col->nim ; ?></td>
                  <td><?= $col->nama ; ?></td>
                  <td>
                    <?php if ($col->tipe == "1") echo "Masuk";
                        else{
                          echo "Keluar";
                        } ?>
                  </td>
                  <td><?= $col->jam; ?></td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div><!-- .animated -->
</div><!-- .content -->
