@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center margin-bottom-md">
        <div class="col-md-8">
            <div class="card" data-id="{{$post->id }}">
                <div class="h3 padding-md">{{$post->title }}</div>
                <div class="h5 padding-md">{{$post->description }}</div>
                <div class="p padding-md">{{$post->body }}</div>
                <div class="p padding-md">{{$post->name }}</div>
            </div>
        </div>


        {{-- ADD COMMENT --}}


        <div class="col-lg-4 col-md-12 col-sm-12 ">
            <div class="card">
                <form method="POST" action="{{ route('admin.posts.storeComment')  }}">
                    <input type="hidden" name="_token" value="{{  csrf_token()  }}">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form font-colour-white form" id="title" name="title" value="{{ old('title') }}" />
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                       {{--  <input type="text" class="form-control " id="body" name="body" value="{{ old('body') }}" /> --}}
                       <textarea class="form font-colour-white form" id="body" rows="10" name="body" value="{{ old('body') }}" ></textarea>

                    </div>
                    <div class="form-group">
                        <label for="user_id"></label>
                        <input type="hidden" class="form-control" id="user_id" name="user_id"
                            value="{{ Auth::user()->id }}" />
                    </div>
                    <div class="form-group">
                        <label for="post_id"></label>
                        <input type="hidden" class="form-control" id="post_id" name="post_id" value="{{$post->id}}" />
                    </div>
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="hidden" class="form-control" id="name" name="name"
                            value="{{ Auth::user()->name }}" />
                    </div>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>

        </div>
    </div>


    <!-- Comment Section -->
    <div class="h6 font-colour-white padding-md">{{$count}} Comments</div>

    <div class="row justify-content-center margin-bottom-md margin-top-md">
        <div class="col-md-8">
            @foreach ($comments as $comment )

                <div class="card mb-3 margin-bottom-md" >
                    <div data-id="{{$comment->id }}">
                        <div class="h3 padding-md">{{$comment->title }}</div>
                        <div class="p padding-md">{{$comment->body }}</div>
                        <div class="p padding-bottom-md purple">{{$comment->name }}</div>

                    </div>

                </div>

            @endforeach
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="margin-md">
        <a href="{{ route('admin.posts.index') }}" class=" button-main">Back</a>
    </div>
</div>
@endsection
