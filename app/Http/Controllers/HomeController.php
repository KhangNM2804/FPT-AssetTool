<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $user = User::findOrFail(Auth::user()->id);
        if ($user->hasRole(['staff', 'manager', 'admin'])) {
            return redirect(route('staff.dashboard.indexExpenseRoom'))->with('success', 'Đăng nhập thành công');
        } else {
            return redirect(route('client.borrow.borrows-client'))->with('success', 'Đăng nhập thành công');
        }
    }
}
