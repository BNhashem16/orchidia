<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Excel;

class ImportExcelController extends Controller
{
    function index()
    {
     $component_categories = DB::table('component_categories')->orderBy('id', 'DESC')->get();
     return view('import_excel', compact('component_categories'));
    }

    public function import()
    {
        Excel::import(new ComponentCategory, request()->file('file'));

        return back();
    }
}
