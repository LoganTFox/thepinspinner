@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <form method="POST" action="/pins/update/{{ $pin->id }}" class="col-sm-8">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="title">Pin Name</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $pin->title }}">
            </div>

            <div class="form-group">
                <label for="link">Pin Link</label>
                <input type="text" class="form-control" id="link" name="link" value="{{ $pin->link }}">
            </div>

            @foreach($boards as $board)
                <div class="form-check form-check-inline">
                    <input name="boards[]"
                           @if($pin->boards->contains($board))
                               checked
                           @endif
                           value="{{ $board->id }}" class="form-check-input" type="checkbox" id="group">
                    <label class="form-check-label" for="gridCheck">
                        {{ $board->title }}
                    </label>
                </div>
            @endforeach

            <br><br>

            <button type="submit" class="btn btn-success">Update Pin</button>

        </form>
    </div>
@endsection