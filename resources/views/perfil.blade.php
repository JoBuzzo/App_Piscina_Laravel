@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

    <div class="main-secundaria">

        <div class="card-container">



            <div class="top">

                <div class="image-container">
                    <i class="fas fa-user-alt"></i>
                </div>

            </div>
            <div class="bottom">

                <form action="{{ route('update.user') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <div class="input-label">
                            <label for="name">Nome</label>
                            <input type="text" value="{{ $user->name }}" name="name"
                                class="@if ($errors->has('name')) error @endif">

                            <div>
                                @if ($errors->has('name'))
                                    <div class="is-invalid">
                                        @foreach ($errors->get('name') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="input-label">
                            <label for="password">Senha</label>
                            <input type="password" placeholder="Informe sua senha..." name="password"
                                class="@if ($errors->has('password')) error @endif">
                            <div>
                                @if ($errors->has('password'))
                                    <div class="is-invalid">
                                        @foreach ($errors->get('password') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="input-label">
                            <input type="submit" value="Salvar">
                            <div>
                                @if (session('mensagem'))
                                    <div class="success">
                                        <span class="msg">{{ session('mensagem') }}</span>
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
