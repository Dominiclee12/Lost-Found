@extends('layouts.apps')

@section('title')
    Edit Lost Report
@endsection

@section('content')
    <div class="container" style="padding-top: 100px;">
        @include('inc.messages')
        <h1 style="margin-bottom: 20px;">Edit Report</h1>
        {!! Form::open(['action' => ['LostController@update', $lost->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('title', 'Case Title') }}
            {{ Form::text('title', $lost->title, ['class' => 'form-control', 'required']) }}
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Category') }}
            {{ Form::select('category', $categories, $lost->category->id, ['class' => 'form-control col-3', 'placeholder' => 'Pick a category', 'required']) }}
        </div>

        {{-- <div class="form-group">
            {{ Form::label('brand', 'Brand') }}
            {{ Form::text('brand', $lost->brand, ['class' => 'form-control', 'required']) }}
        </div> --}}

        <div class="form-group">
            {{ Form::label('color', 'Color') }}
            {{ Form::select('color', $colors, $lost->color, ['placeholder' => 'Pick a color...', 'class' => 'form-control', 'required']) }}
        </div>

        <div class="form-group">
            {{ Form::label('location', 'Lost Location') }}
            {{ Form::text('location', $lost->location, ['class' => 'form-control', 'required']) }}
        </div>

        <div style="padding-bottom: 15px;">
            {{ Form::label('ldate', 'Lost Date') }}
            <br>
            {{ Form::date('ldate', $lost->date) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Item Description') }}
            {{ Form::textarea('description', $lost->description, ['class' => 'form-control', 'required']) }}
        </div>

        {{ Form::hidden('_method', 'PUT') }}
        <div class="form-group">
            <a type="button" href="{{ url()->previous() }}" class="btn btn-round btn-secondary">Cancel</a>
            <button type="submit" value="submit" class="btn btn-success btn-round">Update</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
