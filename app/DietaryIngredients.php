<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietaryIngredients extends Model
{
    protected $table = 'dietary_ingredients';
    protected $fillable = [
        'ref',
        'DataSet',
        'PubID',
        'TrialID',
        'TrtID',
        'UID',
        'RepUID',
        'VarName',
        'Varvalue',
        'VarUnits',
        'N',
        'SE',
        'SD'

    ];
    public $timestamps = false;
}
