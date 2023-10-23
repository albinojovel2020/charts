<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Gráficos</title>

    <!-- Enlaces a Bootstrap CSS y D3.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://d3js.org/d3.v6.min.js"></script>
</head>

<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
    <div>
        <h3 class="float-md-start mb-0">Gráficos</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link <?= Request::is('/') ? 'active' : '' ?>" aria-current="page" href="{{ route('home') }}">HighCharts</a>
            <a class="nav-link <?= Request::is('nhc') ? 'active' : '' ?>" href="{{ route('nhc') }}">Charts</a>
            <a class="nav-link <?= Request::is('nhcnc') ? 'active' : '' ?>" href="{{ route('nhcnc') }}">3D</a>
        </nav>
    </div>
</header>

        <main class="px-3">
        D3.js y  Laravel
            <div id="chart"></div>
        </main>

        <footer class="mt-auto text-white-50">
            <p>Rafael Albino Jovel Alfaro - JA01135920 - Desarrollo de Aplicaciones Web.</p>
        </footer>
    </div>

    <script>
    
        const data = <?= $data ?>;
        
        const width = 400;
        const height = 400;
        const radius = Math.min(width, height) / 2;

        const svg = d3.select("#chart")
            .append("svg")
            .attr("width", width)
            .attr("height", height)
            .append("g")
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

        const color = d3.scaleOrdinal(d3.schemeCategory10);

        const pie = d3.pie()
            .value(d => d.y);

        const path = d3.arc()
            .outerRadius(radius - 10)
            .innerRadius(0);

        const arc = svg.selectAll(".arc")
            .data(pie(data))
            .enter()
            .append("g")
            .attr("class", "arc");

        arc.append("path")
            .attr("d", path)
            .attr("fill", d => color(d.data.name));

        arc.append("text")
            .attr("transform", d => "translate(" + path.centroid(d) + ")")
            .attr("dy", "0.35em")
            .text(d => d.data.name);

    </script>
</body>
</html>
