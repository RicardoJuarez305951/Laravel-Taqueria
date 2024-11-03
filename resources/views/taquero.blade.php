@extends('layouts.template')

@section('title', 'Ordenes Pendientes')

@section('content')


<div class="text-center m-5">
    <div class="card-body">
        <h4 class="card-title">Ordenes Pendientes</h4>
    </div>
</div>

<div class="d-flex justify-content-center m-2 ">
    <div class="container card p-3 shadow">
        <div class="mt-4">
            <h5 class="mb-3">Ordenes Pendientes</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mesa</th>
                        <th>Desglose</th>
                        <th>Fecha y Hora</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí va el código para mostrar las ordenes pendientes -->
                    @foreach($ordenes as $orden)
                        <tr>
                            @if( $orden->listo == 0)
                                <td>{{ $orden->mesa }}</td>
                                <td>
                                    {{-- {{ $orden->clienteId }} --}}
                                    @foreach($platillos as $platillo)
                                    <ul>
                                        <li>{{$platillo->cantidad}} - {{$platillo->producto}} - ${{$platillo->precio}}</li>
                                    </ul>
                                    @endforeach
                                </td>
                                <td>{{ $orden->created_at }}</td>
                                <td>${{ $orden->total }}</td>
                                <td>
                                    <form action="/taquero-libera" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="ordenes" id="ordenes" value="">
                                        <input type="hidden" name="ordenesId" id="ordenesId" value="{{$orden->id}}">
                                        <button type="submit" class="btn btn-primary">Listo</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 card shadow-sm p-2 d-flex flex-column">
            <h5 class="mb-3">Exportar ventas de Hoy a PDF</h5>
            {{-- <form action="{{ route('exportar_ventas_excel') }}" method="POST" enctype="multipart/form-data"> --}}
            <form action="/taquero/pdf" method="POST" enctype="multipart/form-data">
                @csrf
                <a href="/taquero/pdf"class="btn btn-primary">Exportar a PDF</a>
            </form>
        </div>

        <div class="mt-4 card shadow-sm p-2">
            <h5 class="mb-3">Exportar ventas de Hoy a Excel</h5>
            <form action="/taquero/excel-export" method="post" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-primary">Exportar desde Excel</button>
            </form>
        </div>

        <div class="mt-4">
            <h5 class="mb-3">Menú</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Opciones</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>${{ $producto->precio }}</td>
                        <td class="p-2"  >
                            <form style="width:400px" class="d-flex flex-column" action="/taquero-agrega-imagen" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input class="m-1" type="hidden" name="productos" id="productos" value="">
                                <input class="m-1" type="hidden" name="productoId" id="productoId" value="{{$producto->id}}">
                                <input class="m-1" type="file" name="imagen" id=""><br>
                                <button type="submit" class="btn btn-primary">Nueva Imagen</button>
                            </form>
                        </td>
                        <td style="width:150px"><img style="width:150px"  src="{{ asset('storage/'.$producto->imagen) }}" alt=""></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 card shadow-sm p-2">
            <h5 class="mb-3">Importar Menú de Excel la venta de Hoy</h5>
            <form action="/taquero/excel" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="archivo_excel">Seleccionar archivo Excel:</label>
                    <input type="file" name="file" id="file">
                </div>
                <button type="submit" class="btn btn-primary">Importar desde Excel</button>
            </form>
        </div>
    </div>
</div>
@endsection
