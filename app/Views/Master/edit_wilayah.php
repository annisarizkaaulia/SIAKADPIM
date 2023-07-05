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
              <li class="active">Master Wilayah</li>
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

            <form action="<?= base_url('master/editsubmitWilayah/'.$id_wilayah)?>" method="POST">
              <?= csrf_field(); ?>
              <div class="row form-group offset-md-3">
                <div class="input-group col-2">
                  <label for="nama_wilayah" class="col-form-label">Nama wilayah</label>
                </div>
                <div class="input-group col-5">
                  <input type="text"
                    class="form-control <?= ($validation->hasError('nama_wilayah')) ? 'is-invalid': '';?>"
                    id="nama_wilayah" name="nama_wilayah" placeholder="Tambahkan wilayah anda"
                    value="<?= (old('nama_wilayah')) ? old('nama_wilayah') : $wilayahloop->nama_wilayah ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nama_wilayah');?>
                  </div>
                </div>
              </div>
              <div class="input-group-btn offset-md-6">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#mediumModal"><i
                    class="fa fa-save"></i> Simpan</button>
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
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Data Tabel Wilayah</div>
          <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">

              <thead>
                <tr>
                  <th>Action</th>
                  <th>Kecamatan</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                <?php foreach($mhs1 as $col):?>
                <tr>
                  <td class="col-2 mx-auto">
                    <button class="btn btn-warning" type="button" name="edit"
                      onclick="window.location.href = '<?= base_url("master/editWilayah/$col->id_wilayah")?>'">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" type="button" name="hapus"
                      onclick="deletewilayah(<?= $col->id_wilayah; ?>)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                  <td><?= $col->nama_wilayah; ?></td>
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