<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DiggingDipperController extends Controller
{
    public function collections()
    {
        $result = [];

        $eloquentCollection = BlogPost::withTrashed()->get();
        $collection = collect($eloquentCollection->toArray());
//        dd(
//            __METHOD__,
//            get_class($eloquentCollection),
//            get_class($collection),
//            $collection
//        );
        $result['where']['data'] = $collection
            //->where('category_id', 9)
            //->values()
            ->keyBy('id')
        ;

        $result['where']['count'] = $result['where']['data']->count();
        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
        $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();

        $result['map']['all'] = $collection->map(function (array $item) {
            $newItem = new \stdClass();
            $newItem->item_id = $item['id'];
            $newItem->itemTitle = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);

            return $newItem;
        }) ->keyBy('item_id');
        $result['map']['count'] = $result['map']['all']->count();
        $result['map']['isEmpty'] = $result['map']['all']->isEmpty();
        $result['map']['isNotEmpty'] = $result['map']['all']->isNotEmpty();
        $result['map']['not_exists'] = $result['map']['all']
            ->where('exists', '=', false)
            ->values()
            ->keyBy('item_id');
        dd($result);

    }
}
