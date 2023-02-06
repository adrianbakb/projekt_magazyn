@extends('layouts.app', ['activePage' => 'Przyjęcia','titlePage' => __('Przyjęcia')])

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
          <i class="material-icons">description</i>
        </div>
        <h4 class="card-title">{{ $order->ordernumber }}</h4>
      </div>
        <a class="nav-link" href="{{ URL::to('order') }}">
          <i class="material-icons">navigate_before</i>Wróć do przyjęć
        </a>
        <a class="nav-link" href="{{ URL::to('documents/listPZ') }}">
          <i class="material-icons">navigate_next</i>Wejdź do archiwum
        </a>
        <div class="card card-frame">
          <div class="card-body">
            <h6 class="display-4"><precode class="offset-4">Przyjęcie zewnętrzne</precode></h6>
            <precode class="offset-5">{{$order->ordernumber}}</precode>
          </div>
          <div class="card-body">
            <precode class="offset-1">Data wystawienia: {{$order->orderdate}}</precode>
          </div>
          <div class="card-body">
            <h3><precode class="offset-1">Sprzedawca</precode></h3>
            <precode class="offset-1">
                @foreach($order->client as $client)
                {{$client->name}}
                @endforeach
            </precode><br>
            <precode class="offset-1">
              @foreach($order->client as $client)
              {{$client->address}}
              @endforeach
            </precode><br>
            <precode class="offset-1">
              @foreach($order->client as $client)
              NIP: {{$client->NIP}}
              @endforeach
            </precode><br>
          </div>
          <div class="card-body">
            <h3><precode class="offset-9">Odbiorca</precode></h3>
            <precode class="offset-9">Magazyn Sp. z o.o.</precode><br>
            <precode class="offset-9">Magazynierska 88, 66-889 Magazynowo</precode><br>
            <precode class="offset-9">NIP: 5487568216</precode>
          </div>
          <br><br>
          <div class="card-body table-responsive text-center">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th >Lp.</th>
                  <th >Nazwa produktu</th>
                  <th >Cena jednostkowa (PLN)</th>
                  <th >Ilość</th>
                  <th >Jm</th>
                  <th >Koszt całkowity(PLN)</th>
                  <th >Uwagi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td><b>1.</b></td>
                    <td>
                      <b>
                        @foreach($order->product as $product)
                        {{$product->name}} (kod towaru: {{$product->code}})
                        @endforeach
                      </b>
                    </td>
                    <td>
                      <b>
                        @foreach($order->product as $product)
                        {{$product->price}}.00
                        @endforeach
                      </b>
                    </td>
                    <td><b>{{$order->number}}.00</td>
                    <td><b>szt.</b></td>
                    <td>
                      <b>
                        @foreach($order->product as $product)
                        <?php
                        $ilosc = $order->number;
                        $cena = $product->price;
                        $iresult = $ilosc*$cena;
                        echo $iresult;
                        ?>
                        .00
                        @endforeach
                      </b>
                    </td>
                    <td></td>
                </tr>
            </tbody>
          </table>
          </div>
          <br><br>
          <div class="card-body">
            <precode class="offset-1">Sposób zapłaty: przelew</precode><br>
            <precode class="offset-1">Termin zapłaty: 21 dni</precode><br>
            <precode class="offset-1">Dostawa: <b>transport własny</b></precode>
          </div>
          <div class="card-body">
            <precode class="offset-1">Podpis osoby upoważnionej do odbioru: ........................
              <precode class="offset-4">Podpis osoby upoważnionej do wystawienia: ........................</precode>
            </precode>
          </div>
        </div>
        <a class="nav-link" href="{{ URL::to('pdf') }}">
          <i class="material-icons">print</i><b>Drukuj</b>
        </a>
    </div>
  </div>
</div>


@endsection('content')
