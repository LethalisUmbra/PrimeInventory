<?php

namespace App\Http\Controllers;

class WeaponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* Primay Weapons */
    // public function rifle()
    // {
    //     return view('primary.rifle');
    // }

}