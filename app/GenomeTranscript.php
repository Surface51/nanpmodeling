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
        'DaySampleofPeriod_InVivo',
        'DaySampleofPeriod_InVitro',
        'Time_Sample_InVivo',
        'Time_Sample_InVitro',
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
