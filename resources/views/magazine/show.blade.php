@extends('layouts.app', ['activePage' => 'Magazyny','titlePage' => __('Magazyny')])

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
        <h4 class="card-title">{{ $magazine->name }}</h4>
      </div>
        <a class="nav-link" href="{{ URL::to('magazine') }}">
          <i class="material-icons">navigate_before</i>Wróć
        </a>
      <div class="card-body table-responsive">
        <table class="table">
          <tr>
            <td>Name:</td>
            <td>{{ $magazine->name}}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection('content')
