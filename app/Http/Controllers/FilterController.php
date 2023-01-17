<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function search(Request $request) 
    {
        $routeName = isset($request->route_name) ? $request->route_name : '';
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
        $routeName = $request->input('route') !== null ? $request->input('route') : '';
        $queryStringDefault = $request->input('query_default') !== null ? $request->input('query_default') : '';

        $qs = explode('&', $queryStringDefault);
        $filterMonth = '';

        foreach($qs as $str) {
            if(strpos($str, 'filter') !== false) {
                $filterMonth = $str;
            }
        }
            
        if ('-' == $orderBy) {
            $orderBy = '';

        } else {
            $orderBy = '-';
        }

        return redirect()->route($routeName, [
            'orderBy' => $orderBy,
            'sortBy' => $sortBy,
            'sort' => $orderBy . $sortBy,
            $filterMonth
        ]);
    }
}
