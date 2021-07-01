{{-- Temporary no use --}}
@extends('layouts.master')

@section('title')
    Category List
@endsection

@section('content')
    {{-- Message --}}
    @include('inc.messages')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Creating Category</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{ Form::label('category', 'Category') }}
                        {{ Form::text('category', '', ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
