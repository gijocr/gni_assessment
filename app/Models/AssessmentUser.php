<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentUser extends Model
{
    protected $fillable = [
        'name',
        'email',
        'organization',
        'job',
        'area',
    ];
}
