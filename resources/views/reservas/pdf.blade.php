<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Dias Livres</title>
    <style>
        .titulo {
            padding: 5px;
            background-color: black;
            color: white;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 50px;
        }

        table {
            width: 100%;
            border: 1px solid white;
            border-collapse: collapse;
        }

        table thead {
            background-color: black;
            color: white;

        }

        table th {
            text-align: left;
            padding: 2px;
        }
        table td {
            text-align: center;
            padding: 2px;
            border: 0.5px solid black;

        }
    </style>

</head>

<body>

    <div class="titulo">
        Dias livres para serem reservados
    </div>

    <table>
        <thead>
            <th colspan="{{ count($dias) - 1 }}">Dias</th>
            <th>{{ date('M', strtotime($mes)) }}</th>
        </thead>
        <tbody>
            @foreach ($dias as $key => $dia)
                <td>{{ date('d', strtotime($dia)) }}</td>
            @endforeach
        </tbody>
    </table>





</body>

</html>
