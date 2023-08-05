@extends('layout.layout')

@section('content')

<div class="container py-4">
    <div class="row">
        @include('includes.left-sidebar')
        <div class="col-6">
                @include('includes.success-message')
                <div class="mt-3">
                    @include('includes.tweet-card')
                </div>
        </div>
        <div class="col-3">
            @include('includes.search-bar')
            @include('includes.follow-box')
        </div>
    </div>
</div>


@endsection
