<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTraining extends Model
{
    use HasFactory;
    public $table ="data_training";

    protected $fillable = [
        'nama',
        'komun',
        'kejur',
        'kesop',
        'keprib',
        'penget',
        'praktek',
        'hasil'
        
    ];
}
