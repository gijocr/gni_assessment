<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    protected $fillable = [
        'title',
        'order',
    ];

    /**
     * Answers that belongs to the question type .
     */
    public function answers()
    {
        return $this->belongsToMany(Answer::class);
    }
}
