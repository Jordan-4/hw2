<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class HomeController extends BaseController
{
    public function index()
    {
        if (!Session::get('id')) return redirect('login');
        $user = User::find(Session::get('id'));
        return view("home") -> with('username', $user->username);
    }
}