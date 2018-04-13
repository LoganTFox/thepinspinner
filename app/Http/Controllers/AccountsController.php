<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();

        $invoices = $user->invoices();

        return view('account', compact('user', 'invoices'));
    }

    public function updateSubscription(Request $request)
    {
        $user = $request->user();

        if ($user->subscribed('main') and $user->subscription('main')->onGracePeriod()) {
            $user->subscription('main')->resume();
        };

        flash('Account reactivation successful')->success();

        return redirect()->back();
    }

    public function updateCard(Request $request)
    {
        $user = $request->user();

        $token = $_POST['stripeToken'];

        $user->updateCard($token);

        flash('Card Updated Successfully')->success();

        return redirect()->back();
    }

    public function downloadInvoice($invoiceId)
    {
        return Auth::user()->downloadInvoice($invoiceId, [
            'vendor' => 'Pin Spinner',
            'product' => 'Monthly Subscription'
        ]);
    }

    public function deleteSubscription(Request $request)
    {
        $user = $request->user();

        $user->subscription('main')->cancel();

        return redirect()->back();
    }
}
