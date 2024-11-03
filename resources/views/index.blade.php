@extends('layouts.template')

@section('title', 'Home')

@section('content')

<main>
    <section class="container d-flex flex-row justify-content-around w-50 p-5">
        <div class="text-center d-flex flex-column">
            <h1>Taquería El Pingüino</h1>
            @cannot('auth')
            <div>
                <a href="/login" class="btn btn-primary">Login</a>
                <a href="/register" class="btn btn-secondary">Crear Cuenta</a>
            </div>
            @endcannot
        </div>
        
        <div class="text-center w-50 background">
            <nav>
                <ul class="nav d-flex flex-column">
                    <li class="nav-item m-2">
                        <a class="btn btn-primary" href="/menu">Menú</a>
                    </li>
                    @can('buy')
                    <li class="nav-item m-2">
                        <a class="btn btn-primary" href="/pedido">Haz un pedido</a>
                    </li>
                    @endcan
                    <li class="nav-item m-2">
                        <a class="btn btn-primary" href="/contacto">Contacto</a>
                    </li>
                </ul>
            </nav>
        </div>            
    </section>
</main>
@stop