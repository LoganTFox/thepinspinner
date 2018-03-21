@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <div style="display: flex">
            <h1 style="flex: 1">Dashboard</h1>
            <span>{{ $categories->links() }}</span>
        </div>
        <hr><br>
            @foreach($categories as $category)
            <h3>Category: {{ $category->title }}</h3>
            <br>
                @foreach($category->boards as $board)
                    <div class="col">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">{{ $board->title }}</th>
                                    <th scope="col">Pin Name</th>
                                    <th scope="col">Pin Link</th>
                                    <th scope="col">Added</th>
                                </tr>
                            </thead>
                                @foreach($pins as $key => $pin)
                                    <tbody>
                                        <tr class="tableRow">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $pin->title }}</td>
                                            <td><a href="{{ $pin->link }}" target="_blank">{{ $pin->link }}</a></td>
                                            <td>{{ $pin->created_at->toDayDateTimeString() }}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                        </table>
                    </div>
                    <div class="w-100"></div>
                @endforeach
            @endforeach
        <span style="float: right">{{ $categories->links() }}</span>
        </div>
@endsection