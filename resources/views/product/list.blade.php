@extends('layouts.app', ['activePage' => 'Produkty', 'titlePage' => __('Produkty')])

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
            <i class="material-icons">precision_manufacturing</i>
          </div>
          <h3 class="card-title">Produkty</h3>
        </div>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Nazwa</th>
                <th >Cena</th>
                <th >Ilość</th>
                <th >Magazyn</th>
                <th >Zarządzaj</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productList as $product)
              <tr>
                <th scope="row">{{ $product->id }}</th>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->price }} PLN</td>
                  <td>{{ $product->stock }} szt.</td>
                  <td>
                    <ul class="list-group list-group-flush">
                      @foreach($product->magazine as $magazine)
                      <li class="list-group-item">{{$magazine->name}}</li>
                      @endforeach
                    </ul>
                  </td>
                  <td><a href="{{ URL::to('product/delete/' . $product->id ) }}" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń produkt</a><br>
                    <a href="{{ URL::to('product/edit/' . $product->id ) }}" >Edytuj dodany produkt</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
        <div class="card-footer">
          <a href="{{ URL::to('/product/create' )}}">Dodaj nowy produkt</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
