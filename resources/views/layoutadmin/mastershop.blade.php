<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href={{asset('assets/assets/favicon.ico')}} />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href={{asset('assets/css/styles.css')}} rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Mista Sports</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/home">Home</a></li>
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="/mytransaksi">Transaksi Saya</a>
                    </li>
                    @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link active">Login</a></li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </a>
                    </li>
                    @endauth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Kategori</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="/home/0">Pria</a></li>
                            <li><a class="dropdown-item" href="/home/1">Wanita</a></li>
                            <li><a class="dropdown-item" href="/home/1">Semua Gender</a></li>

                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="/keranjang" class="btn btn-outline-dark">
                        <i class="bi-cart-fill me-1"></i>
                        Keranjang
                        @guest
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        @endguest
                        @auth
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                            @php
                            $keranjang =
                            App\Models\Cart::where('id_user',auth()->user()->id)->where('is_checkout',0)->count();
                            @endphp
                            {{$keranjang}}
                        </span>
                        @endauth
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->

    @yield('head')

    <!-- Section-->
    <section class="py-5">
        @yield('konten')
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2024</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src={{asset('assets/js/scripts.js')}}></script>
</body>

</html>