<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function account()
    {
        return view('admin.account');
    }

    public function token() {
        $random_token = Str::random(80);
        $current_user = Auth::user();
        $current_user->api_token = $random_token;
        $current_user->save();
        return redirect()->route("home");
    }
}
