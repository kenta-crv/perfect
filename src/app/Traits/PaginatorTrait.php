<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

trait PaginatorTrait
{
    public function getPaginator(Request $request, $items)
    {
        $total = count($items);
        $page = $request->page ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;
        $items = array_slice($items, $offset, $perPage);

        return new Paginator($items, $total, $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query()
        ]);
    }

    public function isPagination($request)
    {
        $status = false;
        $result = [];

        $result_id = $request['id'] ?? null;
        $session_id = session('result_id');

        if($session_id != null && $result_id == $session_id){
            $status = true;
            $result = session('result');
        }

        return [
            'id' => $result_id,
            'status' => $status,
            'result' => $result
        ];
    }
}
