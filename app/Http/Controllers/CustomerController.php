<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\UserWallet;
use App\Models\TransactionType;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', ['customers' => $customers]);
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
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //validation register new customer
        $validated = $request->validate([
            'username' => 'required|min:5|max:20',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:8|max:20',
        ]);

        //storing to database
        $customer = new Customer();
        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->save();

        //redirect & show success message
        return redirect()->route('loginForm')->with('success', 'registration successfull! Please log in.');
        // return redirect()->route('customer.detail', ['id'=>$customer->id])->with('success', true);
    }

    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        // dd($request);
        
        if (Auth::attempt([
            'email'=>$request['email'],
            'password'=>$request['password']
        ])){
            return redirect()->route('customer.wallet', ['id' => Auth::id()]);
        }

        // Authentication failed, redirect back with an error message
        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    //after login redirect to dashboard
    public function showDashboard()
    {   
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        // Remove all data from session
        Auth::logout();

        // Alternatively, you can use Session::flush() to clear all session data
        // Session::flush();

        // Redirect to the login page or home page
        return redirect()->route('loginForm');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        
    }

    public function loginForm()
    {
        return view('login');
    }

    public function registerForm()
    {
        return view('register');
    }

    public function showWallets($id)
    {
        //check all wallet
        // $wallets = UserWallet::all();

        //note: cara fetch dibawah manfaatin eloquent ORM (jadi relationship dari model harus dipastikan sudah bener, kalo gamau pusing pake konsep query selector sql lebih mudah karena relationship ga ngaruh)

        $wallets = UserWallet::where('customer_id', $id)->get(); //ambil data dari table user_wallets yang customer_id-nya == $id

        // isi dari $wallets adalah variable collection:
        // [{"customer_id":1,"wallet_id":1,"role_id":1,"created_at":"2024-05-31T06:35:28.000000Z","updated_at":"2024-05-31T06:35:28.000000Z"},{"customer_id":1,"wallet_id":2,"role_id":1,"created_at":"2024-05-31T06:35:28.000000Z","updated_at":"2024-05-31T06:35:28.000000Z"}]

        //retrieving wallet name yang associated with customer
        $wallet_ids = $wallets->pluck('wallet_id'); //pluck untuk ambil atau extract kolom wallet_id aja dari collection $wallets

        $wallet_names = Wallet::whereIn('id', $wallet_ids)->get(); //ambil data dari table wallets yang wallet_idnya == $wallet_ids

        $customer = Customer::find($id);

        return view('wallets')->with('wallet_ids', $wallet_ids)->with('wallet_names', $wallet_names)->with('customer', $customer)->with('wallets', $wallets);  
    }

    public function showWalletDetails($id)
    {
        //ini nanti parameternya harus dibedain biar mudah diliat untuk kedua id wallet dan customer, untuk skrng work karena id sama sama 1
        $customer = Customer::find($id);
        // $wallet = Wallet::find($id);
        // $transaction = Transaction::find($id);
        // $transaction_type = TransactionType::find($transaction->transaction_type_id);
        return view('dashboard')->with('customer', $customer);
        // return view('dashboard')->with('transaction', $transaction)->with('transaction_type', $transaction_type);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
