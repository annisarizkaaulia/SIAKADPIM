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
              <li class="active">Cetak Transkip Nilai Mahasiswa</li>
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
            <form action="<?= base_url('master/caridataTN')?>" method="POST">
              <?= csrf_field(); ?>
              <div class="mb-3 row">
                <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid': '';?>"
                    id="nim" name="nim" placeholder="nim">
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
                <a class="btn btn-secondary" href="<?= base_url('master/tabelmasterKS')?>" role="button"><i
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