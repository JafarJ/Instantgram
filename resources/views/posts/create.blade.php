@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" enctype="multipart/form-data" method="post">

        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1 class=" m-auto py-3">Add New Post</h1>
                </div>
                <hr>

                <div class="form-group row py-5">
                    <label for="caption" class="col-md-4 col-form-label"><strong class=" text-uppercase">Post Caption</strong></label>


                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                    @error('caption')
                    <strong>{{ $message }}</strong>
                    @enderror

                </div>
                <hr>

                <div class="row py-5">
                    <label for="image" class="col-md-4 col-form-label"><strong class=" text-uppercase">Post Image</strong></label>

                    <input type="file" class="form control-file" id="image" name="image">

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <hr>
                <div class="row pt-4">
                    <button class="btn btn-primary m-auto">Add New Post</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
