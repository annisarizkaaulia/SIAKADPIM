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
              <li class="active">Master Jurusan</li>
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
            <form action="<?= base_url()?>/master/simpanJurusan" method="POST">
              <?= csrf_field(); ?>
              <div class="mb-3 row">
                <label for="kode_jur" class="col-sm-2 col-form-label">Kode jurusan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('kode_jur')) ? 'is-invalid': '';?>"
                    id="kode_jur" name="kode_jur" placeholder="Masukkan kode jurusan" value="<?= old('kode_jur');?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('kode_jur');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nama_jur" class="col-sm-2 col-form-label">Nama jurusan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nama_jur')) ? 'is-invalid': '';?>"
                    id="nama_jur" name="nama_jur" placeholder="Masukkan nama jurusan" value="<?= old('nama_jur');?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nama_jur');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nama_kajur" class="col-sm-2 col-form-label">Nama ketua jurusan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nama_kajur')) ? 'is-invalid': '';?>"
                    id="nama_kajur" name="nama_kajur" placeholder="Masukkan nama ketua jurusan" value="<?= old('nama_kajur');?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nama_kajur');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nip_kajur" class="col-sm-2 col-form-label">NIP ketua jurusan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nip_kajur')) ? 'is-invalid': '';?>"
                    id="nip_kajur" name="nip_kajur" placeholder="Masukkan NIP ketua jurusan" value="<?= old('nip_kajur');?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nip_kajur');?>
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
        <div class="card">
          <div class="card-header">Data Tabel Jurusan</div>
          <div class="card-body">
            <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table id="bootstrap-data-table2" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>Kode jurusan</th>
                  <th>Nama jurusan</th>
                  <th>Nama ketua jurusan</th>
                  <th>NIP ketua jurusan</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                <?php foreach($mhs3 as $col):?>
                <tr>
                  <td class="col-2 mx-auto">
                    <button class="btn btn-warning" type="button" name="edit"
                      onclick="window.location.href='<?= base_url("master/editJurusan/$col->id_jur")?>'">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" type="button" onclick="deletejurusan(<?= $col->id_jur ?>)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                  <td><?= $col->kode_jur ?></td>
                  <td><?= $col->nama_jur ?></td>
                  <td><?= $col->nama_kajur ?></td>
                  <td><?= $col->nip_kajur ?></td>
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