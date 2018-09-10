<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenomeTranscript extends Model
{
    protected $table = 'genome_transcripts';
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
