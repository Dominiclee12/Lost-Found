@extends('layouts.apps')

@section('title')
    My Profile
@endsection

@section('content')
    <div class="container" style="padding-top: 100px;">
        @include('inc.messages')
        <div class="main-panel" id="main-panel">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>My Profile</h2>
                        </div>
                    </div>
                    {{-- Profile Picture --}}
                    <div class="col-md-4">
                        <img src="../storage/profile_images/{{ $user->image }}" style="width: 300px; height: 300px; border-radius: 50%; object-fit: cover; margin-bottom: 15px;display: block; border-style: groove;
                                margin-left: auto;
                                margin-right: auto;" alt="...">
                        @if (!Auth::guest())
                            @if (Auth::user()->id == $user->id)
                                <div class="text-center">
                                    <a href="/profiles/{{ $user->id }}/edit" class="btn btn-primary btn-round">Edit
                                        Profile</a>
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form id="contact" action="" method="post">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <label>Email-Address</label>
                                            <input name="email" type="text" class="form-control" id="email"
                                                value="{{ $user->email }}" disabled>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <label>Username</label>
                                            <input name="name" type="text" class="form-control" id="name"
                                                value="{{ $user->name }}" disabled>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <fieldset>
                                            <label>Gender</label>
                                            <input name="gender" type="text" class="form-control" id="subject"
                                                value="{{ $user->gender }}" disabled>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <fieldset>
                                            <label>Faculty</label>
                                            <input name="faculty" type="text" class="form-control" id="subject"
                                                value="{{ $user->faculty }}" disabled>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <label>Phone Number</label>
                                            <input name="phone" type="phone" class="form-control" id="subject"
                                                value="{{ $user->phone }}" disabled>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container" style="margin-bottom: 30px; margin-top: 50px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-heading">
                                <h2>My Report Records</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="list-group">
                                @forelse($losts as $lost)
                                    <a href="/losts/{{ $lost->id }}"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">{{ $lost->title }}</h5>
                                            <small>{{ $lost->created_at->diffForHumans() }}</small>
                                        </div>
                                    </a>
                                @empty
                            </ul>
                            <div class="container">
                                <p style="text-align: center">No record.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
