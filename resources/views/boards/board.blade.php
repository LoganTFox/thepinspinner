@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ $board->link }}" target="_blank">{{ $board->link }}</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $board->title }}</h5>
                <a href="/boards/update/{{ $board->id }}" class="btn btn-primary">Edit Board</a>
                <a href="/boards/delete/{{ $board->id }}" class="btn btn-danger">Delete Board</a>
            </div>
        </div>
    </div>
@endsection