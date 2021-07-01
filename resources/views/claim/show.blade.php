@extends('layouts.apps')

@section('title')
    Claim Detail
@endsection

@section('content')
    <div class="container" style="padding-top: 100px;">
        @include('inc.messages')
        <h1 style="margin-bottom: 20px;">Claim Detail</h1>
        <a type="button" href="/claims" class="btn btn-secondary float-right">Back</a>
        <div class="row">
            <div class="col-lg-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for ($i = 0; $i < count($claim->found->images); $i++)
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
                        @foreach ($claim->found->images as $image)
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
                <h3>{{ $claim->found->title }}</h3>
                @if ($claim->status == 'Approved')
                    <h5 class="text-success">Approved</h5>
                @endif
                <br>
                <h6>When did you lose your stuff?</h6>
                <h5 style="margin-bottom: 15px;"><strong>{{ $claim->answer_one }}</strong></h5>
                <h6>What is the color of this item?</h6>
                <h5 style="margin-bottom: 15px;"><strong>{{ $claim->answer_two }}</strong></h5>
                <h6>Please describe more detail about this item.</h6>
                <h5 style="margin-bottom: 15px;"><strong>{{ $claim->answer_three }}</strong></h5>
            </div>
        </div>

        <hr>
        @if (!Auth::guest() && Auth::user()->id == $claim->user_id)
            <div class="row">
                <a href="/claims/{{ $claim->id }}/edit" class="btn btn-warning" style="margin-right: 10px;">Edit</a>
                {!! Form::open(['action' => ['ClaimController@destroy', $claim->id], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')", 'style' => 'margin-right: 10px;']) }}
                {!! Form::close() !!}
                @if ($claim->status == 'Approved')
                    <a class="btn btn-success" href="/claim-receipt/{{ $claim->id }}">Receipt</a>
                    {{-- <button type="button" class="btn btn-info ml-auto" data-toggle="modal" data-target="#exampleModal">Ship
                        to Me</button> --}}
                @endif
            </div>
        @endif
    </div>

    @include('claim.shipping')
@endsection
