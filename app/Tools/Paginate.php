<?php
/**
 * Created by PhpStorm.
 * User: ethan
 * Date: 2017/7/24
 * Time: 22:37
 */

function paginate(\Illuminate\Http\Request $request, $data, $perPage)
{
    if ($request->has('page')) {
        $current_page = $request->get('page');
        $current_page = $current_page <= 0 ? 1 : $current_page;
    } else {
        $current_page = 1;
    }
    $item = array_slice($data, ($current_page - 1) * $perPage, $perPage); //注释1
    $total = count($data);
    $paginator = new \Illuminate\Pagination\LengthAwarePaginator($item, $total, $perPage, $current_page, [
        'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(), //注释2
        'pageName' => 'page',
    ]);
    $paginator->appends($request->query());
    return $paginator;
}