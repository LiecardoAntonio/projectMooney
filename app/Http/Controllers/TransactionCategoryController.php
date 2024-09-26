<?php

namespace App\Http\Controllers;

use App\Models\TransactionCategory;
use App\Http\Requests\StoreTransactionCategoryRequest;
use App\Http\Requests\UpdateTransactionCategoryRequest;

class TransactionCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreTransactionCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionCategory $transactionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionCategory $transactionCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionCategoryRequest  $request
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionCategoryRequest $request, TransactionCategory $transactionCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionCategory $transactionCategory)
    {
        //
    }
}
