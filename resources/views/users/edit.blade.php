@extends('layouts.app', ['activePage' => 'Magazyny', 'titlePage' => __('Magazyny')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-info">
        <div class="card-icon">
          <i class="material-icons">edit</i>
        </div>
        <h3 class="card-title">Edycja użytkownika</h3>
      </div>
      <a class="nav-link" href="{{ URL::to('users') }}">
        <i class="material-icons">navigate_before</i>Wróć
      </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\UserManagment@editStore') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="id" value="{{ $user->id }}" />
          <div class="form-group">
            <label for="name">Imię i nazwisko</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
          </div>
          <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
          </div>
          <div class="form-group">
            <label for="name">Hasło</label>
            <input type="password" class="form-control" name="password" value="{{ $user->password }}" />
          </div>
          <div class="form-group">
            <label for="name">Rola w firmie</label>
            <input type="text" class="form-control" name="type" value="{{ $user->type }}" />
          </div>
          <input type="submit" value="Edytuj" class="btn btn-primary" onclick="return confirm('Czy na pewno chcesz zapisać zmiany?')"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
