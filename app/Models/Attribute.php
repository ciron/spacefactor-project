<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Attribute.
 */
class Attribute extends Model
{
	protected $fillable = [
		'name'
	];
}
