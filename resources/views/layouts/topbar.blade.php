@php
    $nome = explode(' ', Auth::user()->name);
    $segundo_nome = (isset($nome)) ? $nome[0] . ' ' . end($nome) : $nome[0];
    $iniciais = strstr($segundo_nome, ' ', true)[0] . trim(strstr($segundo_nome, ' ')[1])
@endphp
<div class="topbar">
    <div class="logo">
        <i class="fas fa-swimming-pool"></i>
        <h2>Dashboard</h2>
    </div>
    @Auth
    <div class="search">
        <form action="{{ route('reservas') }}" method="GET">
                <button type="submit" class="lupa"><i class="fas fa-search"></i></button>
                <input type="search" id="search" placeholder="Pesquisar..." name="search"
                    @if (isset($search)) value="{{ $search }}" @endif>

        </form>
    </div>

        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-blue-200 rounded-full" type="button">
            <span class="font-medium text-gray-600 uppercase">{{ $iniciais }}</span>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdownAvatar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
            <div class="py-3 px-4 text-sm">
            <div class="font-medium truncate">{{ Auth::user()->name }}</div>
            </div>
            <ul class="py-1 text-sm" aria-labelledby="dropdownUserAvatarButton">
            <li>
                <a href="{{ route('index') }}" class="block py-2 px-4 hover:bg-gray-100"><i class="fas fa-chart-bar"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('perfil') }} " class="block py-2 px-4 hover:bg-gray-100"><i class="fa fa-user"></i> Perfil</a>
            </li>
            <li>
                <a href="{{ route('viewConfig') }}" class="block py-2 px-4 hover:bg-gray-100"><i class="fas fa-cog"></i> Configurações</a>
            </li>
            </ul>
            <div class="py-1">
            <a href="{{ route('logout') }}" class="block py-2 px-4 text-sm c hover:bg-gray-100"><i class="fas fa-sign-out-alt"></i> Log-out</a>
            </div>
        </div>
        @endauth
</div>
