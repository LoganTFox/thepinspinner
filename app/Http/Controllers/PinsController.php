<?php

namespace App\Http\Controllers;

use App\Board;
use App\Category;
use App\Pin;
use Illuminate\Http\Request;

class PinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pins = Pin::where('user_id', '=', auth()->id())->get();

        return view('pins.index', compact('pins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boards = Board::where('user_id', '=', auth()->id())->get();

        $categories = Category::where('user_id', '=', auth()->id())->get();

        return view('pins.create', compact('boards'), compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pin = new Pin;

        $pin->title = $request->title;
        $pin->link = $request->link;
        $pin->category_id = $request->category_id;
        $pin->user_id = auth()->id();

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'link' => 'required',
            'category_id' => 'required'
        ], [
            'title.required' => 'A pin name is required',
            'link.required' => 'A pin link is required',
            'category_id.required' => 'Must choose a category'
        ]);

        $pin->save();

        return redirect('/pins');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pin = Pin::find($id);

        return view('pins.pin', compact('pin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pin = Pin::find($id);

        $boards = Board::all();

        return view('pins.update', compact('pin'), compact('boards'));
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
        $pin = Pin::find($id);

        $pin->title = $request->title;
        $pin->link = $request->link;

        $pin->save();

        $pin->boards()->sync($request->boards);

        return redirect('/pins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pin $pin)
    {
        $pin->delete();

        return redirect('/pins');
    }

    public function twoFactor($id)
    {
        $pin = Pin::find($id);

        return view('pins.delete', compact('pin'));
    }
}
