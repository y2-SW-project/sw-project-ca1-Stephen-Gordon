@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center margin-bottom-md">
        <div class="col-md-8 card">
            <div data-id="{{$post->id }}">
                <div class="h3 padding-md">{{$post->title }}</div>
                <div class="h5 padding-md">{{$post->description }}</div>
                <div class="p padding-md">{{$post->body }}</div>
                <div class="p padding-md">{{$post->name }}</div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>


    {{-- ADD COMMENT --}}
    <form method="POST" action="{{ route('user.posts.storeComment')  }}">
        <input type="hidden" name="_token" value="{{  csrf_token()  }}">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control form" id="title" name="title" value="{{ old('title') }}" />
        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <input type="text" class="form-control " id="body" name="body" value="{{ old('body') }}" />
        </div>
      <a href="{{ route('user.posts.index') }}" class="btn btn-outline">Cancel</a>
      <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>

    <!-- Comment Section -->
    @foreach ($comments as $comment )

    <div class="row justify-content-center margin-bottom-md margin-top-md">
        <div class="col-md-8 card">
            <div data-id="{{$comment->id }}">
                <div class="h3 padding-md">{{$comment->title }}</div>
                <div class="p padding-md">{{$comment->body }}</div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    @endforeach
    <div class="margin-md">
        <a href="{{ route('user.posts.index') }}" class=" button-main">Back</a>
    </div>
</div>
@endsection
