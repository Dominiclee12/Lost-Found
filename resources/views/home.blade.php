@extends('layouts.apps')

@section('title')
    Home
@endsection

@section('content')
    <div class="page-heading products-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Losing your belonging?</h4>
                        <h2>Please check out here!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Recent Found Items</h2>
                        <a href="/catalog"><span class="material-icons" style="color: black; ">
                            search
                        </span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($founds as $found)
                    <div class="col-lg-3 col-md-3 all des">
                        <a href="/founds/{{ $found->id }}">
                            <div class="product-item">
                                <img class="img-grayscale" src="storage/found_images/{{ $found->images->first()->name }}">
                                <div class="down-content">
                                    <a href="/founds/{{ $found->id }}">
                                        <h4>{{ $found->title }}</h4>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    No item is found.
                @endforelse
            </div>
            {{-- {{ $founds->links('pagination::bootstrap-4') }} --}}
        </div>
    </div>
@endsection
