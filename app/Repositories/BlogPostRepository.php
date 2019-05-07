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
     * @return string
     */
    protected function getModelClass() : string
    {
        return Model::class;
    }

    /**
     * @return mixed
     */
    public function getAll()
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
            ->withTrashed()
            ->select($columns)
            ->orderBy('id', 'DESC')
//            ->with(['category', 'user']) // Запрос избыточен. Ниже верный вариант через анонимную функцию
            ->with([
                'category' => function($quey) {
//                dd($query);
                    $quey->select(['id', 'title']); // Один варинат через анонимную функцию
                },
                'user:id,name', // Второй вариант короче.
            ]);
        return $result;


    }
    /**
     * Retrieve list of articles for display as a list
     *
     * @param null $perPage
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null) : LengthAwarePaginator
    {
        return $this->getAll()
                ->where('deleted_at', null)
                ->paginate($perPage);
    }

    /**
     * Retrieve model for editing
     *
     * @param $id
     * @return Model
     */
    public function getEdit($id)
    {
        $result =  $this->startConditions()
            ->find($id);

        return $result;
    }

    public function getDeletedPost()
    {
        $result = $this->startConditions()
            ->find($id);
    }
}
