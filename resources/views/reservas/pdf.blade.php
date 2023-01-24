@php
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
@endphp
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Lista de datas</title>
    <style>
        .logo {
            text-align: center;
            margin-bottom: 50px;
            width: 100%;
        }

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

        .informacao {
            margin-top: 100px;
            margin-bottom: 100px;
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
            text-align: center;
            border: 0.5px solid black;
        }

        table td {
            text-align: center;
            border: 0.5px solid black;

        }
    </style>

</head>

<body>

    <div class="logo">
        <img src="IMG/logo.png" alt="Recanto Vô Pedro" width="60">
    </div>

    <div class="titulo">
        # Recanto Vô Pedro #
    </div>

    <div class="informacao">
        <p>
            O Recanto Vô Perdro é um otimo lugar para aqueles que desejam passar um final de semana com a família em um
            lugar aconchegante com muito espaço para o lazer.
            <br>
            O espaço é composto por uma grande piscina e uma area ainda maior, possui fogão a gás, fogão a lenha,
            churrasqueira, duas cozinhas e um quarto com 2 camas de casal e um sofá.
            <br>
            Para aqueles que buscam um lugar para passar com a família uma data especial o Recanto Vô Pedro é sua melhor
            opção.
        </p>
    </div>

    <div class="informacao">
        <p> - Contato: (18) 99704-4724, (18) 99603-4724 ou <a
                href="https://instagram.com/recantodovopedro?igshid=OGQ2MjdiOTE="target="_blank">@recantodovopedro</a>
        </p>
        <p> - Endereço: R. Serigpe, 155 - Tarumã-SP,</p>
    </div>

    <table>
        <thead>
            <th colspan="{{ count($dias) > 16 ? 16 :  count($dias) }}">Mês de {{ ucwords(strftime('%B', strtotime($mes))) }}</th>
        </thead>
        <tbody>
            <tr>
                @for ($i = 0; $i < count($dias); $i++)
                    @isset($dias[$i])
                        <td>{{ date('d', strtotime($dias[$i])) }}</td>
                    @endisset
                    @break($i == 15)
                @endfor

            </tr>
            <tr>
                @for ($i = 0; $i < count($dias); $i++)
                    @isset($dias[$i])
                        <td>{{ utf8_encode(strftime('%a', strtotime($dias[$i]))) }}</td>
                    @endisset
                    @break($i == 15)
                @endfor
            </tr>
            <tr>
                <td colspan="{{ count($dias) > 16 ? 16 :  count($dias) }}"><br></td>
            </tr>

            @if (count($dias) > 15)
                <tr>
                    @for ($i = 16; $i < count($dias); $i++)
                        @isset($dias[$i])
                            <td>{{ date('d', strtotime($dias[$i])) }}</td>
                        @endisset
                    @endfor
                </tr>
                <tr>
                    @for ($i = 16; $i < count($dias); $i++)
                        @isset($dias[$i])
                            <td>{{ utf8_encode(strftime('%a', strtotime($dias[$i]))) }}</td>
                        @endisset
                    @endfor
                </tr>
            @endif
            
        </tbody>
    </table>


</body>

</html>
