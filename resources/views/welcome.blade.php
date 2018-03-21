@extends('layouts.layout')

@section('content')
    <div class="content">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif
        <div class="title m-b-md">
            <a href="/dashboard">PinSpinner</a>
        </div>
    </div>
@endsection