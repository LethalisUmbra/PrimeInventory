<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function changeLocale(Request $request)
    {
        $request->validate([
            'locale' => 'required|in:es,en',
        ]);

        \Session::put('locale', $request->locale);

        return redirect()->back();
    }
}
