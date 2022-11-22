@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    <div class="main-login">

        <div class="card-container">
            <div class="bottom">
                @if ($errors->all())
                    @foreach ($errors->all() as $error)@endforeach 
                @endif

                <form action="{{ route('auth') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="title">
                            <h1>Login</h1>
                        </div>
                        <div class="input-label">
                            <label for="name">Nome</label>
                            <input type="text" name="name" placeholder="Digite aqui..."
                            class="@if (isset($error)) error @endif">
                        </div>
                        <div class="input-label">
                            <label for="password">Senha</label>
                            <input type="password" name="password" placeholder="Digite aqui..."
                            class="@if (isset($error)) error @endif">
                        </div>
                        <div class="input-label">
                            <input type="submit" value="Entrar">
                            <div>
                                @if(isset($error))
                                    <div class="is-invalid">
                                            {{ $error }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection
