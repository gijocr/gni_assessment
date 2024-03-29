<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'description',
        'order',
    ];

    /**
     * Page type that belongs to the question.
     */
    public function pageType()
    {
        return $this->belongsTo(PageType::class);
    }

    /**
     * Question type that belongs to the question.
     */
    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }

    /**
     * Answers that belongs to the question.
     */
    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'answer_questions')
            ->withPivot(['session_id'])
            ->withTimestamps();
    }
}
