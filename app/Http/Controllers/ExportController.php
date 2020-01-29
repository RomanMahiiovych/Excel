<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export(){
        return view('exports.download');
    }
    public function download(){
        return Excel::download(new ProductsExport(), 'products.xlsx');
         //redirect()->back()->with('success', 'Файл успішно завантажено.');
    }
}
