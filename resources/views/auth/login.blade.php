@extends('layouts.app-guest')

@section('content')
    <section class="how-to-order">
      <h1>
        Come ordinare:
      </h1>
      <div class="steps">
        <div class="step">
          <img src="{{url('/images/menu.png')}}" alt="">
          <h5>
            1. Scegli il ristorante
          </h5>
        </div>
        <div class="step">
          <img src="{{url('/images/order-food.png')}}" alt="">
          <h5>
            2. Seleziona i tuoi piatti
          </h5>
        </div>
        <div class="step">
          <img src="{{url('/images/food-delivery.png')}}" alt="">
          <h5>
            3. Attendi la consegna
          </h5>
        </div>
      </div>
    </section>


    <div id="form-login" class="card-login">
        <div class="card-header-login">{{ __('Login') }}</div>
            <div class="card-body-login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="container-input-email">
                            <input id="email" v-model.trim="valueInputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__('E-Mail')}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="container-input-password">
                            <input id="password" v-model.trim="valueInputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="container-button-login">
                            <button type="submit" class="button-login">
                                {{ __('Login') }}
                            </button>
                        </div>
                    <div class="forgot-password">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
