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
}
