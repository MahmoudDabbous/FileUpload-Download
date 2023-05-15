<?php

namespace App\Http\Controllers;

use App\Models\Type;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $types = Type::with('files')->get();

        return view('home', compact('types'));
    }
}
