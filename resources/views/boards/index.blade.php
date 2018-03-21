@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <style>
        tr.tableRow:hover a.rowButton {
            display: inline-block;
            transition: .3s;
        }

        .rowButton {
            display: none;
        }
    </style>

    <div style="margin-top: 25px;" class="container">
        <h1>All Boards</h1>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Board Name</th>
                <th scope="col">Board Link</th>
                <th scope="col">Category</th>
                <th scope="col">Manage</th>
            </tr>
            </thead>
            @foreach($boards as $key => $board)
                <tbody>
                <tr class="tableRow">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $board->title }}</td>
                    <td><a href="{{ $board->link }}" target="_blank">{{ $board->link }}</a></td>
                    <td>{{ $board->category->title }}</td>
                    <td><a href="/boards/{{ $board->id }}" class="btn btn-outline-secondary btn-sm rowButton">Manage</a></td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection