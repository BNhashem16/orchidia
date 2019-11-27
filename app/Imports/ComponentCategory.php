<?php

namespace App\Imports;

use App\Component_category;
use Maatwebsite\Excel\Concerns\ToModel;

class ComponentCategory implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Component_category([
            'title'     => $row[0],
            'type'    => $row[1],
        ]);
    }
}
