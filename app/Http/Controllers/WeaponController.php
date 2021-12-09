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

    public function shotgun()
    {
        return view('primary.shotgun');
    }

    // public function bow()
    // {
    //     return view('primary.bow');
    // }

    // public function crossbow()
    // {
    //     return view('primary.crossbow');
    // }

}