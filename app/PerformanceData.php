<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceData extends Model
{
    protected $table = 'performance_datas';

    protected $fillable = [
        'ref',
        'DataSet',
        'PubID',
        'TrialID',
        'TrtID',
        'SubjectID',
        'Site_Sample',
        'Day_Sample',
        'Time_Sample',
        'VarName',
        'VarValue',
        'VarUnits',
        'N',
        'SEM',
        'SED',
        'VarType'

    ];
    public $timestamps = false;
}
