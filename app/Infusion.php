<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infusion extends Model
{
    protected $table = 'infusions';

    protected $fillable = [
        'ref',
        'DataSet',
        'PubID',
        'TrialID',
        'TrtID',
        'SubjectID',
        'InfusionLocation',
        'VarName',
        'VarValue',
        'VarUnits',
        'DayofPeriodStart',
        'DayofPeriodStop',
        'TimeofDayStart',
        'TimeofDayStop',

    ];
    public $timestamps = false;
}
