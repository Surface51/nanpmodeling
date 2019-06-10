<?php

namespace App\Exports;
ini_set('max_execution_time', 1800);


use App\PerformanceData;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerformancesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PerformanceData::all();
    }
}
