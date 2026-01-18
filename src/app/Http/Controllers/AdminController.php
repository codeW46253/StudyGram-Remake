<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            if (!$user || !$user->isAdmin) {
                abort(403, 'Unauthorized access.');
            }

            return $next($request);
        });
    }

    public function index() {
        $users = User::orderBy('created_at','desc')->paginate(10);
        return view('admin.dashboard', [
            'users' => $users,
        ]);
    }
}
