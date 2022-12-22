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
            <i class="material-icons">precision_manufacturing</i>
          </div>
          <h3 class="card-title">Magazyny</h3>
        </div>
        <div class="card-body table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th >#</th>
                <th >Nazwa</th>
                <th >Zarządzaj</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($magazineList as $magazine)
              <tr>
                <th scope="row">{{ $magazine->id }}</th>                
                  <td><a href="{{ URL::to('magazine/' .$magazine->id)}}"> {{ $magazine->name }}</td>
                  <td><a href="{{ URL::to('magazine/delete/' . $magazine->id ) }}" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń magazyn</a><br>
                    <a href="{{ URL::to('magazine/edit/' . $magazine->id ) }}" >Edytuj dodany magazyn</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
        </div>
        <div class="card-footer">
          <a href="{{ URL::to('/magazine/create' )}}">Dodaj nowy magazyn</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
