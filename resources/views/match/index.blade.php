@extends('layouts.master')

@section('title')
    Matching
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
                        <h4 class="card-title">Matching Lost & Found</h4>
                        <small>Please select an item to match possible lost owner.</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($founds as $found)
                                <div class="col-lg-2 col-md-3 col-sm-4 d-flex align-items-stretch">
                                    <div class="card shadow-sm">
                                        <a href="/matchs/{{ $found->id }}">
                                            <img class="card-img-top"
                                                src="/storage/found_images/{{ $found->images->first()->name }}"
                                                alt="Card image cap" style="height: 180px; object-fit: contain;">
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="card-body">No found records.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
                {{ $founds->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
