<?php
require_once "./includes/header.php";
require_once "./classes/Role.php";
require_once "./classes/User.php";
require_once "./classes/Hire.php";

$user = new User($cn, $_SESSION['email']);

if(!$user->isProvider()) {
  header('Location: index.php');
}

if($user->isProvider()) {
  $totalJobAnalytic = json_encode($user->getAnalyticData());
  $completedJobAnalytic = json_encode($user->compeletedJobsAnalytic());
  $pendingJobAnalytic = json_encode($user->pendingJobsAnalytic());
}

require_once "./includes/navbar.php";
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<div class="main-container">
  <div class="container">
    <div class="row m-4 p-3">
      <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
          <div class="card-header">Previous jobs</div>
          <div class="card-body">
            <div class="display-2 card-title"><?php echo count(Hire::completedJobs($user->id())) ?></div>
            <p class="card-text">Total previously completed jobs</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
          <div class="card-header">Today jobs</div>
          <div class="card-body">
            <div class="display-2 card-title"><?php echo count(Hire::todayJobs($user->id())) ?></div>
            <p class="card-text">Total today's jobs</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
          <div class="card-header">Upcoming jobs</div>
          <div class="card-body">
            <div class="display-2 card-title"><?php echo count(Hire::uncompletedJobs($user->id())) ?></div>
            <p class="card-text">Total Upcoming jobs</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row my-5 mx-2">
      <div class="card">
        <canvas id="myChart" width="400" height="200"></canvas>
      </div>
    </div>
  </div>
  <script>
      let overAllAnalytic = <?php echo $totalJobAnalytic; ?>;
      let completedAnalytic = <?php echo $completedJobAnalytic; ?>;
      let pendingJobAnalytic = <?php echo $pendingJobAnalytic; ?>;

      const analytic = [];

      overAllAnalytic.forEach(item => {
        const completedIndex =   completedAnalytic.findIndex(a => a.date === item.date);
        const pendingIndex =   pendingJobAnalytic.findIndex(a => a.date === item.date);

        if(completedIndex === -1 && pendingIndex === -1) {
          analytic.push({
            date: item.date,
            completed: 0,
            pending: 0,
            total: item.total,
          });
        } else if(completedIndex === -1) {
          analytic.push({
            date: item.date,
            completed: 0,
            pending: pendingJobAnalytic[pendingIndex].total,
            total: item.total,
          });
        } else if(pendingIndex === -1) {
          analytic.push({
            date: item.date,
            completed: completedAnalytic[completedIndex].total,
            pending: 0,
            total: item.total,
          });
        } else {
          analytic.push({
            date: item.date,
            completed: completedAnalytic[completedIndex].total,
            pending: pendingJobAnalytic[pendingIndex].total,
            total: item.total,
          });
        }
      });

      var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: analytic.map(function (item) {
                  return item.date
                }),
                datasets: [{
                  label: 'Total Jobs',
                  fill: false,
                  data: analytic.map(function (item) {
                      return item.total
                  }),
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgba(255, 99, 132, 1)',
                  pointStyle: "circle",
                  borderWidth: 2,
                  pointHoverBorderWidth: 3,
                  pointHoverRadius: 15,
                  pointRotation: 5,
                  pointRadius: 5,
                }, 
                {
                  label: 'Pending Jobs',
                  data: analytic.map(function (item) {
                    return item.pending
                  }),
                  fill: false,
                  backgroundColor: 'rgba(255, 206, 86, 0.2)',
                  borderColor: 'rgba(255, 206, 86, 1)',
                  pointStyle: "circle",
                  borderWidth: 2,
                  pointHoverBorderWidth: 3,
                  pointHoverRadius: 15,
                  pointRotation: 5,
                  pointRadius: 5,
                }, 
                {
                  label: 'Completed Jobs',
                  data: analytic.map(function (item) {
                    return item.completed
                  }),
                  fill: false,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  pointStyle: "circle",
                  borderWidth: 2,
                  pointHoverBorderWidth: 3,
                  pointHoverRadius: 15,
                  pointRotation: 5,
                  pointRadius: 5,
                }, 
                
              ]
            },
            options: {
              scales: {
                  yAxes: [{
                      ticks: {
                        beginAtZero: true,
                        min: 0,
                      }
                  }]
              },
              tooltips: {
                enabled: true,
                intersect: false,
                mode: "index",
              },
            }
        });
     
    </script>
</div>

<?php 
require_once "./includes/scripts.php";
require_once "./includes/footer.php";
?>