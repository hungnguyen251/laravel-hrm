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
}
