<?php

namespace App\Http\Controllers\Admin;

use App\Models\Boutique;

class HomeController
{
    public function index()
    {

        $boutiques = Boutique::all();
        return view('home',compact('boutiques'));
    }
}
