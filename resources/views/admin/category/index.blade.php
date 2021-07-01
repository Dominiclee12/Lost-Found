@extends('layouts.master')

@section('title')
    Category List
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
                        <h4 class="card-title">Lost/Found Categories</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Categories</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td style="width:70%;">{{ $category->name }}</td>
                                            <td>
                                                <a href="/categories/{{ $category->id }}/edit"
                                                    class="btn btn-warning btn-round btn-icon float-left"><i
                                                        class="now-ui-icons ui-1_settings-gear-63"></i></a>
                                                {!! Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'POST']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-round btn-icon float-left"
                                                    onClick="return confirm('Are you sure?')"><i
                                                        class="now-ui-icons ui-1_simple-remove"></i></button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Create Category --}}
                        {{-- {{ $categories->links('pagination::bootstrap-4') }} --}}
                        {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{ Form::label('category', 'Add Category') }}
                            {{ Form::text('category', '', ['class' => 'form-control', 'placeholder' => 'e.g. Book & Stationery']) }}
                        </div>

                        <div class="form-group">
                            <button type="submit" value="submit" class="btn btn-primary btn-round float-right"
                                style="margin: 10px 1px;">Add</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            columnDefs: [{
                orderable: false,
                targets: 2
            }]
        });
    });
</script>
@endsection
