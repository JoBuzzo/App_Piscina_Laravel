@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    <div class="main-login">


        <div class="card-login">


            <form action="{{ route('auth') }}" method="POST">
                @csrf
                <h2>Login</h2>
                <label for="name">Nome</label>
                <input type="text" name="name" placeholder="Digite aqui..." class="input">
                <label for="password">Senha</label>
                <input type="password" name="password" placeholder="Digite aqui..." class="input">
                <center><button type="submit">Entrar</button></center>
            </form>
            <a href="#">Esqueceu a Senha?</a>

            @if ($errors->all())
                <ul style="list-style: none">
                    @foreach ($errors->all() as $error)
                        <li style="color: red"> {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            
        </div>
    </div>

@endsection
