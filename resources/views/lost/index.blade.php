@extends('layouts.master')

@section('title')
    Lost Report
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
                        <h4 class="card-title">Lost Reports</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Case Title</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($losts as $lost)
                                        <tr>
                                            <td>{{ $lost->id }}</td>
                                            <td>{{ $lost->title }}</td>
                                            <td>{{ $lost->category->name }}</td>
                                            <td>{{ $lost->location }}</td>
                                            <td>{{ $lost->date }}</td>
                                            <td>
                                                <a href="/losts/{{ $lost->id }}"
                                                    class="btn btn-info btn-round btn-icon float-left"><i
                                                        class="now-ui-icons design_bullet-list-67"></i></a>
                                                {!! Form::open(['action' => ['LostController@destroy', $lost->id], 'method' => 'POST']) !!}
                                                @if (Auth::user()->user_level == 'admin')
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    <button type="submit"
                                                        class="btn btn-danger btn-round btn-icon float-left"
                                                        onClick="return confirm('Are you sure?')"><i
                                                            class="now-ui-icons ui-1_simple-remove"></i></button>
                                                    {!! Form::close() !!}
                                                @endif
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
                    targets: 3
                }]
            });
        });
    </script>
@endsection
