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
        $boards = Board::all();

        $categories = Category::paginate(1);

        $pins = Pin::inRandomOrder()->get();

        return view('dashboard', [
            'boards' => $boards,
            'categories' => $categories,
            'pins' => $pins
        ]);
    }
}
