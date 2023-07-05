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
              <li class="active">Master SPP</li>
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
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-body card-block">
            <form action="<?= base_url()?>/master/simpanSpp" method="POST">
              <?= csrf_field(); ?>
              <div class="mb-3 row">
                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                <div class="col-sm-6">
                  <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid': '';?>"
                    id="tanggal" name="tanggal" value="<?= old('tanggal');?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('tanggal');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                <div class="col-sm-6">
                  <select name="nim" id="nim" class="form-control">
                    <option disabled selected>- pilih -</option>
                    <?php foreach ($nimspp as $col1):?>
                    <option value="<?= $col1->nim?>">
                      <?= $col1->nim." - ".$col1->nama ?>
                    </option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="tipe" class="col-sm-3 col-form-label">Tipe</label>
                <div class="col-sm-6">
                  <select name="tipe" id="tipe" class="form-control">
                    <option value="0">- Pilih -</option>
                    <option value="1">Debet</option>
                    <option value="2">Kredit</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="jumlah_spp" class="col-sm-3 col-form-label">Jumlah SPP</label>
                <div class="col col-md-6">
                  <div class="input-group">
                    <div class="input-group-addon"><i>Rp</i></div>
                    <input type="text"
                      class="form-control <?= ($validation->hasError('jumlah_spp')) ? 'is-invalid': '';?>"
                      id="jumlah_spp" name="jumlah_spp" value="<?= old('jumlah_spp');?>">
                    <div class="invalid-feedback">
                      <?= $validation->getError('jumlah_spp');?>
                    </div>
                  </div>
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
          <a class="btn btn-info" href="<?= base_url('master/grafikspp')?>">
            <i class="fa fa-bar-chart"></i> Grafik Mahasiswa
          </a>
        </button>
        <div class="card">
          <div class="card-header">Data Tabel SPP</div>
          <div class="card-body">
            <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table id="bootstrap-data-table6" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>Tanggal</th>
                  <th>Nim</th>
                  <th>Nama</th>
                  <th>Tipe</th>
                  <th>Jumlah SPP</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                <?php foreach($mhs5 as $col):?>
                <tr>
                  <td class="col-2 mx-auto">
                    <button class="btn btn-warning" type="button" name="edit"
                      onclick="window.location.href='<?= base_url("master/editSpp/$col->id_spp")?>'">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger" type="button" name="hapus" onclick="deleteSpp(<?= $col->id_spp?>)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                  <td><?= date('d-m-Y', strtotime($col->tanggal)); ?></td>
                  <td><?= $col->nim ; ?></td>
                  <td><?= $col->nama ; ?></td>
                  <td>
                    <?php if ($col->tipe == "1") echo "Debet";
                        else{
                          echo "Kredit";
                        } ?>
                  </td>
                  <td><?= $col->jumlah_spp; ?></td>
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