@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div class="container" style="margin: 15%;">
        <div class="row justify-content-center">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Are You Sure You Want To Delete Pin {{ $pin->title }}?</div>
                <div class="card-body">
                    <h5 class="card-title">Warning</h5>
                    <p class="card-text">Deleting this pin can not be undone!</p>
                    <form action="/pins/delete/{{ $pin->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-warning">Delete Pin</button>
                    </form>
                    <a href="/pins/{{ $pin->id }}" class="btn btn-secondary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection