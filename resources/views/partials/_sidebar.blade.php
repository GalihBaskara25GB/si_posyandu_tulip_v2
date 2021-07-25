<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">
      <span class="nav-link">Dashboard</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('home')}}">
        <span class="menu-title">Dashboard</span>
        <i class="icon-speedometer menu-icon"></i>
      </a>
    </li>
    @if(Auth::user()->isAdmin())
    <li class="nav-item nav-category"><span class="nav-link">Manajemen Data</span></li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('kaders.index')}}">
        <span class="menu-title">Data Kader</span>
        <i class="icon-people menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('users.index')}}">
        <span class="menu-title">Data User</span>
        <i class="icon-credit-card menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('objekKriterias.index')}}">
        <span class="menu-title">Data Objek Kriteria</span>
        <i class="icon-list menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('kriterias.index')}}">
        <span class="menu-title">Data Kriteria</span>
        <i class="icon-layers menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('rangkings.index')}}">
        <span class="menu-title">Rangking AHP-TOPSIS</span>
        <i class="icon-chart menu-icon"></i>
      </a>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="{{route('rangking')}}">
        <span class="menu-title">Rangking AHP-TOPSIS</span>
        <i class="icon-chart menu-icon"></i>
      </a>
    </li>
    @endif
    <li class="nav-item nav-category">
      <span class="nav-link">Informasi</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('about')}}">
        <span class="menu-title">About Us</span>
        <i class="icon-info menu-icon"></i>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="{{route('logout')}}">
        <span class="menu-title">Sign Out</span>
        <i class="icon-power menu-icon"></i>
      </a>
    </li> -->

  </ul>
</nav>