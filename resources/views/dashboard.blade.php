<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="barChart"></canvas>
    <script>
        var labels = @json($dataMahasiswa->pluck('jurusan'));
        var dataLakiLaki = @json($dataMahasiswa->pluck('total_laki_laki'));
        var dataPerempuan = @json($dataMahasiswa->pluck('total_perempuan'));

        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Laki-laki',
                        data: dataLakiLaki,
                        backgroundColor: 'blue',
                    },
                    {
                        label: 'Perempuan',
                        data: dataPerempuan,
                        backgroundColor: 'pink',
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        stacked: true,
                    },
                    y: {
                        beginAtZero: true,
                        stacked: true,
                    },
                },
            },
        });
    </script>
</body>

</html>