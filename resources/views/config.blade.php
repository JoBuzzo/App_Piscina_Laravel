@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    @include('layouts.sidebar')

    <div class="main-secundaria">

        <div class="card-container">

            <div id="bottom">
                <form action="{{ route('config') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-label">
                            <label for="entrada_um">Entrada (1 dia)</label>
                            <input type="text" placeholder="Informe o nome" name="entrada_um"
                            value="{{ $config->entrada_um }}"@if ($errors->has('entrada_um')) error @endif>

                            <div>
                                @if ($errors->has('entrada_um'))
                                    <div class="is-invalid">
                                        @foreach ($errors->get('entrada_um') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="input-label">
                            <label for="entrada_dois">Entrada (2 dias)</label>
                            <input type="text" placeholder="Informe o nome" name="entrada_dois"
                            value="{{ $config->entrada_dois }}"@if ($errors->has('entrada_dois')) error @endif>

                            <div>
                                @if ($errors->has('entrada_dois'))
                                    <div class="is-invalid">
                                        @foreach ($errors->get('entrada_dois') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="input-label">
                            <label for="completo_um">Completo (1 dia)</label>
                            <input type="text" placeholder="Informe o nome" name="completo_um"
                            value="{{ $config->completo_um }}"@if ($errors->has('completo_um')) error @endif>

                            <div>
                                @if ($errors->has('completo_um'))
                                    <div class="is-invalid">
                                        @foreach ($errors->get('completo_um') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="input-label">
                            <label for="completo_dois">Completo (2 dias)</label>
                            <input type="text" placeholder="Informe o nome" name="completo_dois"
                            value="{{ $config->completo_dois }}"@if ($errors->has('completo_dois')) error @endif>
                            
                            <div>
                                @if ($errors->has('completo_dois'))
                                    <div class="is-invalid">
                                        @foreach ($errors->get('completo_dois') as $error)
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

    @endsection
