<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name',
        'title',
        'description',
        'button_label',
        'footer_label',
        'order',
    ];

    /**
     * Page type that belongs to the page.
     */
    public function pageType()
    {
        return $this->belongsTo(PageType::class);
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
