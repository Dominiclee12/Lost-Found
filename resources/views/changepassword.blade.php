@extends('layouts.apps')

@section('title')
    Change Password
@endsection

@section('content')
    <div class="container" style="padding-top: 100px;">
        @include('inc.messages')
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 style="margin-bottom: 30px;">Change Password</h1>
                <div class="login_form_inner">
                    <form class="row login_form" action="{!! route('changepassword') !!}" method="POST" id="contactForm"
                        novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="current_password" id="current_password"
                                placeholder="Current Password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Current Password'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="new_password" id="new_password"
                                placeholder="New Password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'New Password'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="new_password_confirmation"
                                id="new_password_confirmation" placeholder="Confirm New Password"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm New Password'">
                        </div>
                        <div class="col-md-12">
                            <div class="float-right">
                                <a type="button" href="/home" class="btn btn-secondary">Cancel</a>
                                <button type="submit" value="submit" class="btn btn-success">Update</button>    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
