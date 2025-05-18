<?php

namespace App\Exports;

use App\Models\BudgetAmount;
use Maatwebsite\Excel\Concerns\FromCollection;

class BudgetAmountExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BudgetAmount::all();
    }
}