@extends('layouts.apps')

@section('title')
    Found Detail
@endsection

@section('content')
    <div class="container" style="padding-top: 100px;">
        @include('inc.messages')
        <h1 style="margin-bottom: 20px;">Found Detail</h1>
        <a type="button" href="{{ url()->previous() }}" class="btn btn-secondary float-right">Back</a>
        <div class="row">
            <div class="col-lg-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-left:10px;">
                    <ol class="carousel-indicators">
                        @for ($i = 0; $i < count($found->images); $i++)
                            @if ($i == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"
                                    class="active">
                                </li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to={{ $i }}>
                                </li>
                            @endif
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach ($found->images as $image)
                            @if ($loop->index == 0)
                                <div class="carousel-item active">
                                    <img class="d-block img-grayscale"
                                        style="pointer-events: none; height: 100%; width: 100%; object-fit: contain;"
                                        src="/storage/found_images/{{ $image->name }}" alt="...">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img class="d-block img-grayscale"
                                        style="pointer-events: none; height: 100%; width: 100%; object-fit: contain;"
                                        src="/storage/found_images/{{ $image->name }}" alt="...">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="now-ui-icons arrows-1_minimal-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="now-ui-icons arrows-1_minimal-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                Item Name:
                <h3 style="margin-bottom: 4px;">{{ $found->title }}</h3>
                Location Found:
                <h3 style="margin-bottom: 4px;">{{ $found->location }}</h3>
                Category:
                <h3 style="margin-bottom: 20px;">{{ $found->category->name }}</h3>
                {{-- Date Found:
                <h3 style="margin-bottom: 4px;">{{ $found->date }}</h3> --}}
                @auth
                    @if (Auth::user()->user_level != 'admin')
                        <h6 style="margin-bottom: 16px;">Is this your thing? Click the button below to claim your item.</h6>
                        <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#exampleModal">
                            Claim
                        </button>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    @include('claim.create')
@endsection
