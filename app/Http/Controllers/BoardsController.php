<?php

namespace App\Http\Controllers;

use App\Board;
use App\Category;
use App\Pin;
use Illuminate\Http\Request;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::where('user_id', '=', auth()->id())->get();

        return view('boards.index', compact('boards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('user_id', '=', auth()->id())->get();

        if ($categories->count() == 0) {

            flash('You must have at least one category before creating a board.')->info();

            return redirect()->back();
        }

        return view('boards.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $board = new Board;

        $board->title = $request->title;
        $board->link = $request->link;
        $board->category_id = $request->category_id;
        $board->user_id = auth()->id();

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'link' => 'required',
            'category_id' => 'required'
        ], [
            'title.required' => 'A board name is required',
            'link.required' => 'A board link is required',
            'category_id.required' => 'Must choose a category'
        ]);

        $board->save();

        flash('Board added successfully')->success();

        return redirect('/boards');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $board = Board::find($id);

        $pins = Pin::all();

        return view('boards.board', compact('board'), compact('pins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $board = Board::find($id);

        $categories = Category::where('user_id', '=', auth()->id())->get();

        return view('boards.update', compact('board'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $board = Board::find($id);

        $board->title = $request->title;
        $board->link = $request->link;
        $board->category_id = $request->category_id;

        $board->save();

        flash('Board updated successfully')->success();

        return redirect('/boards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        $board->delete();

        flash('Board deleted successfully')->error();

        return redirect('/boards');
    }

    public function twoFactor($id)
    {
        $board = Board::find($id);

        return view('boards.delete', compact('board'));
    }
}
