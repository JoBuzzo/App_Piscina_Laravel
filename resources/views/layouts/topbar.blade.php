<div class="topbar">
    <div class="logo">
        <i class="fas fa-swimming-pool"></i><h2>Recanto Vô Pedro</h2>
    </div>
    <div class="search">
        <input type="text" id="search" placeholder="Pesquisa">
        <label for="search"><i class="fas fa-search"></i></label>
    </div>
    
    <div class="dp-menu">
        <ul>
            <li>
                <i class="far fa-user-circle"></i>
                <ul>
                    <li><a href="{{route('perfil')}}"><i class="fa fa-user"></i> Perfil</a></li>
                    <li><a href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Log-out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>