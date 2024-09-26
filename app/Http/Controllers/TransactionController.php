<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;


class TransactionController extends Controller
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
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1000',
            'transactionType' => 'required|in:1,2',
            'transactionCategory' => 'required|exists:transaction_categories,id',
        ], [
            'amount.min' => 'The transaction amount must be at least 1000.',
        ]);
        

        // Fetch the authenticated user and their wallets
        $customer = auth()->user();
        $wallet = $customer->wallets->first(); 
        

        // Create the transaction
        $transaction = new Transaction();
        $transaction->customer_id = $customer->id;
        $transaction->wallet_id = $wallet->id; // Assuming fetching the first wallet
        $transaction->transaction_type_id = $request->input('transactionType');
        $transaction->transaction_category_id = $request->input('transactionCategory');
        $transaction->amount = $request->input('amount');
        $transaction->date = now(); // Or set a specific date if needed

        $transaction->save();

        // Redirect back to the wallet details page or any other page as needed
        return redirect()->route('walletDetails', ['customer_id' => $customer->id, 'wallet_id' => $wallet->id])->with('success', 'Transaction added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
