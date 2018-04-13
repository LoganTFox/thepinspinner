@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <h1>{{ Auth::user()->name }}</h1>
        <hr>

        @if ($user->subscription('main')->onGracePeriod())
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    You have cancelled your account.<br> You have access to The Pin Spinner until {{ $user->subscription('main')->ends_at->format('F d, Y') }}
                    <br> <br>
                    <form action="/account/subscription" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-warning">Reactivate</button>
                    </form>
                </div>
            </div>
        @endif

        <form method="POST" action="/account/card" id="payment-form">
            {{ csrf_field() }}

            <div class="card">
                <div class="card-header">
                    <h4 class="mb-3">Update Card</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <div id="card-element">
                                <label>Credit Card Info</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div id="stripe-errors" role="alert"></div>

                    <div class="form-group">
                        <button class="btn btn-outline-primary" type="submit">Update Card</button>
                    </div>
                </div>
            </div>
        </form>

        <br><br>

        <div class="card">
            <div class="card-header">
                <h4 class="mb-3">Billing History</h4>
            </div>

            <div class="card-body">
                @if(count($invoices) > 0)
                    <table class="table table-bordered table-striped table-hover">
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                <td>{{ $invoice->total() }}</td>
                                <td><a href="/account/invoices/{{ $invoice->id }}" class="btn btn-outline-secondary btn-sm rowButton">Download</a></td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="jumbotron text-center">
                        <p>No Billing History</p>
                    </div>
                @endif
            </div>
        </div>

        <br><br>

        <form method="POST" action="/account/subscription">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <div class="form-group">
                <button class="btn btn-outline-danger" type="submit">Cancel Account</button>
            </div>
        </form>
    </div>
@endsection