@extends('layout')

<link rel="stylesheet" href="styles\dashboard.css">

@section('content')

  
  <div>Welcome {{Auth::user()->username}}</div>
  {{-- <div>{{$transaction->customer_id}}</div>
  
  <div>{{$transaction_type->name}}</div>
  <div>{{$transaction->transactionType->name}}</div> --}}
  <div>test</div>
  {{-- <div>{{$wallet->name}}</div> --}}

  {{-- test transaction --}}
  {{-- <div>{{$transaction->name}}</div>
  <div>test</div> --}}
@endsection

