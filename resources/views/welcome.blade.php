<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="antialiased">
    <hr>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0 container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Bay</td>
                                    <td>Original</td>
                                    <td>Actual</td>
                                    <td>Productivity(= Actual/Original*100%)</td>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>8</td>
                                    <td>5</td>
                                    <td>=5/8*100%=62.5%</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>8</td>
                                    <td>6</td>
                                    <td>=6/8*100%=75%</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>8</td>
                                    <td>7</td>
                                    <td>=7/8*100%=87.5</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div id="chart_div" style="width: 900px; height: 500px;"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('js/loader.js') }}"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Original', 'Actual', 'Productivity'],
                ['1', 8, 5, {
                    v: 62.5,
                    f: '62.5%'
                }],
                ['2', 8, 6, {
                    v: 75,
                    f: '75%'
                }],
                ['3', 8, 7, {
                    v: 87.5,
                    f: '87.5%'
                }],
            ]);

            var options = {
                title: 'Report Bay capacity',
                vAxis: {
                    title: '',
                    minValue: 0
                },
                hAxis: {
                    title: ''
                },
                seriesType: 'bars',
                // series: {2: {type: 'line'}},
                legend: {
                    position: 'bottom'
                },
                series: {
                    // 2: {},
                    0: {
                        targetAxisIndex: 0
                    },
                    1: {
                        targetAxisIndex: 0
                    },
                    2: {
                        targetAxisIndex: 1,
                        format: '%',
                        type: 'line'
                    },
                },
                vAxes: {
                    // Adds titles to each axis.
                    // 0: {title: 'parsecs'},
                    0: {
                        ticks: [{
                                v: 0,
                                f: '0'
                            },
                            {
                                v: 1,
                                f: '1'
                            },
                            {
                                v: 2,
                                f: '2'
                            },
                            {
                                v: 3,
                                f: '3'
                            },
                            {
                                v: 4,
                                f: '4'
                            },
                            {
                                v: 5,
                                f: '5'
                            },
                            {
                                v: 6,
                                f: '6'
                            },
                            {
                                v: 7,
                                f: '7'
                            },
                            {
                                v: 8,
                                f: '8'
                            },
                            {
                                v: 9,
                                f: '9'
                            },
                            {
                                v: 10,
                                f: '10'
                            },
                        ]
                    },
                    1: {
                        ticks: [{
                                v: 0,
                                f: '0%'
                            },
                            {
                                v: 10,
                                f: '10%'
                            },
                            {
                                v: 20,
                                f: '20%'
                            },
                            {
                                v: 30,
                                f: '30%'
                            },
                            {
                                v: 40,
                                f: '40%'
                            },
                            {
                                v: 50,
                                f: '50%'
                            },
                            {
                                v: 60,
                                f: '60%'
                            },
                            {
                                v: 70,
                                f: '70%'
                            },
                            {
                                v: 80,
                                f: '80%'
                            },
                            {
                                v: 90,
                                f: '90%'
                            },
                            {
                                v: 100,
                                f: '100%'
                            },
                        ]
                    },
                    // 2: {title: 'apparent magnitude'}
                }

            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>
