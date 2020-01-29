<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index(){
        return view('import.index');
    }
    public function import(ImportRequest $request){
        if (ini_get('max_execution_time')) {
            ini_set("max_execution_time", "25");
        }

        if(ini_get("memory_limit")) {
             ini_set("memory_limit", "100M");
        }

        $path = $request->file('select_file')->getRealPath();
        $import = new ProductsImport;
        Excel::import($import, $path);

        return back()->with('success', 'Завантаження файлу Excel успішне. Кількість рядків: '.($import->getRowCount()));
    }


}
