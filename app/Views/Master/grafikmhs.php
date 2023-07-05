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
                  <li><a href="<?= base_url('/master/mhs')?>">Master Mahasiswa</a></li>
                  <li class="active">Grafik Mahasiswa</li>
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
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK WILAYAH PADA MAHASISWA </h4>
                <canvas id="barChart" width="40px" height="10px"></canvas>
              </div>
            </div>
          </div><!-- /# column -->
          
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK JURUSAN PADA PRODI </h4>
                <canvas id="pieChart1"></canvas>
              </div>
            </div>
          </div><!-- /# column -->

          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mb-3 text-center">GRAFIK JURUSAN PADA MAHASISWA </h4>
                <canvas id="pieChart2"></canvas>
              </div>
            </div>
          </div><!-- /# column -->
        </div>
      </div><!-- .animated -->
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
<script>
    var ctx = document.getElementById("barChart").getContext('2d');
        var barChart = new Chart(
          ctx, {
            type: 'bar',
            data: {
              labels: <?= json_encode($grafikmhs["nama_wilayah"])?>,
              datasets: [{
                label: 'Keterangan',
                data: <?= json_encode($grafikmhs["jumlah_mahasiswa"])?>,
                backgroundColor: '#7FFF00',
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
        var pieChart1 = new Chart(
          ctx, {
            type: 'pie',
            data: {
              labels: <?= json_encode($grafikjur["nama_jur"])?>,
              datasets: [{
                data: <?= json_encode($grafikjur["jumlah_mahasiswa"])?>,
                backgroundColor: ['#7FFFD4',
                '#17BEBB','#FFC914','#7FFF00',
                '#9932CC','#D11C5B'],
                borderWidth: 1
              }]
            },
          })
</script>
<script>
    var ctx = document.getElementById("pieChart2").getContext('2d');
        var pieChart2 = new Chart(
          ctx, {
            type: 'pie',
            data: {
              labels: <?= json_encode($grafikpro["nama_jur"])?>,
              datasets: [{
                data: <?= json_encode($grafikpro["jumlah_mahasiswa"])?>,
                backgroundColor: ['#7FFFD4',
                '#17BEBB','#FFC914','#7FFF00',
                '#9932CC','#D11C5B','#F6EED5'],
                borderWidth: 1
              }]
            },
          })
</script>
</html>