@extends('layouts.apps')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="container" style="padding-top: 100px;">
        @include('inc.messages')
        <div class="main-panel" id="main-panel">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Edit Profile</h2>
                        </div>
                    </div>
                    {{-- Profile Picture --}}
                    <div class="col-md-4">
                        {!! Form::open(['action' => ['ProfileController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <img src="/storage/profile_images/{{ $user->image }}" style="width: 300px; height: 300px; border-radius: 50%; object-fit: cover; margin-bottom: 15px;display: block; border-style: groove;
                                    margin-left: auto;
                                    margin-right: auto;" alt="...">
                                    <input type="file" name="image">
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
                                            {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Username']) }}
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <fieldset>
                                            <label>Gender</label>
                                            {{ Form::select('gender', ['' => 'Select Gender', 'Male' => 'Male', 'Female' => 'Female'], $user->gender, ['class' => 'form-control']) }}
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom: 15px;">
                                        <fieldset>
                                            <label>Faculty</label>
                                            {{ Form::select('faculty', ['' => 'Select Faculty', 'FEP' => 'FEP', 'FF' => 'FF', 'FKAB' => 'FKAB', 'FPI' => 'FPI', 'FP' => 'FP', 'FPEND' => 'FPEND', 'FPERG' => 'FPERG', 'FSK' => 'FSK', 'FST' => 'FST', 'FSSK' => 'FSSK', 'FTSM' => 'FTSM', 'FUU' => 'FUU'], $user->faculty, ['class' => 'form-control']) }}
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <label>Phone Number</label>
                                            {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Phone']) }}
                                        </fieldset>
                                    </div>
                                    {{ Form::hidden('_method', 'PUT') }}
                                </div>
                                <div class="form-group float-right">
                                    <a href="/profiles/{{ $user->id }}" class="btn btn-secondary">Back</a>
                                    <button type="submit" value="submit"
                                        class="btn btn-success">Update</button>
                                </div>
                                {!! Form::close() !!}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
