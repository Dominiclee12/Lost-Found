@extends('layouts.apps')

@section('title')
    Edit Claim Detail
@endsection

@section('content')
    <div class="container" style="padding-top: 100px;">
        @include('inc.messages')
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 style="margin-bottom: 20px;">Edit Claim Detail</h1>
                {!! Form::open(['action' => ['ClaimController@update', $claim->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    <label>Question 1: When did you lose your stuff?</label>
                    <br>
                    {{ Form::date('question1', $claim->answer_one) }}
                </div>

                <div class="form-group">
                    <label>Question 2: What is the color of this item?</label>
                    {{ Form::select('question2', $colors, $claim->answer_two, ['placeholder' => 'Pick a color...', 'class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    <label>Question 3: Please describe more detail about this item.</label>
                    <input type="text" class="form-control" name="question3" value="{{ $claim->answer_three }}">
                </div>

                <div class="float-right">
                    <a type="button" href="/claims" class="btn btn-round btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-round btn-primary">Submit</button>
                </div>
                {{ Form::hidden('_method', 'PUT') }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
