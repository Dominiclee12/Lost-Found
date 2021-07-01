@extends('layouts.master')

@section('title')
    Comparing Lost & Found
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
                        <h4 class="card-title">Comparing Lost & Found</h4>
                        <a href="/matchs/{{ $found->id }}" type="button" class="btn btn-default">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-5 mx-auto">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @for ($i = 0; $i < count($found->images); $i++)
                                            @if ($i == 0)
                                                <li data-target="#carouselExampleIndicators"
                                                    data-slide-to="{{ $i }}" class="active">
                                                </li>
                                            @else
                                                <li data-target="#carouselExampleIndicators"
                                                    data-slide-to={{ $i }}>
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
                            </div>
                        </div>
                        <div class="row">
                            {{-- Found Details --}}
                            <div class="col-sm-6">
                                <h3>Item Details</h3>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Title:</dt>
                                    <dd class="col-sm-9">{{ $found->title }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Category:</dt>
                                    <dd class="col-sm-9">{{ $found->category->name }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Brand:</dt>
                                    <dd class="col-sm-9">{{ $found->brand }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Color:</dt>
                                    <dd class="col-sm-9">{{ $found->color }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Found Location:</dt>
                                    <dd class="col-sm-9">{{ $found->location }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Found Date:</dt>
                                    <dd class="col-sm-9">{{ $found->date }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Description:</dt>
                                    <dd class="col-sm-9">{{ $found->description }}</dd>
                                </dl>
                            </div>
                            {{-- Lost Details --}}
                            <div class="col-sm-6">
                                <h3>Student Report</h3>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Title:</dt>
                                    <dd class="col-sm-9">{{ $lost->title }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Category:</dt>
                                    <dd class="col-sm-9">{{ $lost->category->name }}</dd>
                                </dl>
                                {{-- <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Brand:</dt>
                                    <dd class="col-sm-9">{{ $lost->brand }}</dd>
                                </dl> --}}
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Color:</dt>
                                    <dd class="col-sm-9">{{ $lost->color }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Lost Location:</dt>
                                    <dd class="col-sm-9">{{ $lost->location }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Lost Date:</dt>
                                    <dd class="col-sm-9">{{ $lost->date }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-3 text-md-right">Description:</dt>
                                    <dd class="col-sm-9">{{ $lost->description }}</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="/send-confirmation/{{ $found->id }}/{{ $lost->id }}"
                                class="btn btn-round btn-success btn-lg">Send Confirmation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
