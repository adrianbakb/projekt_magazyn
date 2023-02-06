<div class="sidebar" data-color="orange" data-background-color="white">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <img style="display: block; margin: 0 auto" src="{{ asset('material') }}/img/logo.png" class="img-rounded">
    <a href="{{ URL::to('home') }}" class="simple-text logo-normal">
      {{ __('Magazyn') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'Strona główna' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">home</i>
            <p>{{ __('Home') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="material-icons">insert_emoticon</i>
          <p>{{ auth()->user()->name }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ URL::to('profile/edit') }}">
                <i class="material-icons">account_circle</i>
                <span class="sidebar-normal">{{ __('Profil') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ URL::to('user.index') }}">
                  <i class="material-icons">settings</i>
                <span class="sidebar-normal"> {{ __('Ustawienia') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ URL::to('users') }}">
                  <i class="material-icons">settings</i>
                <span class="sidebar-normal"> {{ __('Użytkownicy') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'Produkty' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('product') }}">
          <i class="material-icons">pallet</i>
          <p>{{ __('Produkty') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Magazyny' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('magazine') }}">
          <i class="material-icons">shelves</i>
          <p>{{ __('Magazyny') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Kontrahenci' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('client') }}">
          <i class="material-icons">groups</i>
          <p>{{ __('Kontrahenci') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Przyjęcia' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('order') }}">
          <i class="material-icons">bookmark_add</i>
          <p>{{ __('Przyjęcia') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Wydania' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('issue') }}">
          <i class="material-icons">bookmark_remove</i>
          <p>{{ __('Wydania') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Dokumenty' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('documents') }}">
          <i class="material-icons">description</i>
          <p>{{ __('Archiwum PZ/WZ') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Wyloguj' ? ' active' : '' }}">
        <a class="nav-link" href="{{ URL::to('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="material-icons">logout</i>
          <p>{{ __('Wyloguj') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
