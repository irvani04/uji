<?php

namespace App\Models;

use App\Models\QnaExam;
use App\Models\Subject;
use App\Models\ExamAttempt;
use App\Models\User;
use App\Models\Exam;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;
    public $table = "result";

    protected $fillable = [
        'exam_id',
        'user_id',
        'point'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function exam()
    {
        return $this->hasOne(Exam::class,'id','exam_id');
    }
}
