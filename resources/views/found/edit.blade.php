@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Edit Found Post</h4>
            </div>
            <div class="card-body">
                {!! Form::open(['action' => ['FoundController@update', $found->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', $found->title, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('category', 'Category') }}
                        {{ Form::select('category', $categories, $found->category->id,['class' => 'form-control col-6', 'placeholder' => 'Pick a category']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('brand', 'Brand') }}
                        {{ Form::text('brand', $found->brand, ['class' => 'form-control col-6']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('pcolor', 'Primary Color') }}
                        {{ Form::text('pcolor', $found->primary_color, ['class' => 'form-control col-3']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('scolor', 'Secondary Color') }}
                        {{ Form::text('scolor', $found->secondary_color, ['class' => 'form-control col-3']) }} 
                    </div>

                    <div class="form-group">
                        {{ Form::label('flocation', 'Found Location') }}
                        {{ Form::text('flocation', $found->location, ['class' => 'form-control col-6']) }} 
                    </div>

                    <div class="form-group">
                        {{ Form::label('fdate', 'Found Date') }}
                    </div>
                    <div style="padding-bottom:20px;">
                        {{ Form::date('fdate', $found->date) }}
                    </div>
        
                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description', $found->description, ['class' => 'form-control']) }}      
                    </div>

                    {{Form::file('image')}}
                    
                    {{Form::hidden('_method', 'PUT')}}
                    <div class="form-group">
                        <button type="submit" value="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
@endsection