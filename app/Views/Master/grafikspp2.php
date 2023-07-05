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
              <li><a href="<?= base_url('/master/spp')?>">Master SPP</a></li>
                  <li class="active">Grafik Master SPP</li>
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
                <h4 class="mb-3 text-center">PEMBAYARAN SPP MAHASISWA </h4>
                <form action="<?= base_url()?>/master/grafikspp2" method="POST">
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

          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK PEMBAYARAN SPP MAHASISWA</h4>
                <canvas id="bar"> </canvas>
              </div>
            </div>
          </div><!-- /# column -->

          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK JUMLAH PEMBAYARAN SPP MAHASISWA</h4>
                <canvas id="bar2"> </canvas>
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
              labels: <?= json_encode($grafsppmhs["tipe"])?>,
              datasets: [{
                label: 'Jumlah Mahasiswa',
                data: <?= json_encode($grafsppmhs["jumlah_mahasiswa"])?>,
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
    var ctx = document.getElementById("bar2").getContext('2d');
        var barChart = new Chart(
          ctx, {
            type: 'bar',
            data: {
              labels: <?= json_encode($grafsppmhs2["tipe"])?>,
              datasets: [{
                label: 'Jumlah SPP Mahasiswa',
                data: <?= json_encode($grafsppmhs2["jumlah_SPP"])?>,
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
</body>
</html>