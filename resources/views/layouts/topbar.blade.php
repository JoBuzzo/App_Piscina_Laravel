<div class="topbar">
    <div class="logo">
        <i class="fas fa-swimming-pool"></i>
        <h2>Dashboard</h2>
    </div>
    @Auth
        <x-avatar value="{{ Auth::user()->name }}" color="{{ Auth::user()->cor }}" data-dropdown-toggle="dropdownAvatar"/> 
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
                    <a href="{{ route('perfil', ['id' => Auth::user()->id]) }} " class="block py-2 px-4 hover:bg-gray-100"><i class="fas fa-user-circle"></i> Meu Perfil</a>
                </li>
                <li>
                    <a href="{{ route('admins') }}" class="block py-2 px-4 hover:bg-gray-100"><i class="fas fa-users-cog"></i> Administradores</a>
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
