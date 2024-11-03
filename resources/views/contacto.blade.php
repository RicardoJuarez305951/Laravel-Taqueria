@extends('layouts.template')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row m-3">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Contacto</h5>
            <p class="card-text">¡Bienvenido a Taquería "El Pingüino"! Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos.</p>
            <ul class="list-group">
              <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> <span class="fw-bold">Dirección:</span> San Luis Potosí, SLP</li>
              <li class="list-group-item"><i class="fas fa-phone-alt"></i> <span class="fw-bold">Teléfono:</span> 444-859-5714</li>
              <li class="list-group-item"><i class="fas fa-envelope"></i> <span class="fw-bold">Email:</span> ricardojuarezflores01@gmail.com</li>
              <li class="list-group-item"><i class="fas fa-clock"></i> <span class="fw-bold">Horario de atención:</span> Martes a Domingo - 18:00 a 22:00</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop