<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $filter = strtolower($request->filter);

        if (empty($filter)) { return redirect('/'); }

        if(strpos($filter, 'prime')) { $filter = substr($filter, 0, strpos($filter, 'prime')-1); }

        return view('search', compact('filter'));
    }
}
