@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    <div class="main-login">

        <div class="card-login">
            <form action="{{ route('index') }}">
                <h2>Login</h2>

                <label for="email">Email</label>
                <input type="email" placeholder="Digite aqui..." class="input">
                <label for="password">Senha</label>
                <input type="password" placeholder="Digite aqui..." class="input">
                <center><button type="submit">Entrar</button></center>
            </form>
            <a href="#">Esqueceu a Senha?</a>
        </div>
    </div>

@endsection
