<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Config extends Model
{
    protected $fillable = [
        'content'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'json',
    ];

    /**
     * Get decoded content attribute
     * @return array
     */
    public function getContentDecodedAttribute()
    {
        return json_decode($this->attributes['content'], true);
    }

    /**
     * Check if content has index
     * 
     * @param string @index
     * @return bool
     */
    public function hasIndex(string $index)
    {
        return (array_key_exists($index, $this->content_decoded));
    }

    /**
     * Handle storage and delete image file.
     * 
     * @param string $key
     * @param \Illuminate\Http\UploadedFile $image
     */
    public function handleImage($key, $image)
    {
        if ($this->hasIndex($key)) {
            $this->deleteImage($key);
        }

        $this->uploadImage($key, $image);
    }

    /**
     * Handle image upload
     * 
     * @param string @index
     * @return string|bool
     */
    public function uploadImage(string $index, $image)
    {
        $path = Storage::putFile('images', $image);

        if ($path) {
            $this->content = json_encode(
                array_merge(
                    $this->content_decoded,
                    [$index => $path]
                )
            );
        }

        return $path;
    }

    /**
     * Handle image delete
     * 
     * @param string @index
     * @return bool
     */
    public function deleteImage(string $index)
    {
        return Storage::delete($this->content_decoded[$index]);
    }
}
