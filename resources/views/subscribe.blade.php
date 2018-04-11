<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

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

    <form method="POST" action="/subscribe" id="subscribe-form">
        {{ csrf_field() }}
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">User Info</h4>

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
            </div>

            <div class="mb-3">
                <label for="email">Password</label>
                <input type="password" class="form-control" id="password">
            </div>

            <hr class="mb-4">

            <h4 class="mb-3">Payment Info</h4>

            <div class="row">
                <div class="col-md-8 mb-3">
                    <label>Credit Card Number</label>
                    <input type="text" class="form-control" placeholder="4242 4242 4242 4242" data-stripe="number">
                </div>
                <div class="col-md-4 mb-3">
                    <label>CVC</label>
                    <input type="text" class="form-control" placeholder="123" data-stripe="cvc">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Expiration Month</label>
                    <input type="text" class="form-control" placeholder="08" data-stripe="exp-month">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Expiration Year</label>
                    <input type="text" class="form-control" placeholder="2020" data-stripe="exp-year">
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-outline-primary btn-lg btn-block" type="submit">Join Now</button>

        </div>
    </form>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('#subscribe-form').submit(function (e) {
            var form = $(this);

            form.find('button').prop('disabled', true);

            Stripe.card.createToken(form, function (status, response) {
                console.log(response);

                form.append($('<input type="hidden" name="cc_token">').val(response.id));

                form.get(0).submit();
            });

            e.preventDefault();
        })
    });
</script>
</body>
</html>
