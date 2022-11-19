@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

    <div class="main-secundaria">

        <div class="card-container">

            <div class="top">

                <div class="image-container">
                    <img src="/IMG/user.png" alt="user">
                </div>

            </div>
            <div class="bottom">
                <form action="{{ route('update.user') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label for="name">Nome</label>
                    <input type="text" value="{{ $user->name }}" name="name">

                    <label for="email">Senha</label>
                    <input type="password" placeholder="Informe sua senha..." name="password">

                    <button type="submit">Editar</button>
                </form>
                @if (session('mensagem'))
                        <p>{{ session('mensagem') }}</p>
                @endif
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

        </div>
    </div>

@endsection
