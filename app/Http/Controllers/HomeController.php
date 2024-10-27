<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Document;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

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
        $count_tags = Tag::all()->count();
        $count_user = User::all()->count();
        $count_waiting = Document::all()->count();
        $count_document = Document::all()->count();

        return view('dashboard.index', compact('count_tags', 'count_user', 'count_document', 'count_waiting'));
    }
}
