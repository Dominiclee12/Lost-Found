@extends('layouts.master')

@section('title')
    Found Post
@endsection

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        {{-- Message --}}
        @include('inc.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Claim Request List</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($founds as $found)
                                @if (count($found->claims->where('status', 'Pending')) > 0)
                                    <div class="col-lg-2 col-md-3 col-sm-4 d-flex align-items-stretch">
                                        <div class="card shadow-sm">
                                            <a href="/claim-requests/{{ $found->id }}">
                                                <img class="card-img-top"
                                                    src="/storage/found_images/{{ $found->images->first()->name }}"
                                                    alt="Card image cap" style="height: 180px; object-fit: contain;">
                                            </a>
                                        </div>
                                        <div style="position: absolute;
                                                        top: 8px;
                                                        right: 16px;
                                                        font-size: 18px;
                                                        color: rgb(255, 0, 0);
                                                        font-weight: bold;">
                                            {{ count($found->claims->where('status', 'Pending')) }}
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="card-body">No found records.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
