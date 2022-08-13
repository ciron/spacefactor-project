<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Design.
 */
class Questions extends Model
{
    // use SoftDeletes;
    // protected $casts = [
    //     'meta' => 'object',
    // ];
    protected $table = 'questions';
    // protected $fillable = ['title', 'slug','banner','meta', 'description','gallery','category','design_service'];
    
    public function options(){
    return $this->hasMany('App\Models\Options', 'question_id','id');
    }
}
