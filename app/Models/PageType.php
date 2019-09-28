<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageType extends Model
{
    protected $fillable = [
        'name',
        'text_color',
        'header_color',
        'body_color',
        'footer_color',
        'order',
    ];

    /**
     * Pages that the pageType has.
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    /**
     * Questions that belongs to the pageType.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * ResultTexts that the pageType has.
     */
    public function resultTexts()
    {
        return $this->hasMany(Page::class);
    }

    /**
     * Set name attribute.
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
