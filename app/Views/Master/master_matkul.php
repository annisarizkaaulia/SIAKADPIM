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
              <li class="active">Master Mata Kuliah</li>
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
            <form action="<?= base_url()?>/master/simpanMatkul" method="POST">
            <?= csrf_field(); ?>
              <div class="mb-3 row">
                <label for="kode_matkul" class="col-sm-2 col-form-label">Kode mata kuliah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('kode_matkul')) ? 'is-invalid': '';?>" id="kode_matkul" name="kode_matkul"
                    placeholder="Masukkan kode mata kuliah" value="<?= old('kode_matkul');?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('kode_matkul');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nama_matkul" class="col-sm-2 col-form-label">Nama mata kuliah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nama_matkul')) ? 'is-invalid': '';?>" id="nama_matkul" name="nama_matkul"
                    placeholder="Masukkan nama mata kuliah" value="<?= old('nama_matkul');?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nama_matkul');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="sks" class="col-sm-2 col-form-label">SKS</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('sks')) ? 'is-invalid': '';?>" id="sks" name="sks" 
                  placeholder="sks mata kuliah" value="<?= old('sks');?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('sks');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="jam" class="col-sm-2 col-form-label">Jam</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('jam')) ? 'is-invalid': '';?>" id="jam" name="jam" 
                  placeholder="jam mata kuliah" value="<?= old('jam');?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('jam');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="kode_pro" class="col-sm-2 col-form-label">Nama prodi</label>
                <div class="col-sm-10">
                  <select name="kode_pro" id="kode_pro" class="form-control <?= ($validation->hasError('kode_pro')) ? 'is-invalid': '';?>">
                    <option disabled selected>- Prodi -</option>
                    <?php foreach ($prodimatkul as $col):?>
                        <option value="<?= $col->kode_pro?>">
                          <?= $col->nama_pro?>
                        </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('kode_pro');?>
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
          <div class="card-header">Data Tabel Mata Kuliah</div>
          <div class="card-body">
          <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>
            <table id="bootstrap-data-table7" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>Kode mata kuliah</th>
                  <th>Nama mata kuliah</th>
                  <th>SKS</th>
                  <th>Jam</th>
                  <th>Nama Prodi</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                <?php foreach($mhs7 as $col):?>
                <tr>
                  <td class="col-2 mx-auto">
                    <button class="btn btn-warning" type="button" name="edit"
                      onclick="window.location.href='<?= base_url("master/editMatkul/$col->id_matkul")?>'">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger" type="button" name="hapus"
                      onclick="deletematkul(<?= $col->id_matkul ?>)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>

                  <td><?= $col->kode_matkul; ?></td>
                  <td><?= $col->nama_matkul; ?></td>
                  <td><?= $col->sks; ?></td>
                  <td><?= $col->jam; ?></td>
                  <td><?= $col->nama_pro; ?></td>
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