@extends('layouts.master')

@section('title')
    Edit Category
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
                        <h4 class="card-title">Edit Category</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['action' => ['CategoryController@update', $category->id], 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{ Form::label('category', 'Category') }}
                            {{ Form::text('category', $category->name, ['class' => 'form-control']) }}
                        </div>

                        {{ Form::hidden('_method', 'PUT') }}
                        <div class="form-group">
                            <div class="float-right" style="margin: 10px 1px;">
                                <a type="button" href="{{ url()->previous() }}"
                                    class="btn btn-round btn-secondary">Cancel</a>
                                <button type="submit" value="submit" class="btn btn-round btn-primary">Update</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
