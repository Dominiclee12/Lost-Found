@extends('layouts.apps')

@section('title')
    Found Catalog
@endsection

@section('content')
    <div class="container" style="padding-top:100px;">
        <h1 style="margin-bottom: 20px;">Catalog</h1>
        {!! Form::open(['action' => 'FoundController@catalog', 'method' => 'GET']) !!}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                        <option value="">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-8">
                <button type="submit" value="submit" class="btn btn-primary bottomright">Filter</button>
            </div>
        </div>
        {!! Form::close() !!}

        {{-- Found Post Listing --}}
        <div class="row">
            @forelse ($founds as $found)
                <div class="col-lg-3 col-md-3 all des">
                    <div class="product-item">
                        <a href="/founds/{{ $found->id }}"><img class="img-grayscale"
                                src="storage/found_images/{{ $found->images->first()->name }}"></a>
                        <div class="down-content">
                            <a href="/founds/{{$found->id}}"><h4>{{ $found->title }}</h4></a>
                        </div>
                    </div>
                </div>
            @empty
                No item is found.
            @endforelse
            {{-- @forelse($founds as $found)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <a href="/founds/{{ $found->id }}">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top img-grayscale" alt="Card image cap"
                                style="width:348px; height:232px; object-fit:cover; pointer-events: none;"
                                src="/storage/found_images/{{ $found->images->first()->name }}">
                            <div class="card-body">
                                {{ $found->title }}
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="container">
                    <p style="text-align: center">No found item posted.</p>
                </div>
            @endforelse --}}
        </div>
        {{ $founds->links('pagination::bootstrap-4') }}
    </div>
@endsection
