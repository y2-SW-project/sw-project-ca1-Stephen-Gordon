@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($posts)===0)
    <p>there are no posts!</p>
    @else
    <div class="row justify-content-center margin-bottom-md">
        <div class="col-md-12">
            <a href="{{ route('user.posts.create') }}" class="btn float-right">Add</a>
        </div>

    </div>
    @foreach ($posts as $post)



    <div class="row justify-content-center margin-bottom-md">
        <div class="col-md-8">
            <div class="card">
                <div data-id="{{$post->id }}">
                    <div class="h3 padding-md">{{$post->title }}</div>
                    <div class="h5 padding-bottom-md">{{$post->description }}</div>
                    <div class="p padding-bottom-md">{{$post->body }}</div>
                    <div class="p padding-bottom-md">{{$post->name }}</div>
                    <div class="padding-bottom-md">
                        <a href="{{ route('user.posts.show', $post->id) }}" class="button-main">View Post</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Side column -->


        <div class="col-md-4 ">
            <div class="card" data-id="{{$post->id }}">
                <div class="h3 margin-bottom-md">{{$post->title }}</div>
                <div class="h5 margin-bottom-md">{{$post->description }}</div>
                <div class="padding-md">
                    <a href="{{ route('user.posts.show', $post->id) }}" class="button-main">View Post</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @endforeach
    @endif
    @endsection
</div>
