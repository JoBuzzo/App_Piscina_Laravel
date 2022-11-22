<div class="topbar">
    <div class="logo">
        <i class="fas fa-swimming-pool"></i>
        <h2>Recanto Vô Pedro</h2>
    </div>


    <div class="search">
        <form action="{{ route('reservas') }}" method="GET">
                <button type="submit" class="lupa"><i class="fas fa-search"></i></button>
                <input type="search" id="search" placeholder="Pesquisar reservas" name="search"
                    @if (isset($search)) value="{{ $search }}" @endif>

        </form>
    </div>


    <div class="dp-menu">
        <ul>
            <li>
                <i class="far fa-user-circle"></i>
                <ul>
                    <li><a href="{{ route('perfil') }} "><i class="fa fa-user"></i> Perfil</a></li>
                    <li><a href="{{ route('viewConfig') }}"><i class="fas fa-cog"></i> Configurações</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Log-out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
