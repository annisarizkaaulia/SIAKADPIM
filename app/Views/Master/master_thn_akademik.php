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
              <li class="active">Master Tahun Akademik</li>
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
            <form action="<?= base_url()?>/master/simpanTahunAkademik" method="POST">
            <?= csrf_field(); ?>
              <div class="mb-3 row">
                <label for="thn_akademik" class="col-sm-2 col-form-label">Tahun Akademik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('thn_akademik')) ? 'is-invalid': '';?>" id="thn_akademik" name="thn_akademik"
                    placeholder="Masukkan kode mata kuliah" value="<?= old('thn_akademik');?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('thn_akademik');?>
                  </div>
                </div>
              </div>  
              <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <select name="status" id="status" class="form-control">
                    <option>- Pilih -</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak aktif">Tidak Aktif</option>
                  </select>
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
        <div class="card">
          <div class="card-header">Data Tabel Tahun Akademik</div>
          <div class="card-body">
          <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>
            <table id="bootstrap-data-table8" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>Tahun Akademik</th>
                  <th>Status</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                <?php foreach($mhs8 as $col):?>
                <tr>
                  <td class="col-2 mx-auto">
                    <button class="btn btn-warning" type="button" name="edit"
                      onclick="window.location.href='<?= base_url("master/editTahunAkademik/$col->id_thn")?>'">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger" type="button" name="hapus"
                      onclick="deletethnakademik(<?= $col->id_thn ?>)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>

                  <td><?= $col->thn_akademik; ?></td>
                  <td><?= $col->status; ?></td>
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