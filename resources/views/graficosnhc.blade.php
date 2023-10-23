<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Gráficos</title>

    <!-- Enlaces a Bootstrap CSS y Chart.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
    <div>
        <h3 class="float-md-start mb-0">Gráficos</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link <?= Request::is('/') ? 'active' : '' ?>" aria-current="page" href="{{ route('home') }}">HighCharts</a>
            <a class="nav-link <?= Request::is('nhc') ? 'active' : '' ?>" href="{{ route('nhc') }}">Charts</a>
            <a class="nav-link <?= Request::is('nhcnc') ? 'active' : '' ?>" href="{{ route('nhcnc') }}">3D</a> </nav>
    </div>
</header>

        <main class="px-3">
            <div style="max-width: 600px; margin: 0 auto;">
            Usando Charts.js y Laravel
                <canvas id="myChart"></canvas>
            </div>
        </main>

        <footer class="mt-auto text-white-50">
            <p>Rafael Albino Jovel Alfaro - JA01135920 - Desarrollo de Aplicaciones Web.</p>
        </footer>
    </div>

    <script>
        // Data retrieved from the Laravel controller
        const data = <?= $data ?>;
        
        const labels = data.map(item => item.name);
        const values = data.map(item => item.y);

        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                    ],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Usando Chart.js y Laravel',
                }
            }
        });
    </script>
</body>
</html>
