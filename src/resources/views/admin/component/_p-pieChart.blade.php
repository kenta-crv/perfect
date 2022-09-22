<div class="{{ $containerClass }}">
  <canvas id="pieChart"  class="{{ $canvasClass }}"></canvas>
</div>

<script>
  Chart.defaults.set('plugins.datalabels', {
    color: '#FE777B'
  });
  const pieLabels = [
    'IOS', 'Android', 'Web'
  ];
  const pieData = {
    labels: pieLabels,
    datasets: [
      {
        label: 'dataset 1',
        backgroundColor: [
          '#1781EB',
          '#feb013',
          '#0be497',


        ],
        data: [50, 55, 60],
      },
    ],
    borderColor: "#fff",
  }
  const pieConfig = {
    type: 'pie',
    data: pieData,
    plugins: [ChartDataLabels],
    options: {
      tooltips: {
        enabled: false
      },
      plugins: {
        legend: {
          position: 'right',
          labels: {
            usePointStyle: true,
          },
        },
        datalabels: {
          color: "#fff",
          formatter: (value, ctx) => {
            let datasets = ctx.chart.data.datasets;
            if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
              let sum = datasets[0].data.reduce((a, b) => a + b, 0);
              let percentage = Math.round((value / sum) * 100) + '%';
              return percentage;
            } else {
              return percentage;
            }
          },
        }
      },
    }
  }

  const pieChart = new Chart(
    document.getElementById('pieChart'),
    pieConfig
  );


</script>
