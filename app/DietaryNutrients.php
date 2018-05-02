<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietaryNutrients extends Model
{
    protected $table = 'dietary_nutrients';
    protected $fillable = [
        'DataSet',
        'PubID',
        'TrialID',
        'TrtID',
        'SubjectID',
        'VarName',
        'VarValue',
        'VarUnits',
        'N',
        'SE',
        'SD'

    ];
    public $timestamps = false;
}
