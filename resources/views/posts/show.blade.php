@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row px-5">
        <div class="col-8 pt-5">
            <img src="/storage/{{ $post->image }}" class="w-100 px-5">
        </div>
        <div class="col-4 pt-5">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px;">
                    </div>
                    <div>
                        <div>
                            <div class="simpleFollowButton d-flex">
                                <strong>
                                    <a class="text-dark" href="/profile/{{ $post->user->id }}">
                                        {{ $post->user->username }}
                                    </a>
                                </strong>
                                @if(Auth::user() && Auth::user()->id !== $post->user->id || !Auth::user())

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

                <hr>

                <div>
                    <div class="mt-2 mb-2 likeCounterBesideHeart">
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
                    <span>
                        <strong>
                            <a class="text-dark pr-2" href="/profile/{{ $post->user->id }}">
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
@endsection
