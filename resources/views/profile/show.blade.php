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
                    <img class="avatar rounded-circle" src="../storage/profile_images/{{$user->image}}" alt="...">
                    <h5 class="title text-center">{{$user->name}}</h5>
                </div>
                <div class="text-center">
                    <a href="/profiles/{{$user->id}}/edit" class="btn btn-primary btn-round">Edit Profile</a>
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
                <form>
                    <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" value="{{$user->name}}" disabled>
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
                        <input type="text" class="form-control" placeholder="Phone" value="{{$user->phone}}" disabled>
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
                </form>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
</div>
    {{-- <div class="container">
        <h1>My Profile</h1>
        <div class="col-md-4">
            <div class="card">
                <img class="avatar border-gray" src="/storage/profile_images/{{$user->image}}" alt="...">
                <div class="card-body">
                    <h5>{{$user->name}}</h5>
                    <h6>{{$user->email}}</h6>
                    <h6>{{$user->phone}}</h6>
                    <a href="/profiles/{{$user->id}}/edit/" class="btn btn-primary float-right">Edit Profile</a>
                </div> 
            </div>
        </div>
    </div> --}}
@endsection