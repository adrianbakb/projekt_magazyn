@extends('layouts.app', ['activePage' => 'Przyjęcia', 'titlePage' => __('Przyjęcia')])

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
        <h3 class="card-title">Edycja dodanego przyjęcia</h3>
      </div>
      <a class="nav-link" href="{{ URL::to('order') }}">
        <i class="material-icons">navigate_before</i>Wróć
      </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\OrderController@editStore') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="id" value="{{ $order->id }}" />
          <div class="form-group">
            <label for="ordernumber">Numer PZ</label>
            <input type="text" class="form-control" name="ordernumber" value="{{ $order->ordernumber }}" />
          </div>
          <div class="form-group">
            <label for="client">Kontrahent</label>
              <br>
              @foreach($client as $client)
                @if($order->client->contains($client->id))
                <input type="checkbox" class="form-check form-check-inline" name="client[]" value="{{ $client->id }}" checked />{{ $client->name }}<br>
                @else
                <input type="checkbox" class="form-check form-check-inline" name="client[]" value="{{ $client->id }}" />{{ $client->name }}
                <br>
                @endif
              @endforeach
          </div>
          <div class="form-group">
            <label for="product">Produkt</label>
              <br>
              @foreach($product as $product)
                @if($order->product->contains($product->id))
                <input type="checkbox" class="form-check form-check-inline" name="product[]" value="{{ $product->id }}" checked />{{ $product->name }} (na stanie:{{ $product->stock}} szt.)<br>
                @else
                <input type="checkbox" class="form-check form-check-inline" name="product[]" value="{{ $product->id }}" />{{ $product->name }} (na stanie:{{ $product->stock}} szt.)
                <br>
                @endif
              @endforeach
          <div class="form-group">
            <label for="number">Ilość</label>
            <input type="text" class="form-control" name="number" value="{{ $order->number }}" />
          </div>
          <div class="form-group">
            <label for="orderdate">Data przyjęcia towaru</label>
            <input type="date" class="form-control" name="orderdate"  value="{{ $order->issuedate }}"/>
          </div>
          <input type="submit" value="Edytuj" class="btn btn-primary" onclick="return confirm('Czy na pewno chcesz zapisać zmiany?')"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
