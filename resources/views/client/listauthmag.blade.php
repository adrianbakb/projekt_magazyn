@extends('layouts.app', ['activePage' => 'Kontrahenci', 'titlePage' => __('Kontrahenci')])

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
            <i class="material-icons">group</i>
          </div>
          <h3 class="card-title">Kontrahenci</h3>
        </div>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Nazwa</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($clientList as $client)
              <tr>
                <th scope="row">{{ $client->id }}</th>
                  <td>{{ $client->name }}</td>
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
