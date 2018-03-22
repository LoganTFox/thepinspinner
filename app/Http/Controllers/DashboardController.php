<?php

namespace App\Http\Controllers;

use App\Board;
use App\Category;
use App\Pin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $boards = Board::where('user_id', '=', auth()->id())->get();

        $categories = Category::where('user_id', '=', auth()->id())->paginate(1);

        $pins = Pin::where('user_id', '=', auth()->id())->inRandomOrder()->get();

        return view('dashboard', [
            'boards' => $boards,
            'categories' => $categories,
            'pins' => $pins
        ]);
    }
}
