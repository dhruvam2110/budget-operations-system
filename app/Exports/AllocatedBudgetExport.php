<?php

namespace App\Exports;

use App\Models\AllocatedBudget;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllocatedBudgetExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AllocatedBudget::all();
    }
}