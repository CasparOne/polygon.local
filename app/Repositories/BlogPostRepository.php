<?php


namespace App\Repositories;


use App\Models\BlogPost as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogPostRepository
 * @package Repositories
 */
class BlogPostRepository extends CoreRepository
{

    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Retrieve list of articles for display as a list
     *
     * @param null $perPage
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
//            ->with(['category', 'user']) // Запрос избыточен. Ниже верный вариант через анонимную функцию
            ->with([
                'category' => function($quey) {
//                dd($query);
                $quey->select(['id', 'title']); // Один варинат через анонимную функцию
                },
                'user:id,name', // Второй вариант короче.
            ])
            ->paginate($perPage);
        return $result;
    }
}