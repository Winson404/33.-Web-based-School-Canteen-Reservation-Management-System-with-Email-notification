<title>Web-based School Canteen Reservation Management System | Income reports</title>
<?php
  require_once 'sidebar.php';
  require '../classes/reservation.php';
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Income reports</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Income reports</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-4">
            <div class="card card-info shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Over All Daily Report</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <?php
                    $reserve = new Reservation();
                    $date = date('Y-m-d'); // Use the desired date here
                    $dailyIncome = $reserve->getDailyIncome($date);
                ?>
                <h3>₱<?php echo number_format($dailyIncome, 2, '.', ','); ?></h3>
                <p>Daily Income</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card card-success shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Over All Monthly Report</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <?php
                    $reserve = new Reservation();
                    $year = date("Y"); // Get the current year
                    $month = date("m"); // Get the current month
                    $monthlyIncome = $reserve->getMonthlyIncome($year, $month);
                ?>
                <h3>₱<?php echo number_format($monthlyIncome, 2, '.', ','); ?></h3>
                <p>Montly Income</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card card-danger shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Over All Report</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <?php
                    $reserve = new Reservation();
                    $totalincome = $reserve->getTotalIncome();
                ?>
                <h3>₱<?php echo number_format($totalincome, 2, '.', ','); ?></h3>
                <p>Total Income</p>
              </div>
            </div>
          </div>
      

        
      </div>
    </div>
  </section>
  <?php require_once '../includes/footer.php'; ?>