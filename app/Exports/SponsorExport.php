<?php

namespace App\Exports;

use App\Models\Sponsor;
use Maatwebsite\Excel\Concerns\FromCollection;

class SponsorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sponsor::all();
    }
}