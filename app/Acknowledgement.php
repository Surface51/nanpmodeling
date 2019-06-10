<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acknowledgement extends Model
{
    protected $table = 'acknowledgments';
    protected $fillable = [
        'id',
        'dataset',
        'acknowledgment',
        'comments'

    ];
    public $timestamps = false;
}
