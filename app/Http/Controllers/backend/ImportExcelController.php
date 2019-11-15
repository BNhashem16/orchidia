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

    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $component_categories = Excel::load($path)->get();

     if($component_categories->count() > 0)
     {
      foreach($component_categories->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
         'title'  => $row['title'],
         'type'   => $row['type'],
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('component_categories')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }
}
