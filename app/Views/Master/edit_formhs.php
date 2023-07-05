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
              <li><a href="<?= base_url('/master/mhs')?>">Master Mahasiswa</a></li>
              <li class="active">Biodata Mahasiswa</li>
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
        <div class="card">
          <div class="card-header">
            <i class="card-header fa fa-user"></i>Biodata Mahasiswa
          </div>
          <div class="card-body card-block">
            <form action="<?= base_url('master/editsubmitMhs/'.$id_mhs)?>" method="POST">
              <?= csrf_field(); ?>
              <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid': '';?>" id="nim" name="nim" placeholder="Masukkan nim anda"
                    value="<?= (old('nim')) ? old('nim') : $mhsloop->nim ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nim');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap anda"
                    value="<?= (old('nama')) ? old('nama') : $mhsloop->nama ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email lengkap anda"
                    value="<?= (old('email')) ? old('email') : $mhsloop->email ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="jkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <select name="jkel" id="jkel" class="form-control">
                    <option>- Pilih -</option>
                    <option value="L" <?php if($mhsloop->jkel == "L") echo "selected"?>>Laki-laki</option>
                    <option value="P" <?php if($mhsloop->jkel == "P") echo "selected"?>>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat sesuai KTP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan domilisi anda"
                    value="<?= (old('alamat')) ? old('alamat') : $mhsloop->alamat ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="id_wilayah" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <select name="id_wilayah" id="id_wilayah" class="form-control">
                    <option disabled selected>- Kecamatan -</option>
                    <?php foreach ($wilayahloop as $col):?>
                        <option value="<?= $col->id_wilayah?>" <?php if($mhsloop->id_wilayah == $col->id_wilayah) echo "selected"?>>
                          <?= $col->nama_wilayah?>
                        </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="HP" class="col-sm-2 col-form-label">Nomor telepon(HP)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?= ($validation->hasError('HP')) ? 'is-invalid': '';?>" id="HP" name="HP" placeholder="Masukkan HP anda"
                    value="<?= (old('HP')) ? old('HP') : $mhsloop->HP ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('HP');?>
                  </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat lahir</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan tempat lahir anda"
                    name="tempat_lahir" value="<?= (old('tempat_lahir')) ? old('tempat_lahir') : $mhsloop->tempat_lahir ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                    value="<?= (old('tgl_lahir')) ? old('tgl_lahir') : $mhsloop->tgl_lahir ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="kode_pro" class="col-sm-2 col-form-label">Nama prodi</label>
                <div class="col-sm-10">
                  <select name="kode_pro" id="kode_pro" class="form-control">
                    <option disabled selected>- Prodi -</option>
                      <?php foreach ($prodiloop as $col1):?>
                        <option value="<?= $col1->kode_pro?>" <?php if($mhsloop->kode_pro == $col1->kode_pro) echo "selected"?>>
                          <?= $col1->nama_jur." - ".$col1->nama_pro ?>
                        </option>
                      <?php endforeach ?>
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
                <a class="btn btn-secondary" href="<?= base_url('master/mhs')?>" role="button"><i class="fa fa-mail-reply"></i>
                  Kembali</a>
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