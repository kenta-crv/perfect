<div class="{{ $containerClass }}">
  <canvas id="myChart"  class="{{ $canvasClass }}"></canvas>
</div>

<script>
  const labels = [
    '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'
  ];
  const data = {
    labels: labels,
    datasets: [
      {

        label: '登録ユーザー数',
        backgroundColor: [
          '#1781EB',

        ],
        borderColor: [
          '#1781EB',
        ],
        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0,  0, 0, 0,  0, 0, 0,  0, 60, 60],
        borderWidth: 1,
      },
      {
        label: '登録企業数 増減推移',
        backgroundColor: [
          '#0be497'

        ],
        borderColor: [
          '#0be497'
        ],
        data: [10, 10, 10, 10,10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10],
        borderWidth: 1,
      },
    ],
  }
  const config = {
    type: 'bar',
    data: data,
    plugins: [ChartDataLabels],

    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            usePointStyle: true,
          },
        },
        datalabels: {
          color: '#ffffff',
          formatter: function (value) {
            return Math.round(value) + '%';
          },
          font: {
            weight: 'bold',
            size: 16,
            family: 'Josefin Sans',
          }
        }
      },
      scales: {
        x: {
          stacked: true,
          grid: {
            display: false,
          },
        },
        y: {
          stacked: true
        }
      },
    }
  }

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
