@extends('layouts.app', ['activePage' => 'Produkty','titlePage' => __('Produkty')])

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
          <i class="material-icons">precision_manufacturing</i>
        </div>
        <h4 class="card-title">{{ $product->name }}</h4>
      </div>
        <a class="nav-link" href="{{ URL::to('products') }}">
          <i class="material-icons">navigate_before</i>Wróć
        </a>
      <div class="card-body table-responsive">
        <table class="table">
          <tr>
            <td>Nazwa produktu:</td>
            <td>{{ $product->name}}</td>
          </tr>
          <tr>
            <td>Cena produktu:</td>
            <td>{{ $product->price}}</td>
          </tr>
          <tr>
            <td>Ilość w magazynie:</td>
            <td>{{ $product->stock}}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection('content')
