<?php

namespace App\Models\Design;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Design.
 */
class Design extends Model
{
    use SoftDeletes;
    protected $casts = [
        'meta' => 'object',
    ];
    protected $table = 'design';
    protected $fillable = ['title', 'active', 'image','extra','type'];
}
