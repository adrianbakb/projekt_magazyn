@extends('layouts.app', ['activePage' => 'Magazyny', 'titlePage' => __('Magazyny')])

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
        <h3 class="card-title">Edycja dodanego magazynu</h3>
      </div>
      <a class="nav-link" href="{{ URL::to('magazine') }}">
        <i class="material-icons">arrow_back_ios</i>Wróć
      </a>
      <div class="card-body table-responsive">
        <form action="{{ action('App\Http\Controllers\MagazineController@editStore') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="id" value="{{ $magazine->id }}" />
          <div class="form-group">
            <label for="name">Nazwa magazynu</label>
            <input type="text" class="form-control" name="name" value="{{ $magazine->name }}" />
          </div>
          <input type="submit" value="Edytuj" class="btn btn-primary"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')
