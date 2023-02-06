@extends('layouts.app', ['activePage' => 'Produkty', 'titlePage' => __('Produkty')])

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
        <h3 class="card-title">Dodaj produkt</h3>
      </div>
        <a class="nav-link" href="{{ URL::to('product') }}">
          <i class="material-icons">navigate_before</i>Wróć
        </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\ProductController@store') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
              <label for="name">Kod produktu</label>
              <input type="text" class="form-control" name="code" />
            </div>
            <div class="form-group">
              <label for="name">Nazwa produktu</label>
              <input type="text" class="form-control" name="name" />
            </div>
            <div class="form-group">
              <label for="price">Cena za sztukę</label>
              <input type="text" class="form-control" name="price" />
            </div>
            <div class="form-group">
              <label for="stock">Ilość w sztukach</label>
              <input type="text" class="form-control" name="stock" />
            </div>
            <div class="form-group">
              <label for="magazine">Magazyn</label>
              <br>
                @foreach($magazine as $magazine)
                  <input type="checkbox" class="form-check form-check-inline" name="magazine[]" value="{{ $magazine->id }}" />{{ $magazine->name }}
                  <br>
                @endforeach
            </div>
          <input type="submit" value="Dodaj" class="btn btn-primary"/>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
