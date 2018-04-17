<html>
<head>

    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('assets/css/404.css') }}">

    <title>PinSpinner</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="ground-color">
<!-- Error Page -->
<div class="error">
    <div class="container margin-top">
        <div class="col-xs-12 text-center">
            <img src="{{ asset('assets/img/pslogo.png') }}" alt="The Pin Spinner">
            <div class="container-error-404">
                <div class="clip"><div class="shadow"><span class="digit thirdDigit"></span></div></div>
                <div class="clip"><div class="shadow"><span class="digit secondDigit"></span></div></div>
                <div class="clip"><div class="shadow"><span class="digit firstDigit"></span></div></div>
            </div>
            <h2 class="h1">Sorry! Page not found</h2>
            <a href="/" class="btn btn-outline-primary">Return to Homepage</a>
        </div>
    </div>
</div>
<!-- Error Page -->
<script src="{{ asset('assets/js/404.js') }}"></script>
</body>
</html>