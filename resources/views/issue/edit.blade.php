@extends('layouts.app', ['activePage' => 'Wydania', 'titlePage' => __('Wydania')])

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
        <h3 class="card-title">Edycja dodanego wydania</h3>
      </div>
      <a class="nav-link" href="{{ URL::to('issue') }}">
        <i class="material-icons">navigate_before</i>Wróć
      </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\IssueController@editStore') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="id" value="{{ $issue->id }}" />
          <div class="form-group">
            <label for="name">Numer WZ</label>
            <input type="text" class="form-control" name="issuenumber" value="{{ $issue->issuenumber }}" />
          </div>
          <div class="form-group">
            <label for="product">Kontrahent</label>
              <br>
              @foreach($client as $client)
                @if($issue->client->contains($client->id))
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
                @if($issue->product->contains($product->id))
                <input type="checkbox" class="form-check form-check-inline" name="product[]" value="{{ $product->id }}" checked />{{ $product->name }} (na stanie:{{ $product->stock}} szt.)<br>
                @else
                <input type="checkbox" class="form-check form-check-inline" name="product[]" value="{{ $product->id }}" />{{ $product->name }} (na stanie:{{ $product->stock}} szt.)
                <br>
                @endif
              @endforeach
          <div class="form-group">
            <label for="name">Ilość</label>
            <input type="text" class="form-control" name="number" value="{{ $issue->number }}" />
          </div>
          <div class="form-group">
            <label for="name">Data wydania towaru</label>
            <input type="date" class="form-control" name="issuedate"  value="{{ $issue->issuedate }}"/>
          </div>
          <input type="submit" value="Edytuj" class="btn btn-primary" onclick="return confirm('Czy na pewno chcesz zapisać zmiany?')"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
