<?php

namespace App\Http\Controllers;

//use App\Imports\DataImport;
use App\Imports\ProductosImport;
use App\Exports\OrdenesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    
    public function importar(Request $request)
    {
        Excel::import(new ProductosImport, $request->file('file'));
        return redirect('/taquero')->with('success', 'All good!');
    }

    public function importExcel(Request $request)
    {
        Excel::import(new ProductosImport, $request->file('file'));
        return redirect('/taquero')->with('success', 'All good!');
    }

    public function exportExcel() 
    {
        return Excel::download(new OrdenesExport, 'ventas.xlsx');
    }

}
