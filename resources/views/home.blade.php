@extends('layouts.app')

@section('content')
    <div class="lg:flex lg:justify-center">
        <!-- side bar links -->
        <div class="lg:w-32">
            @include ('_sidebar-links')
        </div>

        <!-- tweet panel -->
        <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
            @include ('_publish-tweet-panel')


            <!-- side bar links -->
            <div class="border border-gray-300 rounded-lg">
                @foreach ($tweets as $tweet)
                    @include('_tweet')
                @endforeach
            </div>
        </div>

        <!-- friends list -->
        <div class="lg:w-1/6">
            @include ('_friends-list')
        </div>
    </div>
@endsection
