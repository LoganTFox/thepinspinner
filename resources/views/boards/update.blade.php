@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <form method="POST" action="/boards/update/{{ $board->id }}" class="col-sm-8">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="title">Board Name</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $board->title }}">
            </div>

            <div class="form-group">
                <label for="link">Board Link</label>
                <input type="text" class="form-control" id="link" name="link" value="{{ $board->link }}">
            </div>

            <div class="form-group">
                <label for="category_id">Choose a Category:</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Choose One...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($board->category->id == $category->id)
                                    selected
                                @endif
                        >{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update Board</button>

        </form>
    </div>
@endsection