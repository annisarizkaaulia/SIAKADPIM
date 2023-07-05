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
              <li class="active">Master Prodi</li>
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
            <form action="<?= base_url('master/editsubmitProdi/'.$id_pro)?>" method="POST">
              <?= csrf_field(); ?>
              <div class="mb-3 row">
                <label for="kode_pro" class="col-sm-2 col-form-label">Kode prodi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('kode_pro')) ? 'is-invalid': '';?>" id="kode_pro" name="kode_pro"
                    placeholder="Masukkan kode jurusan" value="<?= (old('kode_pro')) ? old('kode_pro') : $prodiloop->kode_pro ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('kode_pro');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nama_pro" class="col-sm-2 col-form-label">Nama prodi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nama_pro')) ? 'is-invalid': '';?>" id="nama_pro" name="nama_pro"
                    placeholder="Masukkan nama jurusan" value="<?= (old('nama_pro')) ? old('nama_pro') : $prodiloop->nama_pro ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nama_pro');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nama_kapro" class="col-sm-2 col-form-label">Ketua prodi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nama_kapro')) ? 'is-invalid': '';?>" id="nama_kapro" name="nama_kapro"
                    placeholder="Masukkan nama ketua prodi" value="<?= (old('nama_kapro')) ? old('namanama_kapro_pro') : $prodiloop->nama_kapro ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nama_kapro');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="jenjang" class="col-sm-2 col-form-label">Jenjang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="jenjang" name="jenjang" placeholder="Jenjang pendidikan"
                    value="<?= (old('jenjang')) ? old('jenjang') : $prodiloop->jenjang ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="kode_jur" class="col-sm-2 col-form-label">Nama jurusan</label>
                <div class="col-sm-10">
                  <select name="kode_jur" id="kode_jur" class="form-control <?= ($validation->hasError('nama_jur')) ? 'is-invalid': '';?>">
                    <option disabled selected>- Jurusan -</option>
                    <?php foreach ($jurusanprodi as $col):?>
                        <option value="<?= $col->kode_jur?>" <?php if($prodiloop->kode_jur == $col->kode_jur) echo "selected"?>>
                          <?= $col->nama_jur?>
                        </option>
                    <?php endforeach; ?>
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
          <div class="card-header">Data Tabel Prodi</div>
          <div class="card-body">
          <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>
            <table id="bootstrap-data-table5" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>Kode prodi</th>
                  <th>Nama prodi</th>
                  <th>Nama Ketua prodi</th>
                  <th>Jenjang</th>
                  <th>Nama jurusan</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                <?php foreach($mhs4 as $col):?>
                <tr>
                  <td class="col-2 mx-auto">
                    <button class="btn btn-warning" type="button" name="edit"
                      onclick="window.location.href='<?= base_url("master/editProdi/$col->id_pro")?>'">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger" type="button" name="hapus"
                      onclick="deleteprodi(<?= $col->id_pro ?>)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>

                  <td><?= $col->kode_pro; ?></td>
                  <td><?= $col->nama_pro; ?></td>
                  <td><?= $col->nama_kapro; ?></td>
                  <td><?= $col->jenjang; ?></td>
                  <td><?= $col->nama_jur; ?></td>
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