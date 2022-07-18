<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\User;

class PostController extends BaseController
{
    public function create_page()
    {
        if (!Session::get('id')) return redirect('login');
        return view("create");
    }

    public function do_create()
    {
        if (!Session::get('id')) return redirect('home');

        $post = new Post;
        $post->autore = Session::get("id");
        $post->titolo = request("titolo");
        $post->contenuto = request("contenuto");
        $post->save();

        return redirect("home")->with("success", "Post creato con successo!");
    }

    public function fetch_all()
    {
        if (!Session::get('id')) return [];

        $array = [];
        $post_s = Post::orderBy('id', 'desc')->get();
        foreach ($post_s as $row) {
            $user = User::where('id', $row['autore'])->first();

            $array[] = array(
                "id" => $row["id"],
                "autore" => $user->username,
                "titolo" => $row["titolo"],
                "contenuto" => $row["contenuto"]
            );
        }

        return $array;
    }

    public function profile_page()
    {
        if (!Session::get('id')) return redirect('login');
        return view("profile");
    }

    public function my_posts()
    {
        if (!Session::get('id')) return redirect('login');
        $array = [];
        $post_s = Post::where('autore', Session::get('id'))->orderBy('id', 'desc')->get();
        foreach ($post_s as $row) {
            $user = User::where('id', $row['autore'])->first();

            $array[] = array(
                "id" => $row["id"],
                "autore" => $user->username,
                "titolo" => $row["titolo"],
                "contenuto" => $row["contenuto"]
            );
        }
        return $array;
    }

    public function delete_post($id)
    {
        if (!Session::get('id')) return redirect('login');
        $post = Post::find($id);
        if ($post->autore != Session::get('id')) return redirect('home');
        $post->delete();
    }
}
