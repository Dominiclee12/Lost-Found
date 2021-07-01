@extends('layouts.master')

@section('title')
    User List
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
                        <h4 class="card-title">User Lists</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Faculty</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    @if (Auth::user()->user_level != 'user')
                                        <th>Actions</th>
                                    @endif
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td><a href="/profiles/{{ $user->id }}">{{ $user->name }}</a></td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->faculty }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->phone }}</td>
                                            @if (Auth::user()->user_level != 'user')
                                                <td>
                                                    {!! Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'POST']) !!}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-round btn-icon"
                                                        onClick="return confirm('Are you sure?')"><i
                                                            class="now-ui-icons ui-1_simple-remove"></i></button>
                                                    {!! Form::close() !!}
                                                </td>
                                            @endif
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
                    targets: 6
                }]
            });
        });
    </script>
@endsection
