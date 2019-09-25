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
     * Pages that the page type has.
     */
    public function page()
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
