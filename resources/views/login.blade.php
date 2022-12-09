@extends('layouts.template')

@section('content')

    @include('layouts.topbar')

    <div class="main-login">

        <div class="form-container">
            
                @if ($errors->all())
                    @foreach ($errors->all() as $error)@endforeach 
                @endif

                <form action="{{ route('auth') }}" method="POST">
                    @csrf
                    
                    <div class="relative z-0 mb-8 w-full group">
                        <input name="login" id="login" type="text" placeholder=" " value="{{ old('login') }}"
                            class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:border-gray-600 peer
                            @if (isset($error)) text-red-500 border-red-300  @endif"/>
                            <label for="login" class="whitespace-nowrap peer-focus:font-medium absolute text-xl duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8
                                @if (isset($error)) text-red-500 border-red-300  @endif">
                                Nome
                            </label>
                    </div>
                    <div class="relative z-0 mb-8 w-full group">
                        <input name="password" id="password" type="password" placeholder=" "
                            class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:border-gray-600 peer
                            @if (isset($error)) text-red-500 border-red-300  @endif"/>
                            <label for="password" class="whitespace-nowrap peer-focus:font-medium absolute text-xl duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8
                                @if (isset($error)) text-red-500 border-red-300  @endif">
                                Senha
                            </label>
                    </div>
                        
                        
                    <button class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg text-xl px-5 py-2.5 text-center">Salvar</button>
                    @include('components.is-invalid')
                </form>
        </div>

    </div>

@endsection
