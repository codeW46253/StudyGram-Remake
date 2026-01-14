<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controller\PostController;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index() {
	$user = Auth::user();

	$posts = Post::where('user_id', $user->id)->latest()->get();

	return view('dashboard', [
            'username' => $user->name,
            'posts' => $posts,
        ]);

        // Placeholder credentials
        /*$username = "Zul";
        $posts = [
            (object)['title' => 'First Post', 'content' => 'This is a dummy post 1', 'created_at' => now()],
        ];

        return view('dashboard', compact('username', 'posts'));*/
    }
}
