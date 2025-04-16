<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">FAV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Ürünler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders') }}">Siparişler</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('showCart') }}"><i class="fas fa-shopping-cart"></i> Sepet</a>
                </li>
                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route(name: 'logout') }}"><i class="fas fa-user"></i> Çıkış Yap</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i> Giriş Yap</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
