<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyDescriptor extends Model
{
    protected $table = 'study_descriptors';
    protected $primaryKey = 'ref';

    protected $fillable = [
        'ref',
        'DataSet',
        'PubID',
        'TrialID',
        'VarName',
        'VarValue',
        'VarUnits'

    ];
    public $timestamps = false;
}
