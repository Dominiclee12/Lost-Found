@extends('layouts.apps')

@section('title')
    Lost & Found Management System | Search
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Welcome to Lost and Found!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section section-team text-center">
            <div class="container">
                <h2 class="title">Here is our mission</h2>
                <div class="team">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="../assets/img/avatar.jpg" alt="Thumbnail Image"
                                    class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Romina Hadid</h4>
                                <p class="category text-primary">Model</p>
                                <p class="description">You can write here details about one of your team members. You can
                                    give more details about what they do. Feel free to add some
                                    <a href="#">links</a> for people to be able to follow them outside the site.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="../assets/img/ryan.jpg" alt="Thumbnail Image"
                                    class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Ryan Tompson</h4>
                                <p class="category text-primary">Designer</p>
                                <p class="description">You can write here details about one of your team members. You can
                                    give more details about what they do. Feel free to add some
                                    <a href="#">links</a> for people to be able to follow them outside the site.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="../assets/img/eva.jpg" alt="Thumbnail Image"
                                    class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Eva Jenner</h4>
                                <p class="category text-primary">Fashion</p>
                                <p class="description">You can write here details about one of your team members. You can
                                    give more details about what they do. Feel free to add some
                                    <a href="#">links</a> for people to be able to follow them outside the site.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="title text-center">Recent Found Item</h3>
        <div class="container">
            <div id="search" class="input-group">
                <form class="form-inline" type="get" action="{{ route('search') }}">
                    <input type="search" name="search" value="" placeholder="Search for found item..."
                        class="form-control input-lg" />
                    <span class="input-group-btn pl-2">
                        <button id="bt" type="submit" class="btn btn-primary btn-icon btn-round"><i
                                class="now-ui-icons ui-1_zoom-bold"></i></button>
                    </span>
                </form>
            </div>
        </div>


        <div class="row">
            @forelse($founds as $found)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top img-grayscale" alt="Card image cap"
                            style="width:348px; height:232px; object-fit:cover;"
                            src="/storage/found_images/{{ $found->image }}">
                        <div class="card-body">
                            <p class="card-text">{{ $found->title }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="container">
                    <p style="text-align: center">No search result.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
