<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Auth;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $сategories = DB::table('categories')->get();
        View::share('сategories', $сategories);
        $notifications = Auth::user()->notifications()->paginate(20);
        Auth::user()->markAsRead();
        return view('notifications.index', compact('notifications'));
    }
}