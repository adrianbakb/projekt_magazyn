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
            <i class="material-icons">pallet</i>
          </div>
          <h3 class="card-title">Produkty</h3>
        </div>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Kod produktu</th>
                <th >Nazwa</th>
                <th >Cena</th>
                <th >Ilość</th>
                <th >Magazyn</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productList as $product)
              <tr>
                <th scope="row">{{ $product->id }}</th>
                  <td>{{ $product->code }}</td>
                  <td>{{ $product->name }}</a> </td>
                  <td>{{ $product->price }} PLN</td>
                  <td>{{ $product->stock }} szt.</td>
                  <td>
                    <ul class="list-group list-group-flush">
                      @foreach($product->magazine as $magazine)
                      <li class="list-group-item">{{$magazine->name}} (kod magazynu: {{$magazine->code}})</li>
                      @endforeach
                    </ul>
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
