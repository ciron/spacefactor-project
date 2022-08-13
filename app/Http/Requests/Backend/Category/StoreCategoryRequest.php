<?php
/**
 * Created by PhpStorm.
 * User: My Dell
 * Date: 19-03-2020
 * Time: 09:58 PM
 */

namespace App\Http\Requests\Backend\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
/**
 * Class StoreCategoryRequest
 */

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cat_name' => ['required'],
            'type' => ['required'],
            'cat_image' => 'required|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}