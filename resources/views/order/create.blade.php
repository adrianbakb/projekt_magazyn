@extends('layouts.app', ['activePage' => 'Przyjęcia', 'titlePage' => __('Przyjęcia')])

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
        <h3 class="card-title">Przyjęcie produktu/towaru</h3>
      </div>
        <a class="nav-link" href="{{ URL::to('order') }}">
          <i class="material-icons">navigate_before</i>Wróć
        </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\OrderController@store') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <div class="form-group">
            <label for="ordernumber">Numer PZ</label>
            <input type="text" class="form-control" name="ordernumber" value="PZ/"/>
          </div>
            <div class="form-group">
              <label for="client">Kontrahent</label>
                <br>
                @foreach($client as $client)
                  <input type="checkbox" class="form-check form-check-inline" name="client[]" value="{{ $client->id }}" />{{ $client->name }}
                  <br>
                @endforeach
            </div>
            <div class="form-group">
              <label for="product">Produkt</label>
                <br>
                @foreach($product as $product)
                  <input type="checkbox" class="form-check form-check-inline" name="product[]" value="{{ $product->id }}" />{{ $product->name }} (na stanie:{{ $product->stock}} szt.)
                  <br>
                @endforeach
            </div>
            <div class="form-group">
              <label for="number">Ilość towaru (szt.)</label>
              <input type="decimal" class="form-control" name="number" />
            </div>
            <div class="form-group">
              <label for="orderdate">Data przyjęcia towaru</label>
              <input type="date" class="form-control" name="orderdate" />
            </div>
          <input type="submit" value="Dodaj" class="btn btn-primary"/>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
