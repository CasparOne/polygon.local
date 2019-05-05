<?php


namespace App\Http\Requests\Blog;


use App\Http\Requests\BlogBaseRequest;

class BlogPostUpdateRequest extends BlogBaseRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'title' =>  'required|min:3|max:200',
            'slug'  =>  '',
            'excerpt'  =>  'max:500',
            'content_raw'  =>  'required|string|min:5|max:10000',
            'category_id'  =>  'required|integer|exists:blog_categories,id',
        ];
    }
}
