@extends('layouts.app')

@section('content')

<div class="dashboard-restaurant-edit">
    <div class="dashboard-header-restaurant-edit">
        <a href="{{url('/admin')}}"><h1>Dashboard</h1></a>

    </div>
    <div class="dashboard-body-restaurant-edit">
        <div class="dashboard-body-menu-restaurant-edit">
            <ul>
                <li>
                    <a href="{{route('admin.restaurants.index')}}" >I Tuoi Ristoranti</a>
                </li>
            </ul>
        </div>
        <div class="dashboard-body-content-restaurant-edit">
            <div class="card-form-restaurant-edit">
                <div class="card-title-restaurant-edit">
                    <h2>Modifica Ristorante</h2>
                </div>
                <form method="post" action="{{route('admin.restaurants.update' , ['restaurant' => $restaurant->id])}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="content-form-restaurant-edit">
                        <h3>Nome</h3>
                        <div class="content-form-input-restaurant-edit">
                            <input value="{{old( 'name', $restaurant->name)}}" type="text" name="name" required>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="content-form-file-restaurant-edit">
                            @if ($restaurant->cover)
                                <figure>
                                <img src="{{asset('storage/'.$restaurant->cover )}}" alt="{{$restaurant->name}}">
                                </figure>
                            @endif
                        </div>
                        <h3>Indirizzo</h3>
                        <div class="content-form-input-restaurant-edit">
                            <input value="{{old( 'address', $restaurant->address)}}" type="text" name="address" required>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <h3>Telefono</h3>
                        <div class="content-form-input-restaurant-edit">
                            <input value="{{old( 'phone', $restaurant->phone)}}" type="text" name="phone" required>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <h3>Seleziona Categoria</h3>
                        <div class="content-form-category-restaurant-edit">
                            @foreach ($categories as $category)
                                <div class="form-check-restaurant-edit">
                                    @if ($errors->any())
                                        <label>
                                            <input name="categories[]" type="checkbox" value="{{ $category->id }}"
                                            {{ in_array($category->id , old('categories', [])) ? 'checked=checked' : '' }}>
                                            {{ $restaurant->name }}
                                        </label>
                                        @else
                                        <label>
                                            <input name="categories[]"  type="checkbox" value="{{ $category->id }}"
                                            {{ $restaurant->categories->contains($category) ? 'checked=checked' : '' }}>
                                            {{ $category->name }}
                                        </label>
                                    @endif
                                </div>
                            @endforeach
                            @error('tags')
                                <div class="message-edit">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="content-form-control-file-restaurant-edit">
                            <input type="file" name="cover">
                            @error('cover')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="button-edit" type="submit">
                            Modifica
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
