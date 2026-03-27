<?php
namespace App\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class AdvertHelper 
{
    public static function sortAdverts(Collection $adverts)
    {
        $promoted = $adverts->where('promote', 1)->sortByDesc('created_at');
        $notPromoted = $adverts->where('promote', 0)->sortByDesc('created_at');
        $sortedAdverts = $promoted->concat($notPromoted);

        return $sortedAdverts;
    }

    public static function paginateAdverts(Collection $collection, int $perPage = 5, string $pageName = 'page'): LengthAwarePaginator
    {
        $currentPage = request()->input($pageName, 1);
        $paginatedItems = $collection->forPage($currentPage, $perPage);
       
        return new LengthAwarePaginator(
            $paginatedItems,
            $collection->count(),
            $perPage,
            $currentPage,
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ]
        );
    }
}