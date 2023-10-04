<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;

        }
        th {
                padding: 10px; 
            }

            table, th, td {
                border: 1px solid black;
            }

            

            .datatable{
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 15px;
            }
    </style>
</head>
<body>
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
</body>
</html>