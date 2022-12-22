@extends('layouts.app', ['activePage' => 'Strona główna', 'titlePage' => __('Strona główna')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">looks_one</i>
              </div>
              <p class="card-category">Dostępność</p>
              <a  class="nav-link" href="{{ URL::to('product') }}" ><h3 class="card-title">Produkty</h3></a>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">help_outline</i>
                <a>Zarządzaj</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">groups</i>
              </div>
              <p class="card-category">Nasze magazyny</p>
              <a  class="nav-link" href="{{ URL::to('magazine') }}" ><h3 class="card-title">Magazyny</h3></a>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
              </div>
            </div>
          </div>
        </div>
       </div>
      </div>
          <i class="material-icons text-danger">send</i>
          <a href="{{ URL::to('message') }}">Wyślij zapytanie...</a>
   </div>

@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
