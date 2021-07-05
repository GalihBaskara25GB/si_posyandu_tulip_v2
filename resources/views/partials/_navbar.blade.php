<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex align-items-center">
    <a class="navbar-brand brand-logo text-white" href="{{route('home')}}">
      <img src="{{asset('assets/images/logo.png')}}" alt="logo" class="logo-dark" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="{{route('home')}}">
      <img src="{{asset('assets/images/logo-circle.svg')}}" alt="logo" />
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
    @php
      $numSegments = count(Request::segments());
      for($i = 1; $i <= $numSegments; $i++) : 
        if($numSegments > 2 && $i == 2) continue;
        if(    $numSegments == 2 
            && Request::segment(2) != 'create' 
            && Request::segment(2) != 'topsis' 
            && Request::segment(2) != 'ahp'  
            && $i == 2) :
            echo 'Show';  
          continue;
        endif;
        if($i < count(Request::segments()) & $i > 0) : 
          echo ucwords(str_replace('-',' ',Request::segment($i))).' / ' ; 
        else : echo ucwords(str_replace('-',' ',Request::segment($i)));
        endif;
      endfor;
    @endphp
    <ul class="navbar-nav navbar-nav-right ml-auto">
      <form class="search-form d-none d-md-block" action="#">
        <i class="icon-magnifier"></i>
        <input type="search" class="form-control" placeholder="Search Here" title="Search here">
      </form>
      
      <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle ml-2" src="{{asset('assets/images/avatar/avatar-blue-circle.png')}}" alt="Profile image">
          <span class="font-weight-normal">{{ Auth::user()->kader->nama }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img 
              class="img-md rounded-circle" 
              src="{{asset('assets/images/avatar/avatar-blue-circle.png')}}" 
              alt="Profile image"
              width="100">
            <p class="mb-1 mt-3">{{ Auth::user()->kader->nama }}|{{ Auth::user()->username }} </p>
            <p class="font-weight-light text-muted mb-0">{{ ucfirst(Auth::user()->role) }}</p>
          </div>
          <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile</a>
          <a class="dropdown-item" href="{{route('logout')}}">
            <i class="dropdown-item-icon icon-power text-primary"></i>Sign Out
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>