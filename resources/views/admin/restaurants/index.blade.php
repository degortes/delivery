

@extends('layouts.app')

@section('content')

    <div class="dashboard-restaurant-index">
        <div class="dashboard-header-restaurant-index">
            <h1>Dashboard</h1>
        </div>
        <div class="dashboard-body-restaurant-index">
            <div class="dashboard-body-menu-restaurant-index">
                <ul>
                    <li>
                        <a href="{{route('admin.restaurants.create')}}" >Aggiungi Ristorante</a>
                    </li>
                </ul>
            </div>
            <div class="dashboard-body-content-restaurant-index">
                <div class="container-restaurant-index">
                    <div class="title-restaurant-index">
                        <h1>I Tuoi Ristoranti</h1>
                    </div>
                    <div class="restaurants-index">
                        @foreach ($restaurants as $restaurant)
                            <div class="restaurant-card-index">
                                <div class="title-restaurant-card">
                                    <h1>{{ $restaurant->name }}</h1>
                                </div>
                                <div class="cover-card">
                                    @if ($restaurant->cover)
                                        <img src="{{asset('storage/'. $restaurant->cover)}}" alt="{{$restaurant->name}}">
                                    @endif
                                </div>
                                <div class="action-restaurant-card-index">
                                    <div class="flex container-button-action-index-start">
                                        <a href="{{route('admin.restaurants.show' , ['restaurant' => $restaurant->id ] )}}" class="button-index button-dettagli-index">Piatti</a>
                                    </div>
                                    <div class="flex container-button-action-index-center">
                                        <a href="{{route('admin.orders.details' , ['id' => $restaurant->id ] )}}" class="button-index button-ordini-index">Ordini</a>
                                    </div>
                                    <div class="flex container-button-action-index-end">
                                        <a href="{{route('admin.restaurants.edit' , ['restaurant' => $restaurant->id ] )}}" class="button-index button-modifica-index">Modifica</a>
                                    </div>


                                </div>
                                @if (!count($restaurant->dishes) && !count($restaurant->payments))
                                    <div class="action-restaurant-card-index" >

                                        <form action="{{route('admin.restaurants.destroy' , ['restaurant' => $restaurant->id ] )}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div id="restModal"class="modal" @click="closeModalOnWindow()">
                                              <div class="modal-content">
                                                <div class="result">
                                                    <i class="fas fa-times-circle fa-9x"></i>
                                                    <h2 class="mt-3 mb-3">
                                                      Sicuro di voler eliminare il ristorante?
                                                    </h2>
                                                    <a @click="noDelete()" class=" btn-green">Annulla</a>
                                                    <button class="btn-red" type="submit">Elimina</button>
                                                </div>
                                              </div>
                                            </div>

                                            <a @click="restModal()" class="button-elimina-show"><i class="fas fa-trash-alt"></i></a>
                                        </form>
                                    </div>
                                @endif
                                <div class="body-restaurant-card-index">
                                    <div class="details-restaurant-card-index">
                                        <p>Indirizzo: <strong>{{ $restaurant->address }}</strong></p>
                                        <p>Telefono: <strong>{{ $restaurant->phone }}</strong></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
