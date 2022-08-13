<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Role.
 */
class Category extends Model
{
    use SoftDeletes;

    protected $table = 'category';
    protected $fillable = ['cat_name', 'active', 'cat_image', 'type', 'slug','banner_image'];

    public static function cats($type){
    	$cats = Category::where('category.type', $type)->get();
    	return $cats;
    }
}
