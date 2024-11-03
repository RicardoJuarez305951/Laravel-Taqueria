<!DOCTYPE html>
<html>
<head>
    <title>Ordenes Pendientes</title>
    <style>
        .text-center {
            text-align: center;
        }

        .m-5 {
            margin: 5px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-center {
            justify-content: center;
        }

        .m-2 {
            margin: 2px;
        }

        .container {
            max-width: 600px;
        }

        .p-3 {
            padding: 15px;
        }

        .shadow {
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .mt-4 {
            margin-top: 4px;
        }

        .mb-3 {
            margin-bottom: 3px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        ul {
            margin: 0;
            padding-left: 15px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div class="text-center m-5">
        <div class="card-body">
            <h4 class="card-title">Ordenes Pendientes</h4>
        </div>
    </div>

    <div class="d-flex justify-content-center m-2">
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
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí va el código para mostrar las ordenes pendientes -->
                        @foreach($ordenes as $orden)
                            <tr>
                                <td>{{ $orden->mesa }}</td>
                                <td>
                                    @foreach($platillos as $platillo)
                                        <ul>
                                            <li>{{ $platillo->cantidad }} - {{ $platillo->producto }} - ${{ $platillo->precio }}</li>
                                        </ul>
                                    @endforeach
                                </td>
                                <td>{{ $orden->created_at }}</td>
                                <td>${{ $orden->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
