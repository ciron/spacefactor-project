<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quiz.
 */
class Quiz extends Model
{
    protected $fillable = ['first_name','last_name','email'];
}
