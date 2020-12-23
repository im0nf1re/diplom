<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ifns;
use App\Models\User;
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
        return view('home', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->firstname = $request->firstname;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->inn = $request->inn;
        $user->address = $request->address;
        $user->save();
        return redirect(route('home'));
    }
}
