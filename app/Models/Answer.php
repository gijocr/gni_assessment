<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'title',
        'order',
    ];

    /**
     * Question types that belongs to the answer.
     */
    public function questionTypes()
    {
        return $this->belongsToMany(QuestionType::class, 'answer_question_types')
            ->withPivot(['score', 'factor'])
            ->withTimestamps();
    }

    /**
     * Questions that belongs to the answer.
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'answer_questions', 'answer_id', 'question_id')
            ->withPivot(['session_id'])
            ->withTimestamps();
    }
}
