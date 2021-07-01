@extends('layouts.master')

@section('title')
    Create Found Post
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
                        <h4 class="card-title">Create Found Post</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['action' => 'FoundController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{ Form::label('title', 'Item Name') }}
                            {{ Form::text('title', '', ['class' => 'form-control', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('category', 'Category') }}
                            {{ Form::select('category', $categories, null, ['class' => 'form-control col-6', 'placeholder' => 'Pick a category', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('brand', 'Brand') }}
                            {{ Form::text('brand', '', ['class' => 'form-control col-6', 'required']) }}
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('color', 'Color') }}
                                    {{ Form::select('color', $colors, null, ['placeholder' => 'Pick a color...', 'class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('location', 'Found Location') }}
                            {{ Form::text('location', '', ['class' => 'form-control col-6', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('fdate', 'Found Date') }}
                        </div>
                        <div style="padding-bottom:20px;">
                            {{ Form::date('fdate', \Carbon\Carbon::now()) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Description') }}
                            {{ Form::textarea('description', '', ['class' => 'form-control', 'required']) }}
                        </div>

                        {{ Form::label('images', 'Upload Image:') }}
                        {{ Form::file('images[]', ['multiple' => 'multiple'], ['class' => 'form-control', 'required']) }}

                        <div class="form-group">
                            <div class="float-right" style="margin: 10px 1px;">
                                <a type="button" href="{{ url()->previous() }}"
                                    class="btn btn-round btn-secondary">Cancel</a>
                                <button type="submit" value="submit" class="btn btn-round btn-primary">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
