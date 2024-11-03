<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function home(){
        return view('index');
    }

    public function menu(){
    $productos = Productos::all();
    return view('menu', compact('productos'));
    }

    public function pedido(){
        //return view('pedido');
        $productos = Productos::all();
        return view('pedido', compact('productos'));
    }

    public function contacto(){
        return view('contacto');
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function adminMenu(){
        return view('admin-menu');
    }
    
}
