<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Gráficos</title>

    <!-- Enlaces a Bootstrap CSS y Highcharts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://code.highcharts.com/5.0.14/css/highcharts.css" rel="stylesheet">
    
    <!-- Bootstrap JavaScript (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
    <!-- Highcharts JavaScript -->
    <script src="https://code.highcharts.com/5.0.14/js/highcharts.js"></script>
    <script src="https://code.highcharts.com/5.0.14/js/modules/data.js"></script>
    <script src="https://code.highcharts.com/5.0.14/js/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/5.0.14/js/modules/export-data.js"></script>
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
            <div id="container"></div>
        </main>

        <footer class="mt-auto text-white-50">
            <p>Rafael Albino Jovel Alfaro - JA01135920 - Desarrollo de Aplicaciones Web.</p>
        </footer>
    </div>

    <script>
        // Data retrieved from https://netmarketshare.com
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Usando Highcharts y Laravel',
                align: 'center'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: "Browsers",
                colorByPoint: true,
                data: <?= $data ?>
            }]
        });
    </script>
</body>
</html>
