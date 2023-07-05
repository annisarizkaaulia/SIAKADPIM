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
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-body card-block">
            <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-danger" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <form action="<?= base_url('master/caridataIN')?>" method="POST">
              <?= csrf_field(); ?>
              <div class="mb-3 row">
                <label for="thn_akademik" class="col-sm-4 col-form-label">Tahun Akademik</label>
                <div class="col-sm-8">
                  <select name="thn_akademik" id="thn_akademik"
                    class="form-control <?= ($validation->hasError('thn_akademik')) ? 'is-invalid': '';?>">
                    <option disabled selected>- tahun akademik -</option>
                    <?php foreach ($thnkrs as $col):?>
                    <option value="<?= $col->thn_akademik?>">
                      <?= $col->thn_akademik?>
                    </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('thn_akademik');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="semester" class="col-sm-4 col-form-label">Semester</label>
                <div class="col-sm-8">
                  <select name="semester" id="semester"
                    class="form-control <?= ($validation->hasError('semester')) ? 'is-invalid': '';?>">
                    <option disabled selected>- semester ajaran -</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('semester');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="kode_matkul" class="col-sm-4 col-form-label">Mata Kuliah</label>
                <div class="col-sm-8">
                <select name="kode_matkul" id="kode_matkul"
                    class="form-control <?= ($validation->hasError('kode_matkul')) ? 'is-invalid': '';?>">
                    <option disabled selected>- Mata kuliah -</option>
                    <?php foreach ($matkulkrs as $col):?>
                    <option value="<?= $col->kode_matkul?>">
                      <?= $col->kode_matkul." - ".$col->nama_matkul?>
                    </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('nim');?>
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
                      <button type="submit" class="btn btn-primary" name="simpan">Ya, proses!</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-md-block col-8 offset-md-4">
                <a class="btn btn-secondary" href="<?= base_url('master/tabelmasterKHS')?>" role="button"><i
                    class="fa fa-mail-reply"></i>
                  Kembali</a>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#mediumModal"><i
                    class="fa fa-spinner"></i> Proses</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .animated -->
</div><!-- .content -->