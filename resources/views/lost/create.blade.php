@extends('layouts.apps')

@section('title')
    Create Lost Report
@endsection

@section('content')
    <div class="container" style="padding-top:100px;">
        @include('inc.messages')
        <h1 style="margin-bottom: 20px;">Creating Report</h1>
        {!! Form::open(['action' => 'LostController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('title', 'Case Title') }}
            {{ Form::text('title', '', ['class' => 'form-control', 'required']) }}
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Category') }}
            {{ Form::select('category', $categories, null, ['class' => 'form-control col-3', 'placeholder' => 'Pick a category', 'required']) }}
        </div>

        {{-- <div class="form-group">
            {{ Form::label('brand', 'Brand') }}
            {{ Form::text('brand', '', ['class' => 'form-control', 'required']) }}
        </div> --}}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('color', 'Color') }}
                    {{ Form::select('color', $colors, null, ['placeholder' => 'Pick a color...', 'class' => 'form-control', 'required']) }}
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('location', 'Lost Location') }}
            {{ Form::text('location', '', ['class' => 'form-control', 'required']) }}
        </div>

        <div style="padding-bottom: 15px;">
            {{ Form::label('ldate', 'Lost Date') }}
            <br>
            {{ Form::date('ldate', \Carbon\Carbon::now()) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Item Description') }}
            {{ Form::textarea('description', '', ['class' => 'form-control', 'required']) }}
        </div>

        <div class="form-group">
            <button type="submit" value="submit" class="btn btn-primary btn-round">Submit</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
