<?php

namespace App\Http\Controllers\Api\v1\Site;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use function view;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return      Renderable
     */
    public function index(): Renderable
    {
        return view('home');
    }
}
