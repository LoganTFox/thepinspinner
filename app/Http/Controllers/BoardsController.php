<?php

namespace App\Http\Controllers;

use App\Board;
use App\Category;
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
        $boards = Board::all();

        return view('boards.index', compact('boards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

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

        return view('boards.board', compact('board'));
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

        return view('boards.update', compact('board'));
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

        $board->save();

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

        return redirect('/boards');
    }

    public function twoFactor($id)
    {
        $board = Board::find($id);

        return view('boards.delete', compact('board'));
    }
}
