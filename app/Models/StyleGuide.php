<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StyleGuide extends Model
{
    //
    public static function styleGuides(){
    	$styles = StyleGuide::with('images')->get();
    	return $styles;
    }

    public function images(){
    	return $this->hasMany('App\Models\StyleGuideImage');
    }
}
