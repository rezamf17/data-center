    <section class="content">
      <div class="container-fluid">
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

                <p>Total Jabatan Admin</p>
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

                <p>Total Jabatan Pegawai</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totalAkunPJProyek; ?></h3>

                <p>Total Jabatan PJ Proyek</p>
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

                <p>Total Jabatan Member Proyek</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        </div>
    </div>
    <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Akun Chart</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="donutChartAdmin" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
          </div>
    </section>
    <script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
  <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */



    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var proyekData        = {
      labels: [
          'Admin',
          'Pegawai',
          'PJ Proyek',
          'Member Proyek',
      ],
      datasets: [
        {
          data: [
            <?php echo $totalAkunAdmin; ?>,
            <?php echo $totalAkunPegawai; ?>,
            <?php echo $totalAkunPJProyek; ?>,
            <?php echo $totalAkunMemberProyek; ?>
          ],
          backgroundColor : ['#00a65a', '#f39c12', '#f56954', '#007bff'],
        }
      ]
    }

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#donutChartAdmin').get(0).getContext('2d')
    var pieData        = proyekData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
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