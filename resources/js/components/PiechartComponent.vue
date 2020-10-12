<template>
  <!-- Pie Chart -->
  <div>
      <div class="row">
            <div class="col-xl-6 col-lg-8">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-danger">Issues by Priority</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="piechart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Low
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Medium
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> High
                    </span>
                  </div>
                </div>
              </div>
            </div>

      <div class="col-xl-6 col-lg-8">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Issues by Status</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink1">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="piechart1"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Resolved
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> In Progress
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Created
                    </span>
                  </div>
                </div>
              </div>
            </div>


      </div>

</div>
</template>
<script>

export default {
        mounted() {
            console.log('Pi chart mounted.');
            this.statusPiechart();
            this.priorityPiechart();
        },methods:
         {

statusPiechart() {
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("piechart");
var statusPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Low Risk", "Medium Risk", "High Risk"],
    datasets: [{
      data: [55, 30, 15],
      backgroundColor: ['#1cc88a', '#f6c23e', '#e74a3b'],
      hoverBackgroundColor: ['#198754', '#ffd100', '#dc1500'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
},
priorityPiechart() {
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("piechart1");
var priorityPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Resolved", "In Progress", "Ticket Created"],
    datasets: [{
      data: [40, 35, 25],
      backgroundColor: ['#1cc88a', '#f6c23e', '#0d6efd'],
      hoverBackgroundColor: ['#198754', '#ffd100', '#0dcaf0'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
}
         }}

</script>
<style>
.chart-pie {
  position: relative;
  height: 15rem;
  width: 100%;
}

@media (min-width: 768px) {
  .chart-pie {
    height: calc(20rem - 43px) !important;
  }
}

</style>
