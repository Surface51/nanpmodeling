<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InVitroData extends Model
{
    protected $table = 'in_vitro_datas';
    protected $fillable = [
        'ref',
        'DataSet',
        'PubID',
        'TrialID',
        'TrtID',
        'SubjectID',
        'PlateID',
        'WellID',
        'SubTrtID',
        'Site_sample',
        'Cell_Type',
        'Day_Sample',
        'Day_Sample2',
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
