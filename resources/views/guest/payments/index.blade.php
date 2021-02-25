@extends('layouts.app')

@section('chart-css')
  <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
  <script src="https://js.braintreegateway.com/web/dropin/1.26.0/js/dropin.min.js"></script>
@endsection

@section('content')

  <div class="container-fluid" v-if="cartCookie.length">
    <div class="row g-3" v-cloak>
      <div class="offset-xs-1 col-xs-10 col-md-5 col-lg-4 order-md-last mt-5">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span>Il tuo carrello</span>
          {{-- <span class="badge bg-secondary rounded-pill">@{{cartCookie.length}}</span> --}}
        </h4>
        <ul class="list-group mb-3">
          <li v-for="product in cartCookie" :key="product.id" class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">@{{ product.name }}</h6>
              <span class="cart">
                <a @click="updateCart(product, 'subtract'), cartBtnLessPlus()">
                  <i class="far fa-minus-square"></i>
                </a>
                <span class="cart__quantity">@{{ product.quantity }}</span>
                <a @click="updateCart(product, 'add'), cartBtnLessPlus()">
                  <i class="far fa-plus-square"></i>
                </a>
              </span>
            </div>
            <span class="text-muted">@{{ product.price }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>&euro; @{{Math.round(totalPrice * 100)/100}}</strong>
          </li>
        </ul>
      </div>

      <div class="offset-xs-1 col-xs-10 col-md-7 col-lg-8">
        <form action="{{route('transaction')}}" method="post" class="needs-validation mt-5" @submit="Save">
          @csrf
          @method('POST')
          <h4 class="mb-3">Dati di consegna</h4>
          <div class="row">
            <div class="col-sm-12 mb-3">
              <input v-if="cartCookie.length" type="text" name="price" :value="parseFloat(totalPrice)" hidden>
              <input v-if="cartCookie.length" type="text" name="restaurant_id" :value="parseFloat(cartCookie[0].restaurant_id)" hidden>
              <label>Nome</label>
              <input v-model="nome" type="text" class="form-control" id="firstName" placeholder="Inserisci il tuo nome" value="" name="nome" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
              <label>Cognome</label>
              <input v-model="cognome" type="text" class="form-control" id="lastName" placeholder="Inserisci il tuo cognome" value="" name="cognome" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
              <label>Indirizzo</label>
              <input v-model="indirizzo" type="text" class="form-control" id="address" placeholder="Inserisci l'indirizzo di consegna" name="indirizzo" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 mb-3">
              <div id="dropin-container"></div>
               <button class="btn btn-primary btn-lg btn-block" type="submit">Paga ora</button>
              <input type="hidden" id="nonce" name="payment_method_nonce"/>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- modal --}}
  <div v-else class="modal" @click="closeModalOnWindow()">
    <div class="modal-content">
      <span @click="closeModal()" class="close">&times;</span>
      <div class="result">
        <i class="fas fa-check-circle fa-9x"></i>
        <h2 class="mt-3">
          Non hai ancora inserito prodotti nel carrello!
        </h2>
      </div>
    </div>
  </div>

@endsection

@section('script')

  <script type="text/javascript" v-if="cartCookie.length">

    braintree.dropin.create(
      {
        authorization: '{{$clientToken}}',
        container: '#dropin-container'
      },
      (error, dropinInstance) =>
      {
        if (error) console.error(error);
        window.dropinInstance = dropinInstance; //salvo la dropinInstance nella window(finestra del browser) cioe' lo scope globale che e' accessibile da qualsiasi funzione js (variabile globale)

        // form.addEventListener('submit', event => {
        //   event.preventDefault(); //non serve perche' sul submit stiamo chiamando la save
        //
        //   dropinInstance.requestPaymentMethod((error, payload) =>
        //   {
        //     if (error) console.error(error);
        //
        //     document.getElementById('nonce').value = payload.nonce;
        //     form.submit();
        //   });
        // });
      });
      // });

    </script>
  @include('partials.footer')

  <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js" charset="utf-8"></script>

@endsection
