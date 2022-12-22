@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'Home', 'title' => __('Strona powitalna')])

@section('title')
@if (isset($title)){{$title }}
@endif
@endsection('title')

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('Witamy w systemie obsługi magazynu! Zaloguj się!') }}</h1>
      </div>
  </div>
</div>
@endsection
