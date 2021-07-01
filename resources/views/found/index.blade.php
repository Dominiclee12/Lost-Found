@extends('layouts.master')

@section('title')
    Found Post
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
                        <h4 class="card-title">Found Posts</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th width="15%">Image</th>
                                    <th>Item Name</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Date Found</th>
                                    <th>
                                        Actions
                                        <a href="/founds/create" class="btn btn-primary btn-icon btn-round float-right" style="height: 1.7rem;
                                        min-width: 1.7rem;
                                        width: 1.7rem;"><i
                                                class="now-ui-icons ui-1_simple-add"></i></a>
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($founds as $found)
                                        <tr>
                                            <td>{{ $found->id }}</td>
                                            <td><img width="70%" class="rounded mx-auto"
                                                    src="/storage/found_images/{{ $found->images->first()->name }}">
                                            </td>
                                            <td>{{ $found->title }}</td>
                                            <td>{{ $found->category->name }}</td>
                                            <td>{{ $found->location }}</td>
                                            <td>{{ $found->date }}</td>
                                            <td>
                                                <a href="/found-detail/{{ $found->id }}"
                                                    class="btn btn-info btn-round btn-icon float-left"><i
                                                        class="now-ui-icons design_bullet-list-67"></i></a>
                                                <a href="/founds/{{ $found->id }}/edit"
                                                    class="btn btn-warning btn-round btn-icon float-left"><i
                                                        class="now-ui-icons ui-1_settings-gear-63"></i></a>
                                                {!! Form::open(['action' => ['FoundController@destroy', $found->id], 'method' => 'POST']) !!}
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
                targets: [1, 6],
            }]
        });
    });
</script>
@endsection
