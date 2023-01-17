<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function search(Request $request) 
    {
        $routeName = $request->route_name;
        $option = isset($request->option) ? $request->option : '';
        $keyword = isset($request->keyword) ? $request->keyword : '';

        return redirect()->route($routeName, [ 
            'filter['.$option.']' => $keyword,
        ]);
    }

    public function sort(Request $request) 
    {
        $orderBy = $request->input('orderBy') !== null ? $request->input('orderBy') : '';
        $sortBy = $request->input('sortBy') !== null ? $request->input('sortBy') : '';

        if ('-' == $orderBy) {
            $orderBy = '';

        } else {
            $orderBy = '-';
        }

        return redirect()->route('staffs.index', [
            'orderBy' => $orderBy,
            'sortBy' => $sortBy,
            'sort' => $orderBy . $sortBy
        ]);
    }
}
