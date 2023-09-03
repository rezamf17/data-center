<?php echo view('header') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <p style="font-size: x-large;">Welcome, <?php echo session()->get('name'); ?> di Sistem Informasi Data Center</p>
      <?php if (session()->get('role') === 'Admin') : ?>
        <?php echo view('Dashboard/DashboardAdmin') ?>
      <?php elseif (session()->get('role') === 'PJ' || session()->get('role') === 'Member' || session()->get('role') === 'Pegawai') : ?>
        <?php echo view('Dashboard/DashboardProyek') ?>
      <?php else : ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total; ?></h3>
                <p>Total Proyek</p>
              </div>
              <div class="icon">
                <i class="ion ion-home"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totalOnGoing; ?></h3>

                <p>Total Proyek On-Going</p>
              </div>
              <div class="icon">
                <i class="ion ion-play"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totalHold; ?></h3>

                <p>Total Proyek Hold</p>
              </div>
              <div class="icon">
                <i class="ion ion-pause"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalFinish; ?></h3>

                <p>Total Proyek Finish</p>
              </div>
              <div class="icon">
                <i class="ion ion-checkmark"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $totalAkun; ?></h3>
                <p>Total Akun</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalAkunAdmin; ?></h3>

                <p>Total Admin</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totalAkunPegawai; ?></h3>

                <p>Total Pegawai</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totalAkunPJProyek; ?></h3>

                <p>Total PJ Proyek</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $totalAkunMemberProyek; ?></h3>

                <p>Total Member Proyek</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-4">
            <!-- AREA CHART -->

            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Proyek Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <div class="col-md-12 col-lg-8">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Akun Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
    </div>
  <?php endif; ?>

  <!-- /.col (LEFT) -->
  <!-- /.content -->
</div>
</div>
<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
<script>
  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */



    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var akunData = {
      labels: [
        'On-Going',
        'Hold',
        'Finish',
      ],
      datasets: [{
        data: [
          <?php echo $totalOnGoing; ?>,
          <?php echo $totalHold; ?>,
          <?php echo $totalFinish; ?>
        ],
        backgroundColor: ['#ffc107', '#dc3545', '#28a745'],
      }]
    }
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: akunData,
      options: donutOptions
    })

    var proyekData = {
      labels: [
        'Admin',
        'Pegawai',
        'PJ Proyek',
        'Member Proyek',
      ],
      datasets: [{
        data: [
          <?php echo $totalAkunAdmin; ?>,
          <?php echo $totalAkunPegawai; ?>,
          <?php echo $totalAkunPJProyek; ?>,
          <?php echo $totalAkunMemberProyek; ?>
        ],
        backgroundColor: ['#28a745', '#ffc107', '#dc3545', '#007bff'],
      }]
    }

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = proyekData;
    var pieOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

  })
</script>
<?php echo view('footer') ?>