@extends('layouts.app', ['activePage' => 'Magazyny', 'titlePage' => __('Magazyny')])

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
            <i class="material-icons">shelves</i>
          </div>
          <h3 class="card-title">Magazyny</h3>
        </div>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Kod magazynu</th>
                <th >Nazwa</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($magazineList as $magazine)
              <tr>
                <th scope="row">{{ $magazine->id }}</th>
                  <td>{{ $magazine->code }}</td>
                  <td>{{ $magazine->name }}</td>
              @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
