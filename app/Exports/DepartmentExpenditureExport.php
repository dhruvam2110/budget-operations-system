<?php

namespace App\Exports;

use App\Models\DepartmentExpenditure;
use Maatwebsite\Excel\Concerns\FromCollection;

class DepartmentExpenditureExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DepartmentExpenditure::all();
    }
}