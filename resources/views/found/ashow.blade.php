@extends('layouts.master')

@section('title')
    Found Detail
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
                        <h4 class="card-title">Found Detail</h4>
                        <a href="/founds" type="button" class="btn btn-default">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                                style="width:33%; margin-left:10px;">
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
                                                <img class="d-block" src="/storage/found_images/{{ $image->name }}"
                                                    alt="...">
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <img class="d-block" src="/storage/found_images/{{ $image->name }}"
                                                    alt="...">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <i class="now-ui-icons arrows-1_minimal-right"></i>
                                </a>
                            </div>
                            <div class="col-sm-7">
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Item Name:</dt>
                                    <dd class="col-sm-9">{{ $found->title }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Category:</dt>
                                    <dd class="col-sm-9">{{ $found->category->name }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Brand:</dt>
                                    <dd class="col-sm-9">{{ $found->brand }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Color:</dt>
                                    <dd class="col-sm-9">{{ $found->color }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Found Location:</dt>
                                    <dd class="col-sm-9">{{ $found->location }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Found Date:</dt>
                                    <dd class="col-sm-9">{{ $found->date }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Description:</dt>
                                    <dd class="col-sm-9">{{ $found->description }}</dd>
                                </dl>
                                @if ($found->status != 'Solved')
                                    <a href="/found-solve/{{ $found->id }}" type="button"
                                        class="btn btn-round btn-success float-right">Solve</a>
                                @else
                                    <a href="/found-unsolve/{{ $found->id }}" type="button"
                                        class="btn btn-round btn-success float-right">Unsolve</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
