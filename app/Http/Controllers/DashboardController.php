<?php

namespace App\Http\Controllers;

use App\Board;
use App\Category;
use App\Note;
use App\Pin;
use App\Tag;
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

        $tags = Tag::all();

        $notes = Note::where('user_id', '=', auth()->id())->get();

        return view('dashboard', [
            'boards' => $boards,
            'categories' => $categories,
            'pins' => $pins,
            'tags' => $tags,
            'notes' => $notes
        ]);
    }
}
