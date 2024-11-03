@extends('layouts.template')

@section('title', 'Productos')

@section('content')

<div class="container">
    <h1>Productos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>${{ $producto->precio }}</td>
                <td>
                    <button class="btn btn-secondary decrement-btn m-1" data-product="{{ $nombre=str_replace(' ', '_', $producto->nombre)}}" data-productid="{{ $producto->id }}">-</button>
                    <span class="cantidad" id="cantidad_{{ $nombre=str_replace(' ', '_', $producto->nombre)}}">0</span>
                    <button class="btn btn-primary increment-btn m-1" data-product="{{ $nombre=str_replace(' ', '_', $producto->nombre)}}">+</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total-price">
        <h4>Total: $<span id="total_price">0.00</span></h4>
    </div>
    <form action="{{ route('crear_pedido') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="mesa">Número de mesa:</label>
            <input type="number" name="mesa" id="mesa" class="form-control" required>
        </div>
        <input type="hidden" name="productos" id="productos" value="">
        <button type="submit" class="btn m-2 btn-success" id="finalizar-compra">Finalizar compra</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    //Aumentar Producto
    $(document).ready(function () {
        $('.increment-btn').click(function () {
            var product = $(this).data('product');
            var cantidadElement = $('#cantidad_' + product);
            var cantidad = parseInt(cantidadElement.text());
            cantidad++;
            cantidadElement.text(cantidad);
            calculateTotalPrice();
        });
        //Quitar Producto
        $('.decrement-btn').click(function () {
            var product = $(this).data('product');
            var cantidadElement = $('#cantidad_' + product);
            var cantidad = parseInt(cantidadElement.text());
            if (cantidad > 0) {
                cantidad--;
                cantidadElement.text(cantidad);
                calculateTotalPrice();
            }
        });

        //Calcular el precio total
        function calculateTotalPrice() {
            var totalPrice = 0;
            @foreach($productos as $producto)
                var cantidad = parseInt($('#cantidad_{{ str_replace(' ', '_', $producto->nombre) }}').text());
                var precio = parseFloat('{{ $producto->precio }}');
                totalPrice += cantidad * precio;
            @endforeach

            $('#total_price').text(totalPrice.toFixed(2));
        }

        //Genera compra
        $('#finalizar-compra').click(function (e) {
            e.preventDefault();

            var selectedProducts = [];
            @foreach($productos as $producto)
                var cantidad = parseInt($('#cantidad_{{ str_replace(' ', '_', $producto->nombre) }}').text());
                //var productoId = parseInt($(this).data('productid'));
                var productoId = '{{ $producto->id }}';
                var nombre = '{{ $producto->nombre }}';
                var precio = parseFloat('{{ $producto->precio }}');

                if (cantidad > 0) {
                    selectedProducts.push({
                        productoId: productoId,
                        nombre: nombre,
                        precio: precio,
                        cantidad: cantidad,
                    });
                }
            @endforeach

            $('#productos').val(JSON.stringify(selectedProducts));
            $('form').submit();
        });


    });
</script>

@endsection
