@extends('layouts.master')

@section('title')
    Claim Request
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
                        <h4 class="card-title">Claim Request</h4>
                        <a href="/approval" type="button" class="btn btn-default">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-sm-4">
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
                            <div class="col-sm-8">
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-2 text-md-right">Item Name:</dt>
                                    <dd class="col-sm-10">{{ $found->title }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-2 text-md-right">Category:</dt>
                                    <dd class="col-sm-10">{{ $found->category->name }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-2 text-md-right">Brand:</dt>
                                    <dd class="col-sm-10">{{ $found->brand }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-2 text-md-right">Color:</dt>
                                    <dd class="col-sm-10">{{ $found->color }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-2 text-md-right">Found Location:</dt>
                                    <dd class="col-sm-10">{{ $found->location }}</dd>
                                </dl>
                                <dl class="row" style="margin-bottom: 0;">
                                    <dt class="col-sm-2 text-md-right">Found Date:</dt>
                                    <dd class="col-sm-10">{{ $found->date }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-2 text-md-right">Description:</dt>
                                    <dd class="col-sm-10">{{ $found->description }}</dd>
                                </dl>
                            </div>
                        </div>

                        <ul class="list-group">
                            @forelse ($claims as $claim)
                                <li class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <strong>{{ $claim->user->name }}</strong>
                                        <small>{{ $claim->created_at->diffForHumans() }}</small>
                                    </div>
                                    Date Lost: {{ $claim->answer_one }}
                                    <br>
                                    Color Lost: {{ $claim->answer_two }}
                                    <br>
                                    Extra Description: {{ $claim->answer_three }}
                                    <div class="float-right">
                                        <a href="/claim-approve/{{ $claim->id }}"
                                            class="btn btn-link btn-success">Approve</a>
                                        <a href="/claim-reject/{{ $claim->id }}"
                                            class="btn btn-link btn-danger">Reject</a>
                                    </div>
                                </li>
                            @empty
                                No claim found
                            @endforelse
                        </ul>

                        {{ $claims->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
