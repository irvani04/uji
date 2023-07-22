<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function calSAW()
    {
        $interviews = Interview::all();

        $weights = [
            'n_tertulis' => 0.2,
            'n_psikotes' => 0.1,
            'n_kejujuran' => 0.25,
            'n_komun' => 0.1,
            'n_kesop' => 0.15,
            'n_praktek' => 0.2,

        ];
        $normalized = [];
        foreach ($interviews as $interview) {
            $normalized[$interview->id] = [];
            foreach ($weights as $attribute => $weight) {
                $normalized[$interview->id][$attribute] = $interview->{$attribute} / $interview->max($attribute);
            }
        }

        // Calculate the weighted sum for each alternative
        $weightedSum = [];
        foreach ($normalized as $interviewId => $attributes) {
            $weightedSum[$interviewId] = 0;
            foreach ($attributes as $attribute => $value) {
                $weightedSum[$interviewId] += $value * $weights[$attribute];
            }
        }

        // Sort the alternatives based on their weighted sum in descending order
        arsort($weightedSum);

        // Return the ranked alternatives
        return $weightedSum;
    }
}
