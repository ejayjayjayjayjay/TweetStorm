@extends('layout.layout')

@section('content')
    <div class="container py-4">
        <div class="row">
            @include('includes.left-sidebar')
            <div class="col-6">
                @include('includes.success-message')
                <div class="mt-3">
                    @include('includes.user-card')
                </div>
                @forelse ($tweets as $tweet)
                    <div class="mt-3">
                        @include('includes.tweet-card')
                    </div>
                @empty
                    <p class="text-center mt-3">No Results Found.</p>
                @endforelse

                <div class="mt-3">
                    {{ $tweets->withQueryString()->links() }}
                </div>
            </div>
            <div class="col-3">
                @include('includes.search-bar')
                @include('includes.follow-box')
            </div>
        </div>
    </div>
@endsection
