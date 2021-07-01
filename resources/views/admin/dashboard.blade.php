@extends('layouts.master')

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <div class="panel-header panel-header-md">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon text-center">
                            <div class="card-icon">
                                <i class="material-icons" style="font-size: 48px; color:orange;">account_box</i>
                            </div>
                            <h3 class="info-title" style="margin-bottom:0; margin-top:10px;">{{ count($users) }}</h3>
                            <p class="card-category" style="font-size: 20px;">Total User</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats text-center">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons" style="font-size: 48px; color:red;">report_problem</i>
                            </div>
                            <h3 class="info-title" style="margin-bottom:0; margin-top:10px;">{{ count($losts) }}</h3>
                            <p class="card-category" style="font-size: 20px;">Total Lost</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats text-center">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons" style="font-size: 48px; color:blue;">search</i>
                            </div>
                            <h3 class="info-title" style="margin-bottom:0; margin-top:10px;">{{ count($founds) }}</h3>
                            <p class="card-category" style="font-size: 20px;">Total Found</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats text-center">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons" style="font-size: 48px; color:green;">check_circle_outline</i>
                            </div>
                            <h3 class="info-title" style="margin-bottom:0; margin-top:10px;">0</h3>
                            <p class="card-category" style="font-size: 20px;">Total Returned</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-5 col-md-5" style="margin: 10px 0px;">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title text-center">Monthly User Registered</h4>
                </div>
                <div class="card-body" style="height: 290px;">
                    {!! $muChart->container() !!}
                    {!! $muChart->script() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5" style="margin: 10px 0px;">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title text-center">Monthly Lost</h4>
                </div>
                <div class="card-body" style="height: 290px;">
                    {!! $mlChart->container() !!}
                    {!! $mlChart->script() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-lg-5 col-md-5" style="margin: 10px 0px;">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title text-center">Top Category Lost</h4>
                </div>
                <div class="card-body" style="height: 290px; width: 100%">
                    {!! $tcChart->container() !!}
                    {!! $tcChart->script() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5" style="margin: 10px 0px;">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title text-center">Top Faculties Lost</h4>
                </div>
                <div class="card-body" style="height: 290px; width: 100%">
                    {!! $tfChart->container() !!}
                    {!! $tfChart->script() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection
