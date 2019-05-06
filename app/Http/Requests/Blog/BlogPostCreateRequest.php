<?php


namespace App\Http\Requests\Blog;


use App\Http\Requests\BlogBaseRequest;

class BlogPostCreateRequest extends BlogBaseRequest
{
    public function rules()
    {
        return [
            'title'         =>  'required|min:5|max:200|unique:blog_posts',
            'slug'          =>  'max:200',
            'content_raw'   =>  'required|string|min:5|max:10000',
            'category_id'   =>  'required|integer|exists:blog_categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required'    =>  'Input article title',
            'content_raw.min'   =>  'The minimum length of article [:min] chars ',
        ];
    }
}
