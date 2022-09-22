@extends('admin.layout.layout--admin')
  @section('title', $title ?? 'ダッシュボード')

  @section('content')
  <div style="height:100px">
    <canvas id="myChart" style="width:500px" ></canvas>
  </div>

  <script>
    const labels = [
      '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'
    ];
    const data = {
      labels: labels,
      datasets: [
        {
          label: 'dataset 1',
          backgroundColor: [
            '#1781EB',

          ],
          borderColor: [
            '#1781EB',
          ],
          data: [0.1, 0.2, 1.0],
          borderWidth: 1,
        },
        {
          label: 'dataset 2',
          backgroundColor: [
            '#0be497'

          ],
          borderColor: [
            '#0be497'
          ],
          data: [0.1, 0.1, 0.1],
          borderWidth: 1,
        },
      ],
    }
    const config = {
      type: 'bar',
      data: data,
      options: {
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
        }
      }
    }

    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  </script>
@endsection
