<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends BaseController
{
    public function login_page()
    {
        if (Session::get('id')) return redirect('home');
        $error = Session::get('error');
        Session::forget("error");
        return view('login')->with('error', $error);
    }

    public function do_login()
    {
        if (Session::get('id')) return redirect('home');

        if (strlen(request('username')) == 0 || strlen(request('password')) == 0) {
            Session::put('error', 'campi_vuoti');
            return redirect('login')->withInput();
        }

        $user = User::where('username', request('username')) -> first();

        // if(!$user || !strcmp(request("password"), $user->password)) {
        //     Session::put('error', 'credenziali_errate');
        //     return redirect('login')->withInput();
        // }
        if (!$user || !password_verify(request('password'), $user -> password)) {
            Session::put('error', 'credenziali_errate');
            return redirect('login')->withInput();
        }

        Session::put('id', $user->id);
        return redirect('home');
    }

    public function signup_page()
    {
        if (Session::get('id')) return redirect('home');
        $error = Session::get('error');
        Session::forget ('error');
        return view("signup") -> with('error', $error);
    }

    public function do_signup()
    {
        if (Session::get('id')) return redirect('home');
        
        if
        (
            strlen(request('username')) == 0 ||
            strlen(request('email')) == 0 ||
            strlen(request('password')) == 0)
        {
            Session::put('error','campo_vuoto');
            return redirect('signup');
        }

        else if (User::where ('username', request('username'))->first()) {
            Session::put('error','username_esistente');
            return redirect('signup');
        }
        
        else if (User::where ('email', request('email'))->first()) {
            Session::put('error','email_esistente');
            return redirect('signup');
        }
        
        else if (!filter_var(request('email'), FILTER_VALIDATE_EMAIL)) {
            Session::put('error','email_non_valida');
            return redirect('signup');
        }

        else if (strlen(request('password')) < 8) {
            Session::put('error','password_non_valida');
            return redirect('signup');
        }
        
        // else if (!preg_match('/^[a-zA-Z0-9_]{1,15}$/', request ('username'))) {
        //     Session::put('error','username_non_valido');
        //     return redirect('signup');
        // }
        
        $user = new User;
        $user->username = request('username');
        $user->email = request('email');
        $user->password = password_hash(request('password'), PASSWORD_BCRYPT);
        $user->save();
        Session::put('id', $user->id);
        return redirect('home');
    }

    public function user_check(){
        $query = request();
        $bool = User::where('username',$query['query'])->exists();
        return ['exists'=>$bool];
    }

    public function email_check(){
        $query = request();
        $bool = User::where('email',$query['query'])->exists();
        return ['exists'=>$bool];
    }

    public function logout()
    {
        Session::flush();
        return redirect("login");
    }
}