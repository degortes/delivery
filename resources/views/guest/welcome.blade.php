@extends('layouts.app-guest')

@section('content')

  <section class="how-to-order">
    <h1 id="first">
      Come ordinare:
    </h1>
    <div class="steps" >
      <div class="step">
        <img src="{{url('/images/menu.png')}}" alt="">
        <h5 id="second">
          1. Scegli il ristorante
        </h5>
      </div>
      <div class="step" >
        <img src="{{url('/images/order-food.png')}}" alt="">
        <h5 id="third">
          2. Seleziona i tuoi piatti preferiti
        </h5>
      </div>
      <div class="step">
        <img src="{{url('/images/food-delivery.png')}}" alt="">
        <h5 id="wait">
          3. Attendi la consegna
        </h5>
      </div>
    </div>
  </section>

    <section class="card-category">
        <div class="container-card-category">
            <div class="menu-filter">
                <h3 id="author" class="ricerca-avanzata">Seleziona una o più categorie</h3>
                <div class="selection" id="selection">
                    @foreach ($categories as $category)
                        <div class="form-check">
                            <label class="labelcontainer">
                                <input @change="searchRestaurants()" v-model="selectedCategory" name="query" class="form-check-input" type="checkbox" :value="{{ $category->id }}" >
                                <span class="checkmark">{{ $category->name }}</span>
                            </label>
                        </div>
                    @endforeach
                        <div class="form-check">
                        <label class="labelcontainer">
                            <a @click="selectedCategory = [], searchRestaurants() " name="query" class="form-check-input" type="checkbox" value="Azzera" ><span class="checkmark"><i class="fas fa-trash-alt"></i></span></a>
                        </label>
                    </div>
                </div>
                <div class="container-card">
                    <h3 v-if="!selectedCategory.length">Ultimi Ristoranti Inseriti</h3>
                    <h1 v-else>I risultati per la tua selezione</h1>
                    <div class="cards" :class="!selectedCategory.length? '' : 'selected-search'">
                    <div class="card" v-for="restaurant in restaurants">
                      <a :href="'{{url('/restaurants')}}'+'/'+ restaurant.slug" >
                          <h2>@{{ restaurant.name }}</h2>
                          <img v-if="restaurant.cover == null" src="{{url('/images/image-non-disp.png')}}" alt="">
                          <img v-else :src="'{{url('/storage')}}' + '/' + restaurant.cover" alt="">
                          <p><i class="fas fa-map-marker-alt"></i>@{{restaurant.address}}</p>
                          <p><i class="fas fa-phone-alt"></i>@{{restaurant.phone}}</p>
                          <div>
                              <span v-for="category in restaurant.categories">@{{category.name}}</span>
                          </div>
                      </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


  @if ($transaction_result === true)
    <div id="myModal" class="modal" @click="closeModalOnWindow()">
      <div class="modal-content">
        <span @click="closeModal()" class="close">&times;</span>
        <div class="result">
          <i class="fas fa-check-circle fa-9x"></i>
          <h2 class="mt-3">
            Pagamento riuscito
          </h2>
          <h3 class="mt-3 mb-3">
            Il tuo ordine e' stato inviato al ristorante
          </h3>
        </div>
      </div>
    </div>
    @elseif ($transaction_result === null)
        <div></div>
  @else
    <div id="myModal" class="modal" @click="closeModalOnWindow()">
     <div class="modal-content">
        <span @click="closeModal()" class="close">&times;</span>
        <div class="result">
          <i class="fas fa-times-circle fa-9x"></i>
          <h2 class="mt-3 mb-3">
            Pagamento non riuscito
          </h2>
        </div>
      </div>
    </div>
  @endif

@endsection
