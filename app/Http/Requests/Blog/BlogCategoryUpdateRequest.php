<?php

namespace App\Http\Requests\Blog;


use App\Http\Requests\BlogCategoryBaseRequest;

class BlogCategoryUpdateRequest extends BlogCategoryBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' =>  'required|min:5|max:200',
            'slug'  =>  'max:200',
            'description'  =>  'string|max:500|min:3',
            'parent_id'  =>  'required|integer|exists:blog_categories,id',
        ];
    }
}
