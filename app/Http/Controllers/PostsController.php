<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public $data = [];
    public $posts;

    public function __construct()
    {
        $this->middleware('auth');
        $this->posts = new Posts;
    }

    //
    public function index()
    {
        $this->data['posts'] = $this->posts->limit(50)->get();
        return view('pages.posts.posts',$this->data);
    }
    public function deletePost($postId = null)
    {
        # code...
    }
}
