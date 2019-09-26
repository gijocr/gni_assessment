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
}
