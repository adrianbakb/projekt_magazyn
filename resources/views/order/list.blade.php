@extends('layouts.app', ['activePage' => 'Przyjęcia', 'titlePage' => __('Przyjęcia')])

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
            <i class="material-icons">bookmark_add</i>
          </div>
          <h3 class="card-title">Przyjęcia zewnętrzne</h3>
        </div>
        <a class="nav-link" href="{{ URL::to('home') }}">
          <i class="material-icons">navigate_before</i><b>Wróć</b>
        </a>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Numer PZ</th>
                <th >Nazwa kontrahenta</th>
                <th >Nazwa produktu</th>
                <th >Ilość przyjętego towaru</th>
                <th >Data przyjęcia towaru</th>
                <th >Przyjęte przez:</th>
                <th >Dokument PZ </th>
                <th >Zarządzaj</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orderList as $order)
              <tr>
                <th scope="row">{{ $order->id }}</th>
                  <td><b> {{ $order->ordernumber }}</b></td>
                    <td>
                      <ul class="list-group list-group-flush">
                        @foreach($order->client as $client)
                        <li class="list-group-item">{{$client->name}}</li>
                        @endforeach
                      </ul>
                    </td>
                    <td>
                      <ul class="list-group list-group-flush">
                        @foreach($order->product as $product)
                        <li class="list-group-item">{{$product->name}} (aktualny stan: {{$product->stock}} szt.)</li>
                        @endforeach
                      </ul>
                    </td>
                  <td>{{ $order->number }} szt.</td>
                  <td>{{ $order->orderdate }}</td>
                  <td>uzytkownik</td>
                  <td><a href="{{ URL::to('order/' . $order->id ) }}" >Dokument PZ</a></td>
                  <td><a href="{{ URL::to('order/delete/' . $order->id ) }}" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</a><br>
                    <a href="{{ URL::to('order/edit/' . $order->id ) }}" >Edytuj dodane przyjęcie</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
        <div class="card-footer">
          <a href="{{ URL::to('/order/create' )}}">Dodaj nowe przyjęcie</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
