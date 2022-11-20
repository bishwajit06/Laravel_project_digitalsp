<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // // Get the currently authenticated user...
        // $user = Auth::user();

        // // Get the currently authenticated user's ID...
        // $id = Auth::id();

        $request->validate([
            'payment_method' => ['required'],
            'payment_number' => ['required', 'string', 'max:255'],
            'transaction_id' => ['required', 'string', 'max:255']
        ],
        [
            'payment_method.required' => 'Please Select payment method',
        ]
    );

        $user = Auth::user();
        $payment = new Payment();

        $payment->user_id = $user->id;
        $payment->payment_method = $request->payment_method;
        $payment->payment_number = $request->payment_number;
        $payment->transaction_id = $request->transaction_id;
        $payment->save();

        $user->courses()->attach($request->courses);

        $payment->courses()->attach($request->courses);

        Toastr::success('Course Successfully Bought', 'Success');
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
