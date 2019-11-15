<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Component_category;

class DynamicPDFController extends Controller
{
  function index()
  {
   $component_category = $this->get_customer_data();
   return view('backend.component_category.list')->with('component_category', $component_category);
  }

  function get_customer_data()
  {
   $component_category = DB::table('component_categories')->get();
   return $component_category;
  }

  function pdf()
  {
   $pdf = \App::make('dompdf.wrapper');
   $pdf->loadHTML($this->convert_customer_data_to_html());
   return $pdf->stream();
  }

  function convert_customer_data_to_html()
  {
   $component_category = $this->get_customer_data();
   $output = '
   <h3 align="center">Component Category Data</h3>
   <table width="100%" style="border-collapse: collapse; border: 0px;">
    <tr>
  <th style="border: 1px solid; padding:12px;" width="20%">#</th>
  <th style="border: 1px solid; padding:12px;" width="20%">Title</th>
  <th style="border: 1px solid; padding:12px;" width="30%">Type</th>
  <th style="border: 1px solid; padding:12px;" width="15%">Create By</th>
  <th style="border: 1px solid; padding:12px;" width="15%">Update By</th>
 </tr>
   ';

   foreach($component_category as $key => $component_category)
   {

    $number = $key+1;
    $output .= '
    <tr>
    <td style="border: 1px solid; padding:12px;">'.$number.'</td>
     <td style="border: 1px solid; padding:12px;">'.$component_category->title.'</td>
     <td style="border: 1px solid; padding:12px;">'.$component_category->type.'</td>
     <td style="border: 1px solid; padding:12px;">'.$component_category->created_by.'</td>
     <td style="border: 1px solid; padding:12px;">'.$component_category->updated_by.'</td>
    </tr>
    ';
   }
   $output .= '</table>';
   return $output;
  }
}
