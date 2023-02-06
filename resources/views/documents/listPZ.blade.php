@extends('layouts.app', ['activePage' => 'Dokumenty', 'titlePage' => __('Archiwum')])

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
          <h3 class="card-title">Archiwum PZ</h3>
        </div>
        <a class="nav-link" href="{{ URL::to('documents') }}">
          <i class="material-icons">navigate_before</i>Wróć
        </a>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >Dokumenty PZ</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orderList as $order)
              <tr>
                  <td><a href="{{ URL::to('order/' . $order->id ) }}">{{ $order->ordernumber }}</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
