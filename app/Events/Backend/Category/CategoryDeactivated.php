<?php

namespace App\Events\Backend\Category;

use Illuminate\Queue\SerializesModels;

/**
 * Class CategoryDeactivated.
 */
class CategoryDeactivated
{
    use SerializesModels;

    /**
     * @var
     */
    public $category;

    /**
     * @param $category
     */
    public function __construct($category)
    {
        $this->user = $category;
    }
}
