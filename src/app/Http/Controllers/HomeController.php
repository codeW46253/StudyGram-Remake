<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index() {
        // Count today's post
        $todaysPostCount = Post::whereDate('created_at', Carbon::today()->toDateString())->count();
        $monthsPostCount = Post::whereMonth('created_at',Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        return view('home', compact('todaysPostCount', 'monthsPostCount'));
    }
}
