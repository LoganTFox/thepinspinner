<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pin Spinner</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Sign Up For The Pin Spinner!</h2>
        <p class="lead"></p>
    </div>

    <form method="POST" action="/subscribe" id="payment-form">
        {{ csrf_field() }}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">User Info</h4>

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <hr class="mb-4">

            <div class="card">
                <div class="card-header">
                    <h4 class="mb-3">Payment Info</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <div id="card-element">
                                <label>Credit Card Info</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mb-4">

            <div id="stripe-errors" role="alert"></div>

            <div class="form-group">
                <button class="btn btn-outline-primary btn-lg btn-block" type="submit">Join Now</button>
            </div>

        </div>
    </form>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
@include('layouts.javascript')
</body>
</html>
