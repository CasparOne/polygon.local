<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * @package App\Models
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    const ROOT = 1;
    /**
     * @var array
     */
    protected $fillable
        = [
            'title',
            'slug',
            'parent_id',
            'description'
        ];

    /**
     * Check is it root category
     *
     * @return bool
     */
    protected function isRoot() : bool
    {
        return $this->id === BlogCategory::ROOT;
    }

//    /**
//     * Example of usage Accessor
//     *
//     * @param $valueFromObject
//     * @return bool|false|mixed|string|string[]|null
//     */
//    public function getTitleAttribute($valueFromObject)
//    {
//        return mb_strtoupper($valueFromObject);
//    }
//
//    /**
//     * Example of usage Mutator
//     *
//     * @param $incomingValue
//     */
//    public function setTitleAttribute($incomingValue)
//    {
//        $this->attributes['title'] = mb_strtolower($incomingValue);
//    }

    /**
     * Retrieve parent category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * Accessor
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title ?? (
            $this->isRoot() ? 'Root'
                : '????'
            );

        return $title;
    }



}
