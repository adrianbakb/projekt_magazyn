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
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">pallet</i>
              </div>
              <p class="card-category">Nasze produkty</p>
              <a  class="nav-link" href="{{ URL::to('product') }}" ><h3 class="card-title">Produkty</h3></a>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">help_outline</i>
                <a>Products</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">shelves</i>
              </div>
              <p class="card-category">Nasze magazyny</p>
              <a  class="nav-link" href="{{ URL::to('magazine') }}" ><h3 class="card-title">Magazyny</h3></a>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Warehouses
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
              <p class="card-category">Nasi kontrahenci</p>
              <a  class="nav-link" href="{{ URL::to('client') }}" ><h3 class="card-title">Kontrahenci</h3></a>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Contractors
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">bookmark_add</i>
              </div>
              <p class="card-category">Przyjęcia zewnętrzne</p>
              <a  class="nav-link" href="{{ URL::to('client') }}" ><h3 class="card-title">Przyjęcia towaru</h3></a>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> PZ
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">bookmark_remove</i>
              </div>
              <p class="card-category">Wydania zewnętrzne</p>
              <a  class="nav-link" href="{{ URL::to('issue') }}" ><h3 class="card-title">Wydania towaru</h3></a>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> WZ
              </div>
            </div>
          </div>
       </div>
       <div class="col-lg-3 col-md-6 col-sm-6">
         <div class="card card-stats">
           <div class="card-header card-header-success card-header-icon">
             <div class="card-icon">
               <i class="material-icons">description</i>
             </div>
             <p class="card-category">Dokumenty</p>
             <a  class="nav-link" href="{{ URL::to('documents') }}" ><h3 class="card-title">Archiwum PZ/WZ</h3></a>
           </div>
           <div class="card-footer">
             <div class="stats">
               <i class="material-icons">date_range</i> All history
             </div>
           </div>
         </div>
       </div>
     </div>
    </div>
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
