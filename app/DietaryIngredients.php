<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietaryIngredients extends Model
{
    protected $table = 'dietary_ingredients';
    protected $fillable = [
        'DataSet',
        'PubID',
        'TrialID',
        'TrtID',
        'IFN',
        'VarName',
        'VarValue',
        'VarUnits',
        'N',
        'SE',
        'SD'

    ];
    public $timestamps = false;
}
