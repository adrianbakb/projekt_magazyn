@extends('layouts.app', ['activePage' => 'Wydania','titlePage' => __('Wydania')])

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
        <h4 class="card-title">{{ $issue->issuenumber }}</h4>
      </div>
        <a class="nav-link" href="{{ URL::to('issue') }}">
          <i class="material-icons">navigate_before</i>Wróć
        </a>
        <a class="nav-link" href="{{ URL::to('documents/listWZ') }}">
          <i class="material-icons">navigate_next</i>Wejdź do archiwum
        </a>
        <div class="card card-frame">
          <div class="card-body">
            <h6 class="display-4"><precode class="offset-4">Wydanie zewnętrzne</precode></h6>
            <precode class="offset-5">{{$issue->issuenumber}}</precode>
          </div>
          <div class="card-body">
            <precode class="offset-1">Data wystawienia: {{$issue->issuedate}}</precode>
          </div>
          <div class="card-body">
            <h3><precode class="offset-1">Sprzedawca</precode></h3>
            <precode class="offset-1">Magazyn Sp. z o.o.</precode><br>
            <precode class="offset-1">Magazynierska 88, 66-889 Magazynowo</precode><br>
            <precode class="offset-1">NIP: 5487568216</precode>
          </div>
          <div class="card-body">
            <h3><precode class="offset-9">Odbiorca</precode></h3>
            <precode class="offset-9">
                @foreach($issue->client as $client)
                {{$client->name}}
                @endforeach
            </precode><br>
            <precode class="offset-9">
              @foreach($issue->client as $client)
              {{$client->address}}
              @endforeach
            </precode><br>
            <precode class="offset-9">
              @foreach($issue->client as $client)
              NIP: {{$client->NIP}}
              @endforeach
            </precode><br>
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
                        @foreach($issue->product as $product)
                        {{$product->name}}(kod towaru: {{$product->code}})
                        @endforeach
                      </b>
                    </td>
                    <td>
                      <b>
                        @foreach($issue->product as $product)
                        {{$product->price}}.00
                        @endforeach
                      </b>
                    </td>
                    <td><b>{{$issue->number}}.00</td>
                    <td><b>szt.</b></td>
                    <td>
                      <b>
                        @foreach($issue->product as $product)
                        <?php
                        $ilosc = $issue->number;
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
        <a class="nav-link" href="{{ URL::to('home') }}">
          <i class="material-icons">print</i><b>Drukuj</b>
        </a>
    </div>
  </div>
</div>


@endsection('content')
