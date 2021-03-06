@extends('layouts.master')

@section('title')
    Lost & Found Admin Dashboard | Create Found Post
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Create Found Post</h4>
            </div>
            <div class="card-body">
                {!! Form::open(['action' => 'FoundController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', '', ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('category', 'Category') }}
                        {{ Form::select('category', $categories, null ,['class' => 'form-control col-6', 'placeholder' => 'Pick a category']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('brand', 'Brand') }}
                        {{ Form::text('brand', '', ['class' => 'form-control col-6']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('pcolor', 'Primary Color') }}
                        {{ Form::text('pcolor', '', ['class' => 'form-control col-3']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('scolor', 'Secondary Color') }}
                        {{ Form::text('scolor', '', ['class' => 'form-control col-3']) }} 
                    </div>

                    <div class="form-group">
                        {{ Form::label('flocation', 'Found Location') }}
                        {{ Form::text('flocation', '', ['class' => 'form-control col-6']) }} 
                    </div>

                    <div class="form-group">
                        {{ Form::label('fdate', 'Found Date') }}
                    </div>
                    <div style="padding-bottom:20px;">
                        {{ Form::date('fdate', \Carbon\Carbon::now()) }}
                    </div>
       
                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description', '', ['class' => 'form-control']) }}      
                    </div>

                    {{Form::file('image')}}

                    <div class="form-group">
                        <button type="submit" value="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                {!! Form::close() !!}
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