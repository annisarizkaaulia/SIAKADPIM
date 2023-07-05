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
              <li><a href="<?= base_url('/master/absen')?>">Master Absen</a></li>
                  <li class="active">Grafik Master Absen</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.breadcrumbs-->
    <!-- Content -->
    <div class="content">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">KEHADIRAN MAHASISWA </h4>
                <form action="<?= base_url()?>/master/grafikabsen2" method="POST">
                  <div class="mb-3 row">
                    <div class="col-6 offset-md-3">
                      <input type="text" id="datepicker" name="range" value="<?= $range ?>" class="form-control text-center" />
                    </div>
                    <button class="btn btn-primary" name="submit" type="submit"></i>
                      submit</button>
                  </div>
                </form>  
              </div>
            </div>
          </div>

          <div class="col-6 offset-md-3">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK KEHADIRAN MAHASISWA</h4>
                <canvas id="bar"> </canvas>
              </div>
            </div>
          </div><!-- /# column -->

          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK KEHADIRAN MASUK MAHASISWA WILAYAH</h4>
                <canvas id="pieChart1">
                </canvas>
              </div>
            </div>
          </div><!-- /# column -->

          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK KEHADIRAN KELUAR MAHASISWA WILAYAH</h4>
                <canvas id="pieChart2">
                </canvas>
              </div>
            </div>
          </div><!-- /# column -->

          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK KEHADIRAN MASUK MAHASISWA JURUSAN</h4>
                <canvas id="barChart1">
                </canvas>
              </div>
            </div>
          </div><!-- /# column -->

          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK KEHADIRAN KELUAR MAHASISWA JURUSAN</h4>
                <canvas id="barChart2">
                </canvas>
              </div>
            </div>
          </div><!-- /# column -->

          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK KEHADIRAN MASUK MAHASISWA PRODI</h4>
                <canvas id="pieChart3">
                </canvas>
              </div>
            </div>
          </div><!-- /# column -->

          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK KEHADIRAN KELUAR MAHASISWA PRODI</h4>
                <canvas id="pieChart4">
                </canvas>
              </div>
            </div>
          </div><!-- /# column -->

        </div>
      </div><!-- .animated -->
    </div>
    <!-- /.content -->

  <!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<script src="<?= base_url()?>/assets/js/main.js"></script>
<script src="<?= base_url()?>/assets/js/moment.min.js"></script>
<script src="<?= base_url()?>/assets/js/daterangepicker.js"></script>
<script>
    ( function ( $ ) {
      $('#datepicker').daterangepicker({
        locale:{
          format: "DD-MM-YYYY",
          separator: " s/d "
        },
        ranges:{
            'Today' : [moment(), moment()],
            'Yesterday' : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days' : [moment().subtract(29, 'days'), moment()],
            'This Month' : [moment().startOf('month'), moment().endOf('month')],
            'Last Month' : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      });
    })(jQuery);
</script>

<!-- CHART JS -->
<script>
    var ctx = document.getElementById("bar").getContext('2d');
        var barChart = new Chart(
          ctx, {
            type: 'bar',
            data: {
              labels: <?= json_encode($graftipemhs["tipe"])?>,
              datasets: [{
                label: 'Jumlah Mahasiswa',
                data: <?= json_encode($graftipemhs["jumlah_mahasiswa"])?>,
                backgroundColor: '#17BEBB',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }
          })
</script>
<script>
    var ctx = document.getElementById("pieChart1").getContext('2d');
        var barChart = new Chart(
          ctx, {
            type: 'pie',
            data: {
              labels: <?= json_encode($grafmasukwil["nama_wilayah"])?>,
              datasets: [
                {
                data: <?= json_encode($grafmasukwil["jumlah_mahasiswa"])?>,
                backgroundColor: ['#D11C5B','#F6EED5','#FAC600','#EA4B1D'],
                borderWidth: 1
              }]
            }
          })
  </script>
  <script>
    var ctx = document.getElementById("pieChart2").getContext('2d');
        var barChart = new Chart(
          ctx, {
            type: 'pie',
            data: {
              labels: <?= json_encode($grafkeluarwil["nama_wilayah"])?>,
              datasets: [
                {
                data: <?= json_encode($grafkeluarwil["jumlah_mahasiswa"])?>,
                backgroundColor: ['#D11C5B','#F6EED5','#FAC600','#EA4B1D'],
                borderWidth: 1
              }]
            }
          })
  </script>
  <script>
    var ctx = document.getElementById("barChart1").getContext('2d');
        var barChart = new Chart(
          ctx, {
            type: 'bar',
            data: {
              labels: <?= json_encode($grafmasukjur["nama_jur"])?>,
              datasets: [{
                label: 'Jumlah Mahasiswa',
                data: <?= json_encode($grafmasukjur["jumlah_mahasiswa"])?>,
                backgroundColor: '#D11C5B',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }
          })
  </script>
  <script>
    var ctx = document.getElementById("barChart2").getContext('2d');
        var barChart = new Chart(
          ctx, {
            type: 'bar',
            data: {
              labels: <?= json_encode($grafkeluarjur["nama_jur"])?>,
              datasets: [{
                label: 'Jumlah Mahasiswa',
                data: <?= json_encode($grafkeluarjur["jumlah_mahasiswa"])?>,
                backgroundColor: '#FAC600',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }
          })
  </script>
    <script>
    var ctx = document.getElementById("pieChart3").getContext('2d');
        var barChart = new Chart(
          ctx, {
            type: 'pie',
            data: {
              labels: <?= json_encode($grafmasukpro["nama_pro"])?>,
              datasets: [{
                label: 'Jumlah Mahasiswa',
                data: <?= json_encode($grafmasukpro["jumlah_mahasiswa"])?>,
                backgroundColor: ['#D11C5B','#F6EED5','#FAC600','#EA4B1D',
                '#9C7627','#C9BA86','#E8E3CC','#9C4A29','#AA6890'],
                borderWidth: 1
              }]
            }
          })
  </script>
  <script>
    var ctx = document.getElementById("pieChart4").getContext('2d');
        var barChart = new Chart(
          ctx, {
            type: 'pie',
            data: {
              labels: <?= json_encode($grafkeluarpro["nama_pro"])?>,
              datasets: [{
                label: 'Jumlah Mahasiswa',
                data: <?= json_encode($grafkeluarpro["jumlah_mahasiswa"])?>,
                backgroundColor: ['#D11C5B','#F6EED5','#FAC600','#EA4B1D',
                '#9C7627','#C9BA86','#E8E3CC','#9C4A29','#AA6890'],
                borderWidth: 1
              }]
            }
          })
  </script>
</body>
</html>