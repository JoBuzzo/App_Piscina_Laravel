@extends('app')

@section('title', '')

@section('navbar')
    <x-navbar  />
    <x-sidebar />
@endsection


@section('content')
    <x-toast.alert />
    <x-alert.error />
    <x-form action="{{ route('users.update', $user->id) }}" method="PUT">
        
        <div class="mb-6">
            <x-input.text name="name" label="Nome" placeholder="Nome do usuário..." value="{{ $user->name }}" />
        </div>
        <div class="mb-6">
            <x-input.text name="login" label="Login" placeholder="Login do usuário..." value="{{ $user->login }}" />
        </div>
        <div class="mb-6">
            <x-input.password name="password" label="Senha" placeholder="••••••••" />
        </div>
        
        </div>
        <div class="flex items-center justify-center">
            <x-button.submit>Enviar</x-button.submit>
        </div>
        
    </x-form>





@endsection

