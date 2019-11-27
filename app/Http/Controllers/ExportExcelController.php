<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\UsersExport;
//use Maatwebsite\Excel\Excel;
use Excel;

class ExportExcelController extends Controller
{

    function excel()
    {
        $component_categories = DB::table('component_categories')->get()->toArray();
        $customer_array[] = array('title', 'type');
        foreach($component_categories as $customer)
        {
            $customer_array[] = array(
                'title'  => $customer->title,
                'type'   => $customer->type
            );
        }
        Excel::create('Customer Data', function($excel) use ($customer_array){
            $excel->setTitle('Customer Data');
            $excel->sheet('Customer Data', function($sheet) use ($customer_array){
                $sheet->fromArray($customer_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }
}
