<header>

    <div class="wp-header">
        <div class="filter"></div>

        <div class="header-log-in">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{route('admin.home')}}">Dashboard</a>

                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="header-top">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="deliveboo-logo">
                </a>
            </div>

            <div class="nav-menu-top">

                <div class="cart">
                    <i class="fas fa-shopping-cart"></i>
                </div>

                <div class="toggle-menu"  @click="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

        </div>



        <div class="menu-mobile" :class="isActive ? 'active' : ''">
            <div class="nav-menu-mobile">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Ristoranti</a></li>
                    <li><a href="">Categorie</a></li>
                    <li><a href="">Piatti</a></li>
                    <li><a href="">Contatti</a></li>
                </ul>
            </div>
        </div>

        <div class="header-bottom">

        </div>

        
    </div>

</header>
