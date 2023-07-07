<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'address',
        'gender',
        'n_tertulis',
        'n_psikotes',
        'n_kejujuran',
        'n_komun',
        'n_kesop',
        'n_praktek'
        
    ];

    public function user()
    {
        return $this->hasOne(User::class,'name','user_name');
    }

    // public function exam_attempt()
    // {
    //     return $this->hasOne(ExamAttempt::'point','n_tertulis');
    // }
}
