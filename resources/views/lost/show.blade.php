@extends('layouts.apps')

@section('title')
    Lost Detail
@endsection

@section('content')
    <div class="container" style="padding-top: 100px;">
        @include('inc.messages')
        <h1 style="margin-bottom: 20px;">Lost Report Detail</h1>
        <a type="button" href="{{ URL::previous() }}" class="btn btn-secondary float-right">Back</a>

        <dl class="row">
            <dt class="col-sm-2 text-md-right">Case Title:</dt>
            <dd class="col-sm-10">{{ $lost->title }}</dd>
        </dl>
        <dl class="row">
            <dt class="col-sm-2 text-md-right">Category:</dt>
            <dd class="col-sm-10">{{ $lost->category->name }}</dd>
        </dl>
        {{-- <dl class="row">
            <dt class="col-sm-2 text-md-right">Brand:</dt>
            <dd class="col-sm-10">{{ $lost->brand }}</dd>
        </dl> --}}
        <dl class="row">
            <dt class="col-sm-2 text-md-right">Color:</dt>
            <dd class="col-sm-10">{{ $lost->color }}</dd>
        </dl>
        <dl class="row">
            <dt class="col-sm-2 text-md-right">Lost Location:</dt>
            <dd class="col-sm-10">{{ $lost->location }}</dd>
        </dl>
        <dl class="row">
            <dt class="col-sm-2 text-md-right">Lost Date:</dt>
            <dd class="col-sm-10">{{ $lost->date }}</dd>
        </dl>
        <dl class="row">
            <dt class="col-sm-2 text-md-right">Description:</dt>
            <dd class="col-sm-10">{{ $lost->description }}</dd>
        </dl>
        <dl class="row">
            <dt class="col-sm-2 text-md-right">Reported by:</dt>
            <dd class="col-sm-10">{{ $lost->user->name }}</dd>
        </dl>
        <dl class="row">
            <dt class="col-sm-2 text-md-right">Status:</dt>
            <dd class="col-sm-10">
                @if ($lost->status != 'Solved')
                    Unsolve
                @else
                    {{ $lost->status }}
                @endif
            </dd>
        </dl>

        @if (auth()->user()->user_level == 'user')
            <hr>
        @endif

        <div class="row">
            @if (!Auth::guest())
                @if (Auth::user()->id == $lost->user_id)
                    <a href="/losts/{{ $lost->id }}/edit" class="btn btn-warning btn-round"
                        style="margin-right: 10px;">Edit</a>
                    {!! Form::open(['action' => ['LostController@destroy', $lost->id], 'method' => 'POST']) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-round', 'onclick' => "return confirm('Are you sure?')", 'style' => 'margin-right: 10px;']) }}
                    {!! Form::close() !!}
                    @if ($lost->status != 'Solved')
                        <a href="/lost-solve/{{ $lost->id }}" type="button" class="btn btn-round btn-success">Solve</a>
                    @else
                        <a href="/lost-unsolve/{{ $lost->id }}" type="button"
                            class="btn btn-round btn-success">Unsolve</a>
                    @endif

                @endif
            @endif
        </div>
    </div>
@endsection
