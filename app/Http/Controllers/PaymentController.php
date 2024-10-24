<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Notifications\SendPaymentEmail;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::all();
        return $payment;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        $payment= new Payment;
        
        $payment->user_id=$request->user_id;
        $payment->order_id=$request->order_id;
        $payment->payment_type=$request->payment_type;
        $payment->amount=$request->amount;
        $payment->payment_status=$request->payment_status;
        // $payment->payment_total=$request->payment_total;
        $user = User::find($request->user_id); ///get user by user_id
        $user->notify(new SendPaymentEmail($user, $payment));
        $payment->save();
        return $payment;

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment = Payment::find($requst->payment_id);
        $payment->user_id=$request->user_id;
        $payment->payment_type=$request->payment_type;
        $payment->payment_status=$request->payment_status;
        $payment->payment_total=$request->payment_total;
        $payment->save();
        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
