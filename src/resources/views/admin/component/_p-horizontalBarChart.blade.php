<div class="{{ $containerClass }}" >
  <canvas id="horizontalChart" style="height: 200px" class="{{ $canvasClass }}"></canvas>
</div>

<script>
  const horizontalLabels = [
    '10ft', '20ft', '30ft', '40ft', '50ft','60ft','70ft',
  ];
  const horizontalData = {
    labels: horizontalLabels,
    datasets: [
      {
        label: 'dataset 1',
        backgroundColor: [
          '#1781EB',

        ],
        borderColor: [
          '#1781EB',
        ],
        data: [50, 45, 25, 100,],
        borderWidth: 1,
      },

    ],
  }
  const horizontalConfig = {
    type: 'bar',
    data: horizontalData,
    options: {
      indexAxis: 'y',
      barPercentage: 0.5,
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom',

        },
      },
      scales: {
        x: {
          grid: {
            display: false,
          },
        },
        y: {
          ticks: {
            min:0,
            stepSize: 100,
          },

        },
      }
    }
  }

  const horizontalChart = new Chart(
    document.getElementById('horizontalChart'),
    horizontalConfig
  );
</script>
