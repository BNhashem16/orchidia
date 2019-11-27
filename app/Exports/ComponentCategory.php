<?php

namespace App\Exports;

use App\Component_category;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComponentCategory implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Component_category::all();
    }
}
