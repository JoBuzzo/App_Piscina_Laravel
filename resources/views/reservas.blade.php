@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')


    <div class="main-secundaria">

        <div class="table">
            <table>
                <tr>
                    <th class="datas">Datas</th>
                    <th class="nome">Nomes</th>
                    <th>Consultar</th>
                </tr>
                <tr>
                    <td class="datas">30/10/2022</td>
                    <td class="nome">João Lucas Buzzo</td>
                    <td><a href="{{ route('ver') }}" class="show">Ver mais</a></td>
                </tr>
                <tr>
                    <td class="datas">28/11/2022 - 29/11/2022</td>
                    <td class="nome">João Lucas Buzzo</td>
                    <td><a href="{{ route('ver') }}" class="show">Ver mais</a></td>
                </tr>
                <tr>
                    <td class="datas">11/11/2022 - 12/11/2022</td>
                    <td class="nome">João Lucas Buzzo</td>
                    <td><a href="{{ route('ver') }}" class="show">Ver mais</a></td>
                </tr>
                <tr>
                    <td class="datas">21/12/2022</td>
                    <td class="nome">João Lucas Buzzo</td>
                    <td><a href="{{ route('ver') }}" class="show">Ver mais</a></td>
                </tr>
                <tr>
                    <td class="datas">30/12/2022</td>
                    <td class="nome">João Lucas Buzzo</td>
                    <td><a href="{{ route('ver') }}" class="show">Ver mais</a></td>
                </tr>
                <tr>
                    <td class="datas">31/12/2022 - 01/01/2023</td>
                    <td class="nome">João Lucas Buzzo</td>
                    <td><a href="{{ route('ver') }}" class="show">Ver mais</a></td>
                </tr>
                <tr>
                    <td class="datas">03/12/2023</td>
                    <td class="nome">João Lucas Buzzo</td>
                    <td><a href="{{ route('ver') }}" class="show">Ver mais</a></td>
                </tr>
                <tr>
                    <td class="datas">04/01/2023</td>
                    <td class="nome">João Lucas Buzzo</td>
                    <td><a href="{{ route('ver') }}" class="show">Ver mais</a></td>
                </tr>
                <tr>
                    <td class="datas">06/01/2023 - 07/01/2023</td>
                    <td class="nome">João Lucas Buzzo</td>
                    <td><a href="{{ route('ver') }}" class="show">Ver mais</a></td>
                </tr>
                <tr>
                    <td class="datas">10/02/2023</td>
                    <td class="nome">João Lucas Buzzo</td>
                    <td><a href="{{ route('ver') }}" class="show">Ver mais</a></td>
                </tr>

            </table>

        </div>
    </div>
@endsection
