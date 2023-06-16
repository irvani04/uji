<?php

namespace App\Models;

use App\Models\QnaExam;
use App\Models\Subject;
use App\Models\ExamAttempt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'exam_name',
        'subject_id',
        'date',
        'time',
        'attempt'
    ];

    protected $appends = ['attempt_counter'];
    public $count = 0;

    public function subjects()
    {
        return $this->hasMany(Subject::class,'id','subject_id');
    }

    public function getQnaExam()
    {
        return $this->hasMany(QnaExam::class,'exam_id','id');
    }

    public function getIdAttribute($value)
    {
        $attemptCount = ExamAttempt::where(['exam_id'=>$value,'user_id'=>auth()->user()->id])->count();
        $this->count = $attemptCount;
        return $value;
    }

    public function getAttemptCounterAttribute()
    {
        return $this->count;
    }
}
