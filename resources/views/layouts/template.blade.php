<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" sizes="32x32" rel="icon" href="{{'/storage/favicon/favicon.png'}}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">

</head>
<body style="background-color:#EBEAEA">

@section('header')

    <!-- Responsive navbar-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand" href="/profile">Cuenta</a>
            </div>
        </nav>
    </header>    

@show

<main width="100vh">
    @yield('content')
</main>

@section('footer')
    <!-- Footer-->
    <footer class="my-0 py-1 bg-dark ">
        <ul class="nav justify-content-center border-bottom pb-1 mb-1 ">
            <li class="nav-item "><a href="/" class="nav-link px-2 text-white">Inicio</a></li>
            <li class="nav-item "><a href="/contactanos" class="nav-link px-2 text-white">Acerca de</a></li>
        </ul>
        <p class="text-center text-white">© 2023</p>
    </footer>
@show
    
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-MiHjZNhYanXb+8h3Vn29M5Ib+23abUpt8jOc5FhzEqS1itSkoI0H/WX2YBStoJzv" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


<!-- Scripts -->
@yield('scripts')

</body>
</html>