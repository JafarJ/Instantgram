@extends('layouts.app')

@section('content')
<div class="container d-flex px-5">


    <!-- Individual posts to be repeated
        -->
    <div class="col pt-3 ">
        @if(count($posts) === 0)
        <div class="row bg-white border mt-5">
            <div class="row m-0">
                <div class="d-flex align-items-center pl-3 pt-3">
                    <div class="pr-3">
                        <img src="images/instantgram.png" class="w-100 rounded-circle" style="max-width: 40px;">
                    </div>
                    <div>
                        <div>
                            <strong>
                                <a class="text-dark" href="#">
                                    Instantgram
                                </a>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3 pb-3 m-0">
                <div class="w-100">
                    <a href="#"><img src="images/addicting.png" class="w-100 "></a>
                </div>
            </div>
            <div class="row pb-5 pl-3 m-0">
                <div class="pb-5">
                    <div class=" ">
                        <div>
                            <span>
                                <strong>
                                    <a class=" text-dark pr-2 font-weight-bold" href="#">
                                        Instantgram
                                    </a>
                                </strong>
                            </span>
                            Heard it here first! Now go and follow people already!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @foreach($posts as $post)
        <div class="row bg-white border mt-5">
            <div class="row m-0">
                <div class="d-flex align-items-center pl-3 pt-3">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px;">
                    </div>
                    <div>
                        <div>
                            <strong>
                                <a class="text-dark" href="/profile/{{ $post->user->id }}">
                                    {{ $post->user->username }}
                                </a>
                            </strong>
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
                    <div>
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
        @endforeach
        <div class="row pt-5">
            <div class="col-12 pt-5">

                {{ $posts->links() }}

            </div>
        </div>
    </div>

    <div class="col-5 pt-5 pl-5 d-none d-lg-block">
        <div class="fixedUserDiv">
            <div class="d-flex align-items-center pt-5">
                <div class="pr-3">
                    <img src="{{ Auth::user()->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 60px;">
                </div>
                <div>
                    <div class="pl-3">
                        <strong class="row">
                            <a class="text-dark font-weight-bold" href="/profile/{{ Auth::user()->id }}">
                                {{ Auth::user()->username }}
                            </a>
                        </strong>
                        <span class="row">
                            <a class="text-dark" href="/profile/{{ Auth::user()->id }}">
                                {{ Auth::user()->name }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class=" w-100 pt-4 pl-2 pr-2">
                <span><strong>Biggest Instantgramers!</strong></span>
                <hr>
                @foreach($suggested as $suggestedUser)
                <div class="d-flex pt-1 pb-3">
                    <div class="pr-3">
                        <img src="{{ $suggestedUser->profileImage() }}" class="w-100 rounded-circle" style="max-width: 35px;">
                    </div>
                    <div>
                        <div class="pl-2">
                            <strong class="row">
                                <a class="text-dark font-weight-bold pt-2" href="/profile/{{ $suggestedUser->id }}">
                                    {{ $suggestedUser->user->username }}
                                </a>
                            </strong>
                        </div>
                    </div>
                    <div class="simpleFollowButton d-flex mr-0 pt-2 ml-auto">
                        @if(Auth::user()->id !== $suggestedUser->user->id)

                        @if(Auth::user()->following->contains($suggestedUser->user->id))
                        @php
                        $follows = true;
                        @endphp
                        @else
                        @php
                        $follows = false;
                        @endphp
                        @endif
                        <follow-button user-id="{{ $suggestedUser->user->id }}" follows="{{ $follows }}"></follow-button>
                        @endif
                    </div>
                </div>
                @endforeach
                <hr>
                <p style="">© 2020 MIT Instantgram from <a href="https://github.com/JafarJ" target="blank">Jafar.J</a></p>
            </div>
        </div>
    </div>


</div>

@endsection
