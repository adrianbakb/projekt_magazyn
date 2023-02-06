@extends('layouts.app', ['activePage' => 'Użytkownicy', 'titlePage' => __('Użytkownicy')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card card-stats">
        <div class="card-header card-header-info text-center">
          <div class="card-icon">
            <i class="material-icons">group</i>
          </div>
          <h3 class="card-title">Użytkownicy</h3>
        </div>
        <a class="nav-link" href="{{ URL::to('home') }}">
          <i class="material-icons">navigate_before</i><b>Wróć</b>
        </a>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Imię i nazwisko</th>
                <th >Rola w firmie</th>
                <th >Zarządzaj</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($userList as $user)
              <tr>
                <th scope="row">{{ $user->id }}</th>
                  <td> {{ $user->name }}</td>
                  <td> {{ $user->type }}</td>
                  <td><a href="{{ URL::to('users/delete/' . $user->id ) }}" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń użytkownika</a><br>
                    <a href="{{ URL::to('users/edit/' . $user->id ) }}" >Edytuj użytkownika</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
        <div class="card-footer">
          <a href="{{ URL::to('/users/create' )}}">Dodaj nowego użytkownika</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
