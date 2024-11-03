<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'Tacos Pastor',
                'descripcion' => 'Ricos tacos al Pastor con cebolla, piña',
                'tipo' => 'taco',
                'imagen' => 'Tacos_Pastor.png',
                'precio' => 13.00,
            ],
            [
                'nombre' => 'Tacos Tripa',
                'descripcion' => 'Deliciosos tacos de tripita de vaca',
                'tipo' => 'taco',
                'imagen' => 'Tacos_Tripa.png',
                'precio' => 13.00,
            ],
            [
                'nombre' => 'Tacos Bisteck',
                'descripcion' => 'Tacos de bisteck adobado',
                'tipo' => 'taco',
                'imagen' => 'Tacos_Bisteck.png',
                'precio' => 13.00,
            ],
            [
                'nombre' => 'Tacos Chorizo',
                'descripcion' => 'Excelentes tacos de chorizo',
                'tipo' => 'taco',
                'imagen' => 'Tacos_Chorizo.png',
                'precio' => 13.00,
            ],
            [
                'nombre' => 'Tacos Combinado',
                'descripcion' => 'Tacos de combinado de bisteck con chorizo, piña',
                'tipo' => 'taco',
                'imagen' => 'Tacos_Combinado.png',
                'precio' => 13.00,
            ],
            [
                'nombre' => 'Refresco 600ml',
                'descripcion' => 'Amplia selección de refrescos de Coca-Cola',
                'tipo' => 'refresco',
                'imagen' => 'Refrescos600ml.png',
                'precio' => 20.00,
            ],
            [
                'nombre' => 'Refresco 500ml',
                'descripcion' => 'Refresco Coca-Cola de vidrio',
                'tipo' => 'refresco',
                'imagen' => 'CocaCola500ml.png',
                'precio' => 15.00,
            ],
        ];

        // Inserta los productos en la base de datos
        DB::table('productos')->insert($productos);
    }
}
