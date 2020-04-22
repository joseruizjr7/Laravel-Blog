<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // se elimino el constructor porque se esta aplicando directamente en la ruta
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* return view('admin.dashboard'); */
        if (auth()->user()->hasRole('Lector')) {
            return redirect(route('blog'));
        } else {
            return redirect(route('admin.posts.index'));
        }
        
        
    }
}
