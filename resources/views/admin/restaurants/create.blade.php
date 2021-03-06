@extends('layouts.app')

@section('content')

<div class="dashboard-restaurant-create">
    <div class="dashboard-header-restaurant-create">
        <a href="{{url('/admin')}}"><h1>Dashboard</h1> </a>
    </div>
    <div class="dashboard-body-restaurant-create">
        <div class="dashboard-body-menu-restaurant-create">
            <ul>
                <li>
                    <a href="{{route('admin.restaurants.index')}}" >I Tuoi Ristoranti</a>
                </li>
            </ul>
        </div>
        <div class="dashboard-body-content-restaurant-create">
            <div class="card-form-restaurant-create">
                <div class="card-title-restaurant-create">
                    <h2>Aggiungi Ristorante</h2>
                </div>
                <form method="post" action="{{route('admin.restaurants.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="content-form-restaurant-create">
                        <h3>Nome</h3>
                        <div class="content-form-input-restaurant-create">
                            <input value="{{old('name')}}" type="text" name="name" required placeholder="Inserisci il nome...">
                            @error('name')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <h3>Indirizzo</h3>
                        <div class="content-form-input-restaurant-create">
                            <input value="{{old('address')}}" type="text" name="address" required placeholder="Inserisci l'indirizzo...">
                            @error('address')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <h3>Telefono</h3>
                        <div class="content-form-input-restaurant-create">
                            <input value="{{old('phone')}}" type="text" name="phone" required placeholder="Inserisci il numero...">
                            @error('phone')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <h3>Seleziona Categoria</h3>
                        <div class="content-form-category-restaurant-create">
                            @foreach ($categories as $category)
                                <div class="form-check-restaurant-create">
                                    <label class="form-check-label-restaurant-create">
                                        <input name="categories[]" class="form-check-input-restaurant-create" type="checkbox" value="{{ $category->id }}" {{ in_array($category->id , old('category', [])) ? 'checked=checked' : '' }}>
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                            @error('categories')
                                <div class="message-create">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="content-form-file-restaurant-create">
                            <input type="file" name="cover" placeholder="Carica immagine">

                            @error('cover')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit">Aggiungi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
