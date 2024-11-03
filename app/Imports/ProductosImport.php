<?php

namespace App\Imports;

use App\Models\Productos;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         return new Productos([
            'nombre' => $row[0],
            'descripcion' => $row[1],
            'tipo' => $row[2],
            'precio' => $row[3],
            'imagen' => '',
         ]);
    }
}
