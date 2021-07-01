@extends('layouts.apps')

@section('title')
    Claim Receipt
@endsection

@section('content')
    <div class="container" style="padding-top: 100px;">
        <h1 style="margin-bottom: 20px;">Claim Receipt</h1>
        <a type="button" href="/claims/{{$claim->id}}" class="btn btn-round btn-secondary" style="margin-bottom: 20px;">Back</a>
        <div class="card w-75 mx-auto">
            <div class="card-body text-center">
                <h6>Kindly present this claiming receipt upon arrival.</h6>
                <hr>
            </div>
            <dl class="row">
                <dt class="col-sm-4 text-md-right">Claiming ID:</dt>
                <dd class="col-sm-8">{{ $claim->id }}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-4 text-md-right">Full Name:</dt>
                <dd class="col-sm-8">{{ $claim->user->name }}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-4 text-md-right">Faculty:</dt>
                <dd class="col-sm-8">{{ $claim->user->faculty }}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-4 text-md-right">Contact No:</dt>
                <dd class="col-sm-8">{{ $claim->user->phone }}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-4 text-md-right">E-mail:</dt>
                <dd class="col-sm-8">{{ $claim->user->email }}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-4 text-md-right">Item Number:</dt>
                <dd class="col-sm-8">{{ $claim->found->id }}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-4 text-md-right">Item Name:</dt>
                <dd class="col-sm-8">{{ $claim->found->title }}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-4 text-md-right">Approved Date:</dt>
                <dd class="col-sm-8">{{ $claim->updated_at->format('Y-m-d') }}</dd>
            </dl>
          </div> 
    </div>
@endsection
