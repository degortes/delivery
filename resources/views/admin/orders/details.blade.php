@extends('layouts.app')

@section('content')

<div class="container-restaurant-orders-details">
    <div class="title-restaurant-orders-details">
        <h1>Dettagli Ordini</h1>
    </div>
    <div class="container-form-details">
        <h1 class="my-restaurant-name">{{$myrestaurant->name}}</h1>
        <div class="form-details-orders-ciao">
            <div class="link-details-order">
                <a class="link-statistics-details-orders" href="{{route('admin.statistics.chart', ['id'=> $myrestaurant->id ])}}"><i class="fas fa-chart-bar"></i>Vedi Statistiche</a>
            </div>
        </div>
        <div class="container-form-details-orders">
            @foreach ($myrestaurant->payments as $payment)
                <div class="form-details-orders">
                    <ul>
                        <li>
                            <span>Totale : <strong>{{$payment->price}}€</strong></span>
                        </li>
                        <li>
                            <span>Status: <strong>Accettato</strong></span>
                        </li>
                        <li>
                            <span>Data: <strong>{{$payment->created_at}}</strong></span>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
