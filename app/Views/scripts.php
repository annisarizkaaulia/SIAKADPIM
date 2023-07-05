<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>


<script src="<?= base_url()?>/assets/js/init/weather-init.js"></script>
<script src="<?= base_url()?>/assets/js/main.js"></script>
<script src="<?= base_url()?>/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url()?>/dist/sweetalert2.min.js"></script>
<script src="<?= base_url()?>/dist/sweetalert2.js"></script>
<script src="<?= base_url()?>/dist/sweetalert2.all.js"></script>
<script src="<?= base_url()?>/assets/js/lib/data-table/datatables.min.js"></script>
<script src="<?= base_url()?>/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url()?>/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="<?= base_url()?>/assets/js/lib/data-table/jszip.min.js"></script>
<script src="<?= base_url()?>/assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="<?= base_url()?>/assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?= base_url()?>/assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="<?= base_url()?>/assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?= base_url()?>/assets/js/init/datatables-init.js"></script>
<script src="<?= base_url()?>/assets/js/init/fullcalendar-init.js"></script>
<script src="<?= base_url()?>/assets/js/script.js"></script>

<script type="text/javascript">
// WILAYAH
  $(document).ready(function() {
    $('#bootstrap-data-table1').DataTable();
  });

  function deletewilayah(id_wilayah) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Apakah kamu yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batal!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>/master/hapusWilayah",
          cache: false,
          data: {
            id_wilayah: id_wilayah
          },
          success: function(response) {
            Swal.fire({
              title: "Dihapus!",
              text: "File Anda telah dihapus",
              icon: "success"
            }).then((result) => {
              location.reload();
            });
          }
        })
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'File anda aman',
          'error'
        )
      }
    })
  }

  // JURUSAN
  $(document).ready(function() {
    $('#bootstrap-data-table2').DataTable();
  });

  function deletejurusan(id_jur) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Apakah kamu yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batal!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>/master/hapusJurusan",
          cache: false,
          data: {
            id_jur: id_jur
          },
          success: function(response) {
            Swal.fire({
              title: "Dihapus!",
              text: "File Anda telah dihapus",
              icon: "success"
            }).then((result) => {
              location.reload();
            });
          }
        })
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'File anda aman',
          'error'
        )
      }
    })
  }

  // ABSEN
  $(document).ready(function() {
    $('#bootstrap-data-table3').DataTable();
  });

  function deleteabs(id_absen) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Apakah kamu yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batal!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>/master/hapusAbsen",
          cache: false,
          data: {
            id_absen: id_absen
          },
          success: function(response) {
            Swal.fire({
              title: "Dihapus!",
              text: "File Anda telah dihapus",
              icon: "success"
            }).then((result) => {
              location.reload();
            });
          }
        })
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'File anda aman',
          'error'
        )
      }
    })
  }

  // MAHASISWA
  $(document).ready(function() {
    $('#bootstrap-data-table4').DataTable();
  });

  function deletemhs(id_mhs) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Apakah kamu yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batal!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>/master/hapusMhs",
          // controlernya apa/ method 
          cache: false,
          data: {
            id_mhs: id_mhs
          },
          success: function(response) {
            Swal.fire({
              title: "Dihapus",
              text: "File Anda telah dihapus",
              icon: "success"
            }).then((result) => {
              location.reload();
            });
          }
        })
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'File anda aman',
          'error'
        )
      }
    })
  }

  // PRODI
  $(document).ready(function() {
    $('#bootstrap-data-table5').DataTable();
  });

  function deleteprodi(id_pro) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Apakah kamu yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batal!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>/master/hapusProdi",
          cache: false,
          data: {
            id_pro: id_pro
          },
          success: function(response) {
            Swal.fire({
              title: "Dihapus!",
              text: "File Anda telah dihapus",
              icon: "success"
            }).then((result) => {
              location.reload();
            });
          }
        })
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'File anda aman',
          'error'
        )
      }
    })
  }

  // SPP
  $(document).ready(function() {
    $('#bootstrap-data-table6').DataTable();
  });

  function deleteSpp(id_spp) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Apakah kamu yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batal!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>/master/hapusSpp",
          cache: false,
          data: {
            id_spp: id_spp
          },
          success: function(response) {
            Swal.fire({
              title: "Dihapus!",
              text: "File Anda telah dihapus",
              icon: "success"
            }).then((result) => {
              location.reload();
            });
          }
        })
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'File anda aman',
          'error'
        )
      }
    })
  }

  // MATA KULIAH
  $(document).ready(function() {
    $('#bootstrap-data-table7').DataTable();
  });

  function deletematkul(id_matkul) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Apakah kamu yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batal!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>/master/hapusMatkul",
          cache: false,
          data: {
            id_matkul: id_matkul
          },
          success: function(response) {
            Swal.fire({
              title: "Dihapus!",
              text: "File Anda telah dihapus",
              icon: "success"
            }).then((result) => {
              location.reload();
            });
          }
        })
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'File anda aman',
          'error'
        )
      }
    })
  }

  // TAHUN AKADEMIK
  $(document).ready(function() {
    $('#bootstrap-data-table8').DataTable();
  });

  function deletethnakademik(id_thn) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Apakah kamu yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batal!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>/master/hapusTahunAkademik",
          cache: false,
          data: {
            id_thn: id_thn
          },
          success: function(response) {
            Swal.fire({
              title: "Dihapus!",
              text: "File Anda telah dihapus",
              icon: "success"
            }).then((result) => {
              location.reload();
            });
          }
        })
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'File anda aman',
          'error'
        )
      }
    })
  }

  // KRS (Kartu Rencana Studi)
  $(document).ready(function() {
    $('#bootstrap-data-table9').DataTable();
  });

  function deletekrs(id_krs) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Apakah kamu yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batal!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>/master/hapusformKRS",
          cache: false,
          data: {
            id_krs: id_krs
          },
          success: function(response) {
            Swal.fire({
              title: "Dihapus!",
              text: "File Anda telah dihapus",
              icon: "success"
            }).then((result) => {
              location.reload();
            });
          }
        })
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'File anda aman',
          'error'
        )
      }
    })
  }

</script>

