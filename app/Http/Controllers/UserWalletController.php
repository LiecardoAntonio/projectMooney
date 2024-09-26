<?php

namespace App\Http\Controllers;

use App\Models\UserWallet;
use App\Http\Requests\StoreUserWalletRequest;
use App\Http\Requests\UpdateUserWalletRequest;

class UserWalletController extends Controller
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
     * @param  \App\Http\Requests\StoreUserWalletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserWalletRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserWallet  $userWallet
     * @return \Illuminate\Http\Response
     */
    public function show(UserWallet $userWallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserWallet  $userWallet
     * @return \Illuminate\Http\Response
     */
    public function edit(UserWallet $userWallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserWalletRequest  $request
     * @param  \App\Models\UserWallet  $userWallet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserWalletRequest $request, UserWallet $userWallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserWallet  $userWallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserWallet $userWallet)
    {
        //
    }
}
