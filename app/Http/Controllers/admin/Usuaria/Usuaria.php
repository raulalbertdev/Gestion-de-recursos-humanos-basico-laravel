<?php

namespace App\Http\Controllers\admin\Usuaria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Usuaria extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('pages.usuaria.usuaria');
    }
}
