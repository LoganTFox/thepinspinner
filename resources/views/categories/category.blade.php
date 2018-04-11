@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->title }}</h5>
                <a href="/categories/update/{{ $category->id }}" class="btn btn-primary">Edit Category</a>
                <a href="/categories/delete/{{ $category->id }}" class="btn btn-danger">Delete Category</a>
            </div>
        </div>

        <br><br>

        <div class="row">
            <div class="col-md">
                <h3>Pins that belong to {{ $category->title }}</h3>
                <hr>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pin Name</th>
                        <th scope="col">Pin Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($category->pins->count() > 0)
                        @foreach($category->pins as $key => $pin)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $pin->title }}</td>
                                <td><a href="{{ $pin->link }}" target="_blank">{{ $pin->link }}</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">This Category Has No Pins</th>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="col-md">
                <h3>Boards that belong to {{ $category->title }}</h3>
                <hr>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Board Name</th>
                        <th scope="col">Board Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($category->boards->count() > 0)
                        @foreach($category->boards as $key => $board)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $board->title }}</td>
                                <td><a href="{{ $board->link }}" target="_blank">{{ $board->link }}</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">This Category Has No Boards</th>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection