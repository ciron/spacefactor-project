<?php

namespace App\Models;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Design.
 */
class Options extends Model
{
   
    protected $table = 'options';
    // protected $fillable = ['title', 'slug','banner','meta', 'description','gallery','category','design_service'];

    public function attributes()
    {
    	return $this->belongsToMany(Attribute::class, 'option_attribute', 'option_id', 'attribute_id');
    }
}
