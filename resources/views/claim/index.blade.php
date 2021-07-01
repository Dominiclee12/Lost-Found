@extends('layouts.apps')

@section('title')
    My Claim Requests
@endsection

@section('content')
    <div class="container" style="padding-top:100px;">
        @include('inc.messages')
        <h1 style="margin-bottom: 20px;">My Claim Requests</h1>
        <div class="list-group">
            @forelse ($claims as $claim)
                <a href="claims/{{ $claim->id }}"
                    class="list-group-item list-group-item-action d-flex justify-content-between">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">You are requesting lost claim on <strong>{{ $claim->found->title }}</strong>
                        </h6>
                        @if ($claim->status == 'Approved')
                            <h6 class="text-success">{{ $claim->status }}</h6>
                        @elseif ($claim->status == "Pending") <h6 class="text-warning">{{ $claim->status }}</h6>
                        @else <h6 class="text-danger">{{ $claim->status }}</h6>
                        @endif
                    </div>
                </a>
            @empty
                No claim found
            @endforelse
        </div>
    </div>
@endsection
