@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

    <div class="main-secundaria">

        <div class="card-container">

            <div id="bottom">
                <form action="{{ route('config') }}" method="POST">
                    @csrf
                    <label for="entrada_um">Entrada (1 dia)</label>
                    <input type="text" placeholder="Informe o nome" name="entrada_um" value="{{ $config->entrada_um }}">

                    <label for="entrada_dois">Entrada (2 dias)</label>
                    <input type="text" placeholder="Informe o nome" name="entrada_dois"
                        value="{{ $config->entrada_dois }}">

                    <label for="completo_um">Completo (1 dia)</label>
                    <input type="text" placeholder="Informe o nome" name="completo_um"
                        value="{{ $config->completo_um }}">

                    <label for="completo_dois">Completo (2 dias)</label>
                    <input type="text" placeholder="Informe o nome" name="completo_dois"
                        value="{{ $config->completo_dois }}">

                    <button type="submit">Salvar</button>
                </form>

                @if (session('mensagem'))
                    <p>{{ session('mensagem') }}</p>
                @endif

            </div>


            <center>
                @if ($errors->any())
                    <ul style="list-style: none">
                        @foreach ($errors->all() as $error)
                            <li style="color: red"> {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </center>

        </div>

    @endsection
