<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\UserWallet;
use App\Models\Transaction;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\Customer;
use App\Models\TransactionCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
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
     * @param  \App\Http\Requests\StoreWalletRequest  $request
     * @return \Illuminate\Http\Response
     */

     public function store(StoreWalletRequest $request)
     {
         // Validate incoming request data
         $request->validate([
             'wallet_name' => 'required|string|max:255',
         ]);
     
         // Create a new wallet record in wallets table
         $wallet = new Wallet();
         $wallet->name = $request->wallet_name;
         $wallet->save();
     
         // Get the current authenticated customer
         $currentCustomer = Auth::user();
     
         // Determine if any customers were selected
         $selectedCustomers = $request->input('customer_ids', []);
         
     
         if (empty($selectedCustomers)) {
             // If no customers selected, only add the current customer with role_id 1
             $userWallet = new UserWallet();
             $userWallet->customer_id = $currentCustomer->id;
             $userWallet->wallet_id = $wallet->id;
             $userWallet->role_id = 1; // Role_id 1 for current customer
             $userWallet->save();
         } else {
             // Add selected customers with role_id 3 and current customer with role_id 1
             foreach ($selectedCustomers as $customerId) {
                 // Skip adding the current customer again if already included via multiselect
                 if ($customerId == $currentCustomer->id) {
                     continue;
                 }
     
                 // Create a new entry in user_wallets table
                 $userWallet = new UserWallet();
                 $userWallet->customer_id = $customerId;
                 $userWallet->wallet_id = $wallet->id;
                 $userWallet->role_id = 3; // Role_id 3 for selected customers
                 $userWallet->save();
             }
     
             // Add the current customer with role_id 1
             $userWallet = new UserWallet();
             $userWallet->customer_id = $currentCustomer->id;
             $userWallet->wallet_id = $wallet->id;
             $userWallet->role_id = 1; // Role_id 1 for current customer
             $userWallet->save();
         }
     
         // Redirect to a relevant page with success message
         return redirect()->route('customer.wallet', ['id' => Auth::id()])->with('success', 'Wallet created successfully.');
     }
     

    public function walletForm()
    {
        // dd(session()->getId(), session()->all());
        $current_customer = Auth::user();
        $customers = Customer::all();

        return view('walletForm')->with('current_customer', $current_customer)->with('customers', $customers);
        // $customer = Customer::find($id);
        // $customer_name = $customer->username;
        // return view('walletForm')->with('customers', $customers)->with('customer', $customer)->with('current_customer', $current_customer)->with('cek_id', $cek_id)->with('customer_name', $customer_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function showDetails($customer_id , $wallet_id)
    {
        //wallet info
        $wallet = Wallet::find($wallet_id);

        //member info
        $members = UserWallet::where('wallet_id', $wallet_id)->get();
        $member_ids = $members->pluck('customer_id');
        $memberDetails = Customer::whereIn('id', $member_ids)->get();

        
        //transactions info
        // income transactions
        $transactions = Transaction::where('wallet_id', $wallet_id)->get();
        $incomeTransactions = $transactions->filter(function($transaction) {
            return $transaction->transaction_type_id == 1;
        })->values();

         // Calculate total income
        $totalIncome = $incomeTransactions->sum('amount');


        // ngambil data transaction yang related sama wallet_id tsb
        $incomeCategoryIds = $incomeTransactions->pluck('transaction_category_id')->unique();

        // Fetch nama categorynya
        $income_categories = DB::table('transaction_categories')->whereIn('id', $incomeCategoryIds)->pluck('name', 'id');

        
        //outcome transactions
        $outcomeTransactions = $transactions->filter(function($transaction) {
            return $transaction->transaction_type_id == 2;
        })->values();

        // Calculate total outcome
        $totalOutcome = $outcomeTransactions->sum('amount');

        // ngambil data transaction yang related sama wallet_id tsb
        $outcomeCategoryIds = $outcomeTransactions->pluck('transaction_category_id')->unique();

        // Fetch nama categorynya
        $outcome_categories = DB::table('transaction_categories')->whereIn('id', $outcomeCategoryIds)->pluck('name', 'id');

        // ambil semua category untuk option di form transactions
        $all_categories = TransactionCategory::all();

        // Calculate balance
        $balance = number_format($totalIncome - $totalOutcome, 0, ',', '.');

        return view('walletDetails', compact('wallet', 'memberDetails', 'transactions', 'balance' ,'incomeTransactions', 'outcomeTransactions', 'income_categories', 'outcome_categories', 'all_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWalletRequest  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
