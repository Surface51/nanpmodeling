<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = [
        'ref',
        'DataSet',
        'PubID',
        'TrialID',
        'TrtID',
        'SubjectID',
        'VarName',
        'Varvalue',
        'VarUnits',
        'N',
        'SE',
        'SD'

    ];
    public $timestamps = false;
}
