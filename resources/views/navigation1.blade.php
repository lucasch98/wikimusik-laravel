<nav class="navbar navbar-expand-sm bg-dark navbar-dark"> 
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item active">
      <a class="nav-link">WikiMusik</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('bandas')}}">Bandas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('albumes')}}">Albumes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('canciones')}}">Canciones</a>
    </li>
    
    @if(Auth::user()->hasRole('admin'))
    <li class="nav-item">
          <a class="nav-link" href="{{route('generos')}}">Generos</a>
        </li>
    @endif
    
   
  </ul>

  <div class="navbar-nav my-2 my-lg-0">
            <form method="POST" action="{{ route ('logout' )}}" calss="nav-item">
                @csrf
                <a href="#" class="nav-link px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault(); this.closest('form').submit();" >Cerrar sesion</a>
            </form>
  </div>

</nav>













