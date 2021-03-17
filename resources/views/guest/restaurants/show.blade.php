@extends('layouts.app-guest')
@section('content')
<main>
    <div class="container-restaurant">
        <div class="content-restaurant" id="dishsearch">
            <h1>
              {{$restaurant->name}}
            </h1>
            <div class="details-restaurant">
                <p>
                    <i class="fas fa-map-marker-alt"></i>
                    Indirizzo: <span>{{$restaurant->address}}</span>
                </p>
                <p>
                    <i class="fas fa-phone-alt"></i>
                    Telefono: <span>{{$restaurant->phone}}</span>
                </p>
            </div>
        </div>
        <div class="flex">
            <button class="btn-green" @click="sortByPrice()" >Ordina per prezzo</button>
            <button class="btn-green" @click="sortByCourse()" >Ordina per portata</button>
            <button class="btn-green" @click="sortByVis()" >Ordina per disponibilità</button>

        </div>

        <div class="container-dish">
            <div class="container-list-dishes">
                <div v-for="product in dishesList" :key="product.id" class="card-dish">
                    <h3 class="product__header">@{{ product.name }}</h3>
                    <div class="wp-img-card-dish" :class="!product.visibility? 'dishnotavailable' : null">
                        <img v-if="product.cover == null" src="{{url('/images/image-non-disp.png')}}" alt="">
                        <img v-else :src="'{{url ('/storage')}}' + '/' + product.cover" :alt="product.name" class="product__image">
                    </div>
                    <div class="not-available" v-if="!product.visibility">
                        <h3>Attualmente non disponibile</h3>
                    </div>
                    <p class="">Prezzo: @{{ product.price }} €</p>
                    <p class="ingredients">Ingredienti: @{{ product.ingredients }}</p>
                    <h6> @{{ product.c_name  }}</h6>
                    <div class="cart" v-if="product.visibility">
                        <button @click="updateCart(product, 'subtract'), cartBtnLessPlus()" class="cart__button">-</button>
                        <span v-if="totalPrice != 0" class="cart__quantity">@{{ product.quantity }}</span>
                        <span v-else class="cart__quantity">0</span>
                        <button @click="updateCart(product, 'add'), cartBtnLessPlus()" class="cart__button">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
