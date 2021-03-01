
@extends('layouts.app')

@section('chart-css')
  <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

@endsection

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div>
          <h2 class="mt-5 mb-3">Filtra per mese</h2>
          @foreach ($months as $key => $month)
            <a href="{{route('admin.statistics.month', ['id' => $id , 'month' => $key+1 ])}}" class="btn btn-outline-dark" >{{$month}}</a>

          @endforeach
        </div>
        <canvas id="ordersChart" class="mt-5"></canvas>
        <div class="mt-2">
            <h1>Totale ordini &euro; {{$sum}}</h1>
            <h3>Numero ordini  {{$num}}</h3>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('script')
  <!-- javascript -->

   <script>


      window.cData = JSON.parse(`@php
        echo $chart_data;
      @endphp `);



    </script>
 @endsection
