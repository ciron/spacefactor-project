<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Design.
 */
class Project extends Model
{
    use SoftDeletes;
    protected $casts = [
        'meta' => 'object',
    ];
    protected $table = 'projects';
    protected $fillable = ['title', 'slug','banner','meta', 'description','gallery','category','design_service'];
}
