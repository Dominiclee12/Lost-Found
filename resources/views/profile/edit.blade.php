@extends('layouts.apps')

@section('content')
    <div class="container">
        <div class="main-panel" id="main-panel">
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
              <div class="row">
              <div class="col-md-4">
                  <div class="card card-user">
                      <div class="card-body">
                      <div class="author">
                        {!! Form::open(['action' => ['ProfileController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <img class="rounded-circle" src="../../storage/profile_images/{{$user->image}}" alt="...">
                            <input type="file" name="image">
                            <h5 class="title text-center">{{$user->name}}</h5>
                      </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-body">
                      <div class="card-title">
                          <h5 class="title">My Profile</h5>
                      </div>
                            <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                <label>Username</label>
                                {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Username']) }}
                                </div>
                            </div>
                            <div class="col-md-7 pl-1">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" placeholder="Email" value="{{$user->email}}" disabled>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                <label>Phone</label>
                                {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Phone']) }}
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>About Me</label>
                                <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike" disabled>Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                </div>
                            </div>
                            </div>
                            {{Form::hidden('_method', 'PUT')}}
                            <div class="form-group float-right">
                                <a href="/profiles/{{$user->id}}" class="btn btn-default btn-round">Back</a>
                                <button type="submit" value="submit" class="btn btn-primary btn-round">Update</button>
                            </div>
                        {!! Form::close() !!}
                      </div>
                  </div>
              </div>
              </div>
            </div>
            <footer class="footer">
              <div class=" container-fluid ">
                <nav>
                  <ul>
                    <li><a href="#">Lost & Found</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Blog</a></li>
                  </ul>
                </nav>
                <div class="copyright" id="copyright">
                  &copy; <script>
                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                  </script>, Designed by <a href="#">Invision</a>. Coded by <a href="#">Creative Tim</a>.
                </div>
              </div>
            </footer>
          </div>
        {{-- <h1>Edit Profile</h1>
        {!! Form::open(['action' => ['ProfileController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{Form::file('image')}}
            </div>

            {{Form::hidden('_method', 'PUT')}}
            <div class="form-group">
                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
            </div>
        {!! Form::close() !!} --}}
    </div>
@endsection
