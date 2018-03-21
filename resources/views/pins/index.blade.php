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
        <h1>All Pins</h1>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pin Name</th>
                <th scope="col">Pin Link</th>
                <th scope="col">Category</th>
                <th scope="col">Manage</th>
            </tr>
            </thead>
            @foreach($pins as $key => $pin)
                <tbody>
                    <tr class="tableRow">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pin->title }}</td>
                        <td><a href="{{ $pin->link }}" target="_blank">{{ $pin->link }}</a></td>
                        <td>{{ $pin->category->title }}</td>
                        <td><a href="/pins/{{ $pin->id }}" class="btn btn-outline-secondary btn-sm rowButton">Manage</a></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection