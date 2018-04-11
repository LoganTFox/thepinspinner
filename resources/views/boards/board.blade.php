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

        <br><br>

        <h3>Pins that belong to {{ $board->title }}</h3>
        <hr>

        <div class="row">
            <div class="col-md">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pin Name</th>
                        <th scope="col">Pin Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($pins->count() > 0)
                        @foreach($board->category->pins as $key => $pin)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $pin->title }}</td>
                                <td><a href="{{ $pin->link }}" target="_blank">{{ $pin->link }}</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">This Board Has No Pins</th>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection