@extends('layouts.app', ['activePage' => 'Kontrahenci', 'titlePage' => __('Kontrahenci')])

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
        <h3 class="card-title">Edycja dodanego kontrahenta</h3>
      </div>
      <a class="nav-link" href="{{ URL::to('client') }}">
        <i class="material-icons">navigate_before</i>Wróć
      </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\ClientController@editStore') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="id" value="{{ $client->id }}" />
          <div class="form-group">
            <label for="name">Nazwa kontrahenta</label>
            <input type="text" class="form-control" name="name" value="{{ $client->name }}" />
          </div>
          <div class="form-group">
            <label for="name">Adres kontrahenta</label>
            <input type="text" class="form-control" name="address" value="{{ $client->address }}" />
          </div>
          <div class="form-group">
            <label for="name">Adres e-mail kontrahenta</label>
            <input type="text" class="form-control" name="email" value="{{ $client->email }}" />
          </div>
          <div class="form-group">
            <label for="name">Numer telefonu kontrahenta</label>
            <input type="text" class="form-control" name="phone" value="{{ $client->phone }}" />
          </div>
          <div class="form-group">
            <label for="name">NIP kontrahenta</label>
            <input type="text" class="form-control" name="NIP" value="{{ $client->NIP }}" />
          </div>
          <div class="form-group">
            <label for="name">Numer konta kontrahenta</label>
            <input type="text" class="form-control" name="account" value="{{ $client->account }}" />
          </div>
          <input type="submit" value="Edytuj" class="btn btn-primary" onclick="return confirm('Czy na pewno chcesz zapisać zmiany?')"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
