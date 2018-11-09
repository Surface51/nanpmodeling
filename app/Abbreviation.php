<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abbreviation extends Model
{
    protected $table = 'abbreviations';
    protected $fillable = [
        'abbreviation',
        'name'
    ];
    public $timestamps = false;
}
