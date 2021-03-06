@extends('layouts.master')

@section('title')
    Lost & Found Admin Dashboard | Found Post
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Found Posts</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th width="15%">Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @if(count($founds) > 0)
                            @foreach ($founds as $found)
                                <tr>
                                    <td>{{$found->id}}</td>
                                    <td><img width="70%" class="rounded mx-auto" src="/storage/found_images/{{$found->image}}"></td>
                                    <td>{{$found->title}}</td>
                                    <td>{{$found->category->name}}</td>
                                    <td>
                                        {!! Form::open(['action' => ['FoundController@destroy', $found->id], 'method' => 'POST']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-round float-right', 'onclick' => "return confirm('Are you sure?')"])}}
                                        {!! Form::close() !!}
                                        <a href="/founds/{{$found->id}}/edit" class="btn btn-warning btn-round float-right">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            No post found
                        @endif
                    </tbody>
                    </table>
                </div>

                {{$founds->links("pagination::bootstrap-4")}}
                <a href="/founds/create" class="btn btn-primary btn-round float-right">Add Found Item</a>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
@endsection