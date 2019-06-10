<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietaryNutrients extends Model
{
    protected $table = 'dietary_nutrients';
    protected $fillable = [
        'ref',
        'DataSet',
        'PubID',
        'TrialID',
        'TrtID',
        'SubjectID',
        'DaySample',
        'VarName',
        'Varvalue',
        'VarUnits',
        'N',
        'SE',
        'SD'

    ];
    public $timestamps = false;
}
