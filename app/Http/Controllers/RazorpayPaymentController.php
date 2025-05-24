<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;

class RazorpayPaymentController extends Controller
{
    public function index()
    {
        return view('razorpay.index');
    }

    public function store(Request $request)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $payment = $api->payment->fetch($request->razorpay_payment_id);

        if ($payment->capture(['amount' => $payment->amount])) {
            // Payment successful
            return back()->with('success', 'Payment successful!');
        } else {
            return back()->with('error', 'Payment failed!');
        }
    }
}
