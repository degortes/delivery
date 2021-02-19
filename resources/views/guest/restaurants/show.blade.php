@extends('layouts.app-guest')
@section('content')

        <main>
            <div class="container-restaurant">
                <div class="content-restaurant">

                    <div class="title-restaurant">
                        <h1>
                          {{$restaurant->name}}
                        </h1>
                    </div>
                    <div class="details-restaurant">
                        <h4>Info ristorante:</h4>
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            Indirizzo: <br>{{$restaurant->address}}
                        </p>
                        <p>
                            <i class="fas fa-phone-alt"></i>
                            Telefono: <br>{{$restaurant->phone}}
                        </p>
                    </div>

                    <div class="container-list-dishes">
                            <div v-for="product in dishesRestaurant" :key="product.id" class="card-dish">
                                <h3 class="product__header">@{{ product.name }}</h3>
                                <img src="product.cover" :alt="product.name" class="product__image">
                                <p class="product__description">@{{ product.description }}</p>

                                <div class="cart">
                                    <button @click="updateCart(product, 'subtract'), cartBtnLessPlus()" class="cart__button">-</button>
                                    <span class="cart__quantity">@{{ product.quantity }}</span>
                                    <button @click="updateCart(product, 'add'), cartBtnLessPlus()" class="cart__button">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
@endsection
