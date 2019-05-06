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

    protected function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }

    /**
     * Retrieve parent category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title ?? (
            $this->isRoot() ? 'Root'
                : '????'
            );

        return $title;
    }



}
