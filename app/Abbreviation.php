<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

class Abbreviation extends Model
{
//    use SearchableTrait;

    protected $table = 'abbreviations';
    protected $fillable = [
        'abbreviation',
        'name'
    ];
    protected $seachable = [
        'columns' => [
            'abbreviations.abbreviation' => 2
        ],
    ];
    public $timestamps = false;
}
