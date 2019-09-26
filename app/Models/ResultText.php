<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultText extends Model
{
    protected $fillable = [
        'title',
        'description',
        'score_min',
        'score_max',
        'order',
        'final',
    ];

    /**
     * Page type that belongs to the resultText.
     */
    public function pageType()
    {
        return $this->belongsTo(PageType::class);
    }
}
