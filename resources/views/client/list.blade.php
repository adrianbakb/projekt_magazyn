@extends('layouts.app', ['activePage' => 'Kontrahenci', 'titlePage' => __('Kontrahenci')])

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
          <h3 class="card-title">Kontrahenci</h3>
        </div>
        <a class="nav-link" href="{{ URL::to('home') }}">
          <i class="material-icons">navigate_before</i><b>Wróć</b>
        </a>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Nazwa</th>
                <th >Adres</th>
                <th >E-mail</th>
                <th >Telefon</th>
                <th >NIP</th>
                <th >Numer konta</th>
                <th >Dodane przez:</th>
                <th >Zarządzaj</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($clientList as $client)
              <tr>
                <th scope="row">{{ $client->id }}</th>
                  <td>{{ $client->name }}</td>
                  <td>{{ $client->address }}</td>
                  <td>{{ $client->email }}</td>
                  <td>{{ $client->phone }}</td>
                  <td>{{ $client->NIP }}</td>
                  <td>{{ $client->account }}</td>
                  <td>uzytkownik</td>
                  <td><a href="{{ URL::to('client/delete/' . $client->id ) }}" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń kontrahenta</a><br>
                    <a href="{{ URL::to('client/edit/' . $client->id ) }}" >Edytuj dodanego kontrahenta</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
        <div class="card-footer">
          <a href="{{ URL::to('/client/create' )}}">Dodaj nowego kontrahenta</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
