@extends('layouts.app', ['activePage' => 'Magazyny', 'titlePage' => __('Magazyny')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="content">
  @if ($errors->any())                                                            <!--wyświetlanie/obsługa błędów-->
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li> {{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-info text-center">
        <div class="card-icon">
            <i class="material-icons">add_circle_outline</i>
          </div>
        <h3 class="card-title">Dodaj uzytkownika</h3>
      </div>
        <a class="nav-link" href="{{ URL::to('users') }}">
          <i class="material-icons">navigate_before</i>Wróć
        </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\UserManagment@store') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
              <label for="name">Imię i nazwisko</label>
              <input type="text" class="form-control" name="name" />
            </div>
            <div class="form-group">
              <label for="name">Email</label>
              <input type="text" class="form-control" name="email" />
            </div>
            <div class="form-group">
              <label for="name">Hasło</label>
              <input type="password" class="form-control" name="password"/>
            </div>
            <div class="form-group">
              <label for="type">Rola w firmie</label>
              <input type="text" class="form-control" name="type" />
            </div>
          <input type="submit" value="Dodaj" class="btn btn-primary"/>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
