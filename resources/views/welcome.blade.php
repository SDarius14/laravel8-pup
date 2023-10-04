<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /* Set the body and HTML to 100% height */
            body, html {
                height: 100%;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
            }

            .container { /* Adjust the value as needed */
                padding: 20px;
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                gap: 10px;
            }

            #gradeChart, #gradeRangeChart, #classPerformanceChart {
                padding: 50px;
                border: 1px solid gray;
                border-radius: 25px;
                min-height: 300px;
                max-width: 600px;
                max-height: 600px;
            }
            
            th {
                padding: 10px; 
            }

            table, th, td {
                border: 1px solid black;
            }

            

            .datatable{
                margin-top: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 15px;
            }

            .cta{
                margin:20px;
                display: flex;
                justify-content: center;
                align-items: center; 
                gap: 10px;
            }

            .cta button {
                border: 1px solid rgba(0, 0, 255, 0.631);
                padding: 5px 10px;
                border-radius: 12px;
                background: rgba(0, 0, 255, 0.631);
                box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.05);
                color: white;
            }

            .cta button:hover {
                background: blue;
            }
            
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="datatable">
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Prelims</th>
                        <th>Midterms</th>
                        <th>Finals</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->student_name }}</td>
                            <td>{{ $student->prelim_grade }}</td>
                            <td>{{ $student->midterm_grade }}</td>
                            <td>{{ $student->final_grade }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="cta">
            <form action="{{route('view-pdf')}}" method="POST" target="__blank">
                @csrf
                <button type="submit">View in PDF</button>
            </form>
            <form action="{{route('download-pdf')}}" method="POST">
                @csrf
                <button type="submit">Download PDF</button>
            </form>

            <form action="{{route('export-excel')}}" method="POST">
                @csrf
                <button type="submit">Export Excel</button>
            </form>
            
        </div>
        <div class="container">
            <h1>Student Grades</h1>
            <canvas id="gradeChart"></canvas>
            <canvas id="classPerformanceChart" ></canvas>
            <canvas id="gradeRangeChart"></canvas>
        </div>
        <!-- Include Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById("gradeChart").getContext("2d");

            var datasets = [];

            @foreach ($students as $student)
                datasets.push({
                    label: "{{ $student->student_name }}",
                    borderColor: "{{ $student->chart_color }}",
                    data: [{{ $student->prelim_grade }}, {{ $student->midterm_grade }}, {{ $student->final_grade }}],
                    fill: false,
                });
            @endforeach

            var data = {
                labels: ["Prelims", "Midterms", "Finals"],
                datasets: datasets,
            };

            var options = {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: "Exams",
                        },
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: "Grades (%)",
                        },
                        suggestedMin: 75,
                        suggestedMax: 100,
                    },
                },
            };

            var myChart = new Chart(ctx, {
                type: "line",
                data: data,
                options: options,
            });
        </script>
        <script src="{{asset('js/performanceChart.js') }}"></script>
        <script src="{{asset('js/gradeRangeChart.js') }}"></script>
    </body>
</html>
