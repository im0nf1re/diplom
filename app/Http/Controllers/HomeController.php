<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Models\Ifns;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

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
        if (Auth::id() != 1)
            return redirect(route('main'));

        $user = Auth::user();
        $user->firstname = $request->firstname;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->inn = $request->inn;
        $user->address = $request->address;
        $user->save();
        return redirect(route('home'));
    }

    public function tables()
    {
        if (Auth::id() != 1)
            return redirect(route('main'));

        return view('tables', ['tables' => Table::all()]);
    }

    public function table($name)
    {
        if (Auth::id() != 1)
            return redirect(route('main'));

        $elems = DB::table($name)->get();

        $elems = $elems->toArray();
        foreach ($elems as &$elem)
            $elem = (array) $elem;

        return view('tables.table', [
            'fields' => Table::where(['code' => $name])->first()->fields()->get(),
            'elems' => $elems,
            'table' => Table::where(['code' => $name])->first()
        ]);
    }

    public function updateTable($name, Request $request)
    {
        $request = $request->toArray();

        $fields = [];
        foreach ($request as $k => $item)
        {
            if (in_array($k, ['_token', 'id', 'change', 'delete', 'add']))
                continue;

            $fields[$k] = $item;
        }

        if (isset($request['change']))
        {
            DB::table($name)
                ->where('id', $request['id'])
                ->update($fields);
        }

        if (isset($request['delete']))
        {
            DB::table($name)
                ->where('id', $request['id'])
                ->delete();
        }

        if (isset($request['add']))
        {
            DB::table($name)
                ->insert($fields);
        }

        return redirect('/tables/'.$name);
    }
}
