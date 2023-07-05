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
              <li><a href="<?= base_url('/master')?>">Beranda</a></li>
              <li class="active">FORM KRS</li>
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
            <form action="<?= base_url()?>/master/simpantabelKRS" method="POST">
              <?= csrf_field(); ?>
              <div class="mb-3 row">
                <label for="thn_akademik" class="col-sm-2 col-form-label">Tahun Akademik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="thn_akademik" name="thn_akademik"
                    value="<?= $thn_akademik?>" readonly>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="semester" name="semester" value="<?= $semester?>"
                    readonly>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>" readonly>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="kode_matkul" class="col-sm-2 col-form-label">Nama mata kuliah</label>
                <div class="col-sm-10">
                  <select name="kode_matkul" id="kode_matkul"
                    class="form-control <?= ($validation->hasError('kode_matkul')) ? 'is-invalid': '';?>">
                    <option disabled selected>- Mata kuliah -</option>
                    <?php foreach ($matkulkrs as $col):?>
                    <option value="<?= $col->kode_matkul?>">
                      <?= $col->nama_matkul?>
                    </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('kode_matkul');?>
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
    </div>
  </div><!-- .animated -->
</div><!-- .content -->