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
              <li class="active">Tabel Mahasiswa</li>
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

      <div class="col-md-12">
        <button type="button" class="btn btn-info" type="button" name="submit" id="submit">
          <a class="btn btn-info" href="<?= base_url('master/formhs')?>">
            <i class="fa fa-users"></i> Biodata Mahasiswa
          </a>
        </button>
        <div class="card">
          <div class="card-header">
            Data Tabel Mahasiswa
          </div>
          <div class="card-body">
            <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table id="bootstrap-data-table4" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Kecamatan</th>
                  <th>Nomor telepon (HP)</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Nama prodi</th>
                  <th>Nama jurusan</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                <?php foreach($mhs2 as $col):?>
                <tr>
                  <td class="col-2 mx-auto">
                    <button class="btn btn-warning" type="button" name="edit"
                      onclick="window.location.href='<?= base_url("master/editMhs/$col->id_mhs")?>'">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" type="button" name="hapus" onclick="deletemhs(<?= $col->id_mhs ?>)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                  <td><?= $col->nim ?></td>
                  <td><?= $col->nama ?></td>
                  <td><?= $col->email ?></td>
                  <td><?= $col->jkel ?></td>
                  <td><?= $col->alamat ?></td>
                  <td><?= $col->nama_wilayah ?></td>
                  <td><?= $col->HP ?></td>
                  <td><?= $col->tempat_lahir?></td>
                  <td><?= date('d-m-Y', strtotime($col->tgl_lahir)); ?></td>
                  <td><?= $col->nama_pro ?></td>
                  <td><?= $col->nama_jur ?></td>
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