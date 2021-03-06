@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Creating Report</h1>
        {!! Form::open(['action' => 'LostController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', '', ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('category', 'Category') }}
                {{ Form::select('category', $categories, null ,['class' => 'form-control col-3', 'placeholder' => 'Pick a category']) }}
            </div>

            <div class="form-group">
                {{ Form::label('brand', 'Brand') }}
                {{ Form::text('brand', '', ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('pcolor', 'Primary Color') }}
                {{ Form::text('pcolor', '', ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('scolor', 'Secondary Color') }}
                {{ Form::text('scolor', '', ['class' => 'form-control']) }} 
            </div>

            <div class="form-group">
                {{ Form::label('llocation', 'Lost Location') }}
                {{ Form::text('llocation', '', ['class' => 'form-control']) }} 
            </div>

            <div class="form-group">
                {{ Form::label('ldate', 'Lost Date') }}
                <div class="form-group">
                    <input type="text" name="ldate" class="form-control date-picker col-6" value="10/05/2016" data-datepicker-color="primary">
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description', '', ['class' => 'form-control']) }}      
            </div>

            <div class="form-group">
                <button type="submit" value="submit" class="btn btn-primary btn-round">Submit</button>
            </div>
        {!! Form::close() !!}
    </div>
@endsection