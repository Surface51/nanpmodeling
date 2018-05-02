<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceData extends Model
{
    protected $table = 'performance_datas';

    protected $fillable = [
        'DataSet',
        'PubID',
        'TrialID',
        'SubjectID',
        'Day_Sample',
        'Time_Sample',
        'VarName',
        'VarValue',
        'VarUnits',
        'N',
        'SE',
        'SD',
        'VarType'

    ];
    public $timestamps = false;
}
