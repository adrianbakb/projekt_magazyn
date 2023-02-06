@extends('layouts.app', ['activePage' => 'Kontrahenci', 'titlePage' => __('Kontrahenci')])

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
        <h3 class="card-title">Dodaj kontrahenta</h3>
      </div>
        <a class="nav-link" href="{{ URL::to('client') }}">
          <i class="material-icons">navigate_before</i>Wróć
        </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\ClientController@store') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
              <label for="name">Nazwa kontrahenta</label>
              <input type="text" class="form-control" name="name" />
            </div>
            <div class="form-group">
              <label for="name">Adres kontrahenta</label>
              <input type="text" class="form-control" name="address" />
            </div>
            <div class="form-group">
                <label for="name">Adres e-mail kontrahenta</label>
                <input type="text" class="form-control" name="email" />
            </div>
            <div class="form-group">
              <label for="name">Numer telefonu kontrahenta</label>
              <input type="text" class="form-control" name="phone" />
            </div>
            <div class="form-group">
              <label for="name">NIP kontrahenta</label>
              <input type="text" class="form-control" name="NIP" />
            </div>
            <div class="form-group">
              <label for="name">Numer konta kontrahenta</label>
              <input type="text" class="form-control" name="account" />
            </div>
          <input type="submit" value="Dodaj" class="btn btn-primary"/>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
