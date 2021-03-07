@extends('layouts.app')

@section('content')

<div class="dashboard-restaurant-show">
    <div class="dashboard-header-restaurant-show">
        <a href="{{route('admin.home')}}">
            <h1>Dashboard</h1>
        </a>
    </div>
    <div class="dashboard-body-restaurant-show">
        <div class="dashboard-body-menu-restaurant-show">
            <ul>
                <li>
                    <a href="{{route('admin.restaurants.index')}}" >I Tuoi Ristoranti</a>
                </li>
                <li>
                    <a href="{{route('admin.restaurants.create')}}" >Aggiungi Ristorante</a>
                </li>
            </ul>
        </div>
        <div class="dashboard-body-content-restaurant-show">
            <div class="container-restaurant-show">
                <h1 class="title-show">
                    Dettagli ristorante
                </h1>
                <div class="container-title-restaurant-show">
                    <div class="title-restaurant-show">
                        <h3>
                            Nome: <strong>{{$restaurant->name}}</strong>
                        </h3>
                        <h3>
                            Indirizzo: <strong>{{$restaurant->address}}</strong>
                        </h3>
                        <h3>
                            Telefono: <strong>{{$restaurant->phone}}</strong>
                        </h3>
                        <div class="button-create-order">
                            <a href="{{ route('admin.dishes.create', ['rest'=> $restaurant->id]) }}" class="show button-create-new-show">
                                Crea nuovo piatto
                            </a>
                            <a href="{{ route('admin.orders.details', ['id'=> $restaurant->id]) }}" class="show button-order-new-show">
                                Ordini
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="your-dishes">
                <h3>
                    I tuoi piatti
                </h3>
            </div>
            <div class="container-card-restaurant-show">
                <div class="restaurants-show">
                    @foreach ($restaurant->dishes as $dish)
                        <div class="restaurant-card-show">
                            @if (!$dish->visibility)
                                <form action="{{ route('admin.dishes.update', ['dish' => $dish->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input hidden name="course_id" value="{{$dish->course_id}}" >
                                        <input hidden name="name" value="{{$dish->name}}" >
                                        <input hidden name="ingredients" value="{{$dish->ingredients}}" >
                                        <input hidden name="price" value="{{$dish->price}}" >
                                        <input hidden name="visibility" value="1" >
                                        <div class="button-edit-plate">
                                            <button type="submit" >
                                                imposta a visibile
                                            </button>
                                        </div>
                                </form>

                            @endif
                            <div class="{{$dish->visibility ? 'body-restaurant-card-show' :'body-restaurant-card-show dishnotavailable'}} ">
                                @if ($dish->cover)
                                    <img src="{{asset('storage/'. $dish->cover)}}" alt="">
                                @endif
                                <h3>
                                    {{$dish->name}}
                                </h3>
                            </div>
                            <div class="details-restaurant-card-show">
                                <div class="container-button-action-show">
                                    <a class="button-show button-dettagli-show" href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="button-show button-modifica-show" href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{route('admin.dishes.destroy' , ['dish' => $dish->id ] )}}" method="post">
                                        <div id="restModal"class="modal" @click="closeModalOnWindow()">
                                          <div class="modal-content">
                                            <div class="result">
                                                <i class="fas fa-times-circle fa-9x"></i>
                                                <h2 class="mt-3 mb-3">
                                                  Sicuro di voler eliminare il piatto??
                                                </h2>
                                                <br><a @click="noDelete()" class="button-show button-modifica-show">Annulla</a>
                                                <button class="button-elimina-show" type="submit">Elimina</button>
                                            </div>
                                          </div>
                                        </div>

                                    <a @click="restModal()" class="button-show button-elimina-show"><i class="fas fa-trash-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    </form>
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
