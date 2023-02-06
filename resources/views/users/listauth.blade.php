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
              <tr>
                <th scope="row">Dane ukryte przez administatora</th>
                  <td> -----------</td>
                  <td> -----------</td>
                  <td>------------</td>
              </tr>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
