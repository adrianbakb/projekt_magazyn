@extends('layouts.app', ['activePage' => 'Wydania', 'titlePage' => __('Wydania')])

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
            <i class="material-icons">bookmark_remove</i>
          </div>
          <h3 class="card-title">Wydania zewnętrzne</h3>
        </div>
        <a class="nav-link" href="{{ URL::to('home') }}">
          <i class="material-icons">navigate_before</i><b>Wróć</b>
        </a>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Numer WZ</th>
                <th >Nazwa kontrahenta</th>
                <th >Nazwa produktu</th>
                <th >Ilość wydanego towaru</th>
                <th >Data wydania towaru</th>
                <th >Wydane przez:</th>
                <th >Raport</th>
                <th >Zarządzaj</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($issueList as $issue)
              <tr>
                <th scope="row">{{ $issue->id }}</th>
                  <td><b>{{ $issue->issuenumber }}</b></td>
                    <td>
                      <ul class="list-group list-group-flush">
                        @foreach($issue->client as $client)
                        <li class="list-group-item">{{$client->name}}</li>
                        @endforeach
                      </ul>
                    </td>
                    <td>
                      <ul class="list-group list-group-flush">
                        @foreach($issue->product as $product)
                        <li class="list-group-item">{{$product->name}} (aktualny stan: {{$product->stock}} szt.)</li>
                        @endforeach
                      </ul>
                    </td>
                  <td>{{ $issue->number }} szt.</td>
                  <td>{{ $issue->issuedate }}</td>
                  <td>uzytkownik</td>
                  <td><a href="{{ URL::to('issue/' . $issue->id ) }}" >Dokument WZ</a></td>
                  <td><a href="{{ URL::to('issueissue/delete/' . $issue->id ) }}" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</a><br>
                    <a href="{{ URL::to('issue/edit/' . $issue->id ) }}" >Edytuj dodane wydanie</a>
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
        <div class="card-footer">
          <a href="{{ URL::to('/issue/create' )}}">Dodaj nowe wydanie</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
