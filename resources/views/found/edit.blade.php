@extends('layouts.master')

@section('title')
    Edit Found Post
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
                        <h4 class="card-title">Edit Found Post</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['action' => ['FoundController@update', $found->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{ Form::label('title', 'Item Name') }}
                            {{ Form::text('title', $found->title, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('category', 'Category') }}
                            {{ Form::select('category', $categories, $found->category->id, ['class' => 'form-control col-6', 'placeholder' => 'Pick a category']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('brand', 'Brand') }}
                            {{ Form::text('brand', $found->brand, ['class' => 'form-control col-6']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('color', 'Color') }}
                            {{ Form::select('color', $colors, $found->color, ['placeholder' => 'Pick a color...', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('location', 'Found Location') }}
                            {{ Form::text('location', $found->location, ['class' => 'form-control col-6']) }}
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

                        {{ Form::label('images', 'Upload Image:') }}
                        {{ Form::file('images[]', ['multiple' => 'multiple'], ['class' => 'form-control']) }} <br>
                        <small style="color: red;">Please note that once update photo, all previous photos will be
                            removed.</small>

                        {{ Form::hidden('_method', 'PUT') }}
                        <div class="form-group">
                            <div class="float-right" style="margin: 10px 1px;">
                                <a type="button" href="/founds"
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
