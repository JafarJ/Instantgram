@extends('layouts.app')

@section('content')
<div class="container px-5">


    <!-- Individual posts to be repeated
        -->
    <div class="row pt-5">
        @if(request()->is('explore*'))
        <div class="col-6 d-inline-flex p-4">
            <a class="text-center m-auto link-unstyled {{ (request()->is('explore/top*')) ? 'active' : 'inactive' }} p-0" href="/explore/top">
                <h3><strong>Top</strong></h3>
            </a>
        </div>
        <div class="col-6 d-inline-flex p-4">
            <a class="text-center m-auto link-unstyled {{ (request()->is('explore/recent*')) ? 'active' : 'inactive' }} p-0" href="/explore/recent">
                <h3><strong>Recent</strong></h3>
            </a>
        </div>
        @endif
        @foreach($posts as $post)

        <div class=" col-4 pb-4">
            <a href="/post/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="w-100"></a>
        </div>

        @endforeach
        <!-- @foreach($posts as $post)
        <div class="row bg-white border mt-5">
            <div class="row m-0">
                <div class="d-flex align-items-center pl-3 pt-3">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px;">
                    </div>
                    <div>
                        <div class="exploreFollowButton d-flex">
                            <strong>
                                <a class="text-dark" href="/profile/{{ $post->user->id }}">
                                    {{ $post->user->username }}
                                </a>
                            </strong>
                            @if(Auth::user()->id !== $post->user->id)

                            @if(Auth::user()->following->contains($post->user->id))
                            @php
                            $follows = true;
                            @endphp
                            @else
                            @php
                            $follows = false;
                            @endphp
                            @endif
                            <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3 pb-3 m-0">
                <div class="w-100">
                    <a href="/profile/{{ $post->user->id }}"><img src="/storage/{{ $post->image }}" class="w-100 "></a>
                </div>
            </div>
            <div class="row pb-5 pl-3 m-0">
                <div class="pb-5">
                    <div class=" ">
                        <div class="mt-2 mb-2">


                            @if(Auth::user()->liked->contains($post->id))
                            @php
                            $liked = true;
                            @endphp
                            @else
                            @php
                            $liked = false;
                            @endphp
                            @endif
                            <like-post post-id="{{ $post->id }}" liked="{{ $liked }}" likes="{{ $post->likes->count() }}"></like-post>
                        </div>
                        <div>
                            <span>
                                <strong>
                                    <a class=" text-dark pr-2 font-weight-bold" href="/profile/{{ $post->user->id }}">
                                        {{ $post->user->username }}
                                    </a>
                                </strong>
                            </span>
                            {{ $post->caption }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach -->

    </div>
    <div class="row pt-5 ">
        <div class="pt-5 m-auto">

            {{ $posts->links() }}

        </div>
    </div>



</div>

@endsection
