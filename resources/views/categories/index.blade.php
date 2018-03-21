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
        <h1>All Categories</h1>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Boards</th>
                <th scope="col">Pins</th>
                <th scope="col">Manage</th>
            </tr>
            </thead>
            @foreach($categories as $key => $category)
                <tbody>
                <tr class="tableRow">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->boards()->count() }}</td>
                    <td>{{ $category->pins()->count() }}</td>
                    <td><a href="/categories/{{ $category->id }}" class="btn btn-outline-secondary btn-sm rowButton">Manage</a></td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection