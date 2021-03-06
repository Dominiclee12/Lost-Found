@extends('layouts.master')

@section('title')
    Lost & Found Admin Dashboard | Category List
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Lost/Found Categories</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                <thead class=" text-primary">
                    <th>ID</th>
                    <th>Categories</th>
                    <th></th>
                </thead>
                <tbody>
                    @if(count($categories) > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td style="width:70%;">{{$category->name}}</td>
                                <td>
                                    {!! Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-round float-right', 'onclick' => "return confirm('Are you sure?')"])}}
                                    {!! Form::close() !!}
                                    <a href="/categories/{{$category->id}}/edit" class="btn btn-warning btn-round float-right">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        No category found
                    @endif
                </tbody>
                </table>
            </div>

            {{-- Create Category --}}
            {{$categories->links("pagination::bootstrap-4")}}
            {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::label('category', 'Add Category') }}
                    {{ Form::text('category', '', ['class' => 'form-control', 'placeholder' => 'e.g. Book & Stationary']) }}
                </div>

                <div class="form-group">
                    <button type="submit" value="submit" class="btn btn-primary btn-round float-right">Add</button>
                </div>
            {!! Form::close() !!}
            {{-- <a href="/categories/create" class="btn btn-primary">Add Category</a> --}}
            </div>
        </div>
        </div>
    </div>
@endsection