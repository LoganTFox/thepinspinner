@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ $pin->link }}" target="_blank">{{ $pin->link }}</a>
            </div>
            <div class="card-body flex">
                <h5 class="card-title">{{ $pin->title }}</h5>
                <a href="/pins/update/{{ $pin->id }}" class="btn btn-primary">Edit Pin</a>
                <a href="/pins/delete/{{ $pin->id }}" class="btn btn-danger">Delete Pin</a>
            </div>
        </div>
    </div>
@endsection