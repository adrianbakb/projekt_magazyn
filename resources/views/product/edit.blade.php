@extends('layouts.app', ['activePage' => 'Produkty', 'titlePage' => __('Produkty')])

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
        <h3 class="card-title">Edycja dodanego produktu</h3>
      </div>
      <a class="nav-link" href="{{ URL::to('product') }}">
        <i class="material-icons">navigate_before</i>Wróć
      </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\ProductController@editStore') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="id" value="{{ $product->id }}" />
          <div class="form-group">
            <label for="name">Kod produktu</label>
            <input type="text" class="form-control" name="code" value="{{ $product->code }}" />
          </div>
          <div class="form-group">
            <label for="name">Nazwa produktu</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}" />
          </div>
          <div class="form-group">
            <label for="price">Cena za sztukę</label>
            <input type="text" class="form-control" name="price" value="{{ $product->price }}" />
          </div>
          <div class="form-group">
            <label for="stock">Ilość w sztukach</label>
            <input type="text" class="form-control" name="stock" value="{{ $product->stock }}" />
          </div>
          <div class="form-group">
            <label for="magazine">Magazyn: </label><br>
              @foreach($magazine as $magazine)
                @if($product->magazine->contains($magazine->id))
                  <input type="checkbox" class="form-check form-check-inline" name="magazine[]" value="{{ $magazine->id }}" checked/>{{ $magazine->name }}<br>
                @else
                  <input type="checkbox" class="form-check form-check-inline" name="magazine[]" value="{{ $magazine->id }}" />{{ $magazine->name }}
                @endif
              @endforeach
          </div>
          <input type="submit" value="Edytuj" class="btn btn-primary" onclick="return confirm('Czy na pewno chcesz zapisać zmiany?')"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
