<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
use App\Models\Ordenes;
use App\Models\Platillos;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use PDF;

class PDFController extends Controller
{
    //

    public function taqueroPDF(Request $request){
    $ordenes = Ordenes::all();
    $platillos = Platillos::all();
    $productos = Productos::all();
    $clientes = Cliente::all();
    $usuarios = User::all();

    $pdf = PDF::loadView('taquero-pdf', compact('productos','ordenes','platillos','usuarios','clientes'));
    $pdf->setPaper('A4', 'portrait');

    return $pdf->download('ordenes_pendientes.pdf');
    }

    

    public function exportPDF()
    {
        $ordenes = Ordenes::all();
        $platillos = Platillos::all();
        $productos = Productos::all();
        $clientes = Cliente::all();
        $usuarios = User::all();

        $html = view('taquero-pdf')->with('ordenes', $ordenes)->with('platillos', $platillos)
        ->with('clientes', $clientes)->with('productos',$productos)->with('usuarios',$usuarios);
        
        $DomPDF = new Dompdf();
        $DomPDF->loadHtml($html);
        $DomPDF->render();
        $file = 'Ventas.pdf';
        
        return $DomPDF->stream($file);
    }

    public function clientePDF(Request $request){

    }
}
