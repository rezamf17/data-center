<section class="content">
  <div class="container-fluid">
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
      <div class="col-md-12 col-lg-6">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Proyek Chart</h3>

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
            <canvas id="donutChartProyek" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>

      </div>
    </div>
</section>
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
    var donutChartCanvas = $('#donutChartProyek').get(0).getContext('2d')
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

  })
</script>