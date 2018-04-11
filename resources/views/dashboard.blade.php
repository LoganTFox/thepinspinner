@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <div style="display: flex">
            <h1 style="flex: 1">Dashboard</h1>
        </div>
        <hr><br>
            <div class="row">
                <div class="col-md-9">
                    @foreach($categories as $category)
                        <h3>Category: {{ $category->title }}</h3>
                        <br>
                        <span>{{ $categories->links() }}</span>
                        @foreach($category->boards as $board)
                            <div class="col">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ $board->title }}</th>
                                        <th scope="col">Pin Name</th>
                                        <th scope="col">Pin Link</th>
                                        <th scope="col">Last Pinned</th>
                                        <th scope="col">Mark as Pinned</th>
                                    </tr>
                                    </thead>
                                    @foreach($category->pins as $key => $pin)
                                        <tbody>
                                        <tr class="tableRow">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $pin->title }}</td>
                                            <td><a href="{{ $pin->link }}" target="_blank">{{ $pin->link }}</a></td>
                                            @if($pin->pin_date)
                                                <td>{{ $pin->pin_date->toDayDateTimeString() }}</td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            <td>
                                                <form action="/pins/pin-date/{{ $pin->id }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}

                                                    <button type="submit" class="btn btn-outline-secondary btn-sm rowButton">Mark Pinned</button>
                                                </form>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <div class="w-100"></div>
                        @endforeach
                    @endforeach
                    <span style="float: left">{{ $categories->links() }}</span>
                </div>

                <div class="col-md-3">
                    <h3>Notes</h3>
                    <hr>
                    <form method="POST" action="/notes/create">
                        {{ csrf_field() }}

                        @if ($errors->any())
                            <div class="form-group alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="note">Add A Note</label>
                            <textarea class="form-control" id="note" name="note" placeholder="Leave a little note..." rows="4"></textarea>
                        </div>

                        <label>Add Tags</label>
                        <br>
                        @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}">
                                <label class="form-check-label">{{ $tag->name }}</label>
                            </div>
                        @endforeach

                        <br><br>

                        <button type="submit" class="btn btn-xs btn-outline-info">Add Note</button>

                    </form>

                    <hr>

                    @foreach($notes as $note)
                        <div class="card border-info mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <a href="{{ route('note.delete', ['id' => $note->id]) }}">X</a>
                            </div>

                            <div class="card-body">
                                <p class="card-text">{{ $note->note }}</p>
                            </div>

                            <div class="card-footer bg-transparent border-info">
                                @foreach($note->tags->pluck('name') as $tag)
                                    #{{ $tag }}
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection