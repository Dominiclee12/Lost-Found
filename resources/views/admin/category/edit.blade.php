@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Edit Category</h4>
            </div>
            <div class="card-body">
                {!! Form::open(['action' => ['CategoryController@update', $category->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{ Form::label('category', 'Category') }}
                        {{ Form::text('category', $category->name, ['class' => 'form-control']) }}
                    </div>

                    {{Form::hidden('_method', 'PUT')}}
                    <div class="form-group">
                        <button type="submit" value="submit" class="btn btn-primary">Update</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
@endsection
