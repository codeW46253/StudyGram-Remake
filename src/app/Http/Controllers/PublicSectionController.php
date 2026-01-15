<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\PostController;
use App\Models\Post;

class PublicSectionController extends Controller
{
    public function index() {
        $posts = Post::orderBy("created_at","desc")->paginate(10);

        return view("public_section", [
            'posts' => $posts,
        ]);
    }
}
