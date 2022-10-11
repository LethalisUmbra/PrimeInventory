<nav class="navbar navbar-expand-xl navbar-dark bg-dark p-0">
    <div class="container-fluid">
        <a class="navbar-brand me-2 px-2" href="{{ route('home') }}" style="height: 60px;"><img src="/img/wf.png" class="h-100 w-auto"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrime" aria-controls="navbarPrime" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarPrime">
          <ul class="navbar-nav me-auto mb-0">
            <li class="nav-item">
              <a class="nav-link {{ setActive('home') }} {{ setActive('post.*') }}" href="{{ route('home') }}">@lang('Home')</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle {{ setActive('primary') }} {{ setActive('secondary') }} {{ setActive('melee') }}" href="#" id="navbarDropdownWeapons" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @lang('Weapons')
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownWeapons">
                <li><a class="dropdown-item" href="{{ route('primary') }}">@lang('Primaries')</a></li>
                <li><a class="dropdown-item" href="{{ route('secondary') }}">@lang('Secondaries')</a></li>
                <li><a class="dropdown-item" href="{{ route('melee') }}">@lang('Melees')</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ setActive('warframe') }}" href="{{ route('warframe') }}">@lang('Warframes')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ setActive('companion') }}" href="{{ route('companion') }}">@lang('Companions')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ setActive('archwing') }}" href="{{ route('archwing') }}">@lang('Archwings')</a>
            </li>
          </ul>

          <ul class="d-flex navbar-nav mb-2 mb-lg-0">
            <form class="d-flex me-3" action="{{ route('search') }}">
              <input class="form-control rounded-0 rounded-start" type="search" placeholder="@lang('Search')" aria-label="Search" name="filter">
              <button class="btn btn-outline-warning rounded-0 rounded-end" type="submit">@lang('Search')</button>
            </form>
            <!-- Locale Form -->
            <li class="nav-item dropdown mx-2">
              <form method="POST" action="{{ route('changeLocale') }}" class="navbar-select">
                @csrf
                <select id="locale" name="locale" class="px-1 nav-link dropdown-toggle bg-transparent border-0 rounded" required onchange="this.form.submit()">
                  <option class="dropdown-item" value="es" @if(\App::getLocale()=='es') selected="selected" @endif>@lang('Spanish')</option>
                  <option class="dropdown-item" value="en" @if(\App::getLocale()=='en') selected="selected" @endif>@lang('English')</option>
                </select>
              </form>
            </li>
            <!-- Login / Profile -->
            @guest
              <li class="nav-item mb-2 mb-lg-0">
                <a class="nav-link {{ setActive('login') }}" href="{{ route('login') }}">@lang('Login')</a>
              </li>
            @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{setActive('user.*')}}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('user.show', Auth::user()) }}">@lang('Profile')</a></li>
                  @if (Auth::user()->is_admin)<li><a class="dropdown-item" href="{{ route('user.index') }}">@lang('Users')</a></li>@endif
                  <hr>
                  <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('Logout')</a></li>
                </ul>
              </li>
            @endguest
            <!-- Official Page -->
            <li class="nav-item ms-2 d-block d-xl-none my-2 mb-xl-0">
              <a class="btn text-white official" href="https://warframe.com" target="_blank">@lang('Official Page')</a>
            </li>
          </ul>
        </div>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
</form>