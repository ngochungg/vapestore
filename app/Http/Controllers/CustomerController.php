<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('front.customer.login');
    }

    public function create()
    {
        return view('front.customer.registration');
    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Customer  $customer
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Customer $customer)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\Customer  $customer
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Customer $customer)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Models\Customer  $customer
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Customer $customer)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\Customer  $customer
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Customer $customer)
//    {
//        //
//    }
}
