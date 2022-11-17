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
                <form action="#">
                    <label for="name">Nome</label>
                    <input type="text" value="Administrador">

                    <label for="email">Email</label>
                    <input type="email" value="admin@gmail.com">

                    <label for="email">Senha</label>
                    <input type="password" placeholder="Informe sua senha...">

                    <button type="submit">Editar</button>
                </form>

            </div>

        </div>
    </div>

@endsection
