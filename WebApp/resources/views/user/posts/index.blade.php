@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($posts)===0)
    <p>there are no posts!</p>
    @else
    <div class="row justify-content-center margin-bottom-md">
        <div class="col-md-12">
            <a href="{{ route('user.posts.create') }}" class="btn btn-primary float-right">Add</a>
        </div>

      </div>
    @foreach ($posts as $post)

    

    <div class="row justify-content-center margin-bottom-md">
        <div class="col-md-8">
                <div class="bg-sec font-colour-white padding-bottom-md">
                        <div data-id="{{$post->id }}">
                            <div class="h3 padding-md">{{$post->title }}</div>
                            <div class="h4 padding-bottom-md">{{$post->description }}</div>
                            <div class="p padding-bottom-md">{{$post->body }}</div>
                            <div class="p padding-bottom-md">{{$post->name }}</div>
                            <div class="padding-bottom-md">
                                <a href="{{ route('user.posts.show', $post->id) }}" class="button-main">View Posts</a>
                                </form>
                            </div>
                        </div>
                </div>
        </div>


        <!-- Side column -->


        <div class="col-md-4 bg-sec font-colour-white">
            <div data-id="{{$post->id }}">
                <div class="h3 padding-md">{{$post->title }}</div>
                <div class="h4 padding-md">{{$post->description }}</div>
                <!-- <div class="p padding-bottom-md">{{$post->body }}</div>
                <div class="p padding-bottom-md">{{$post->name }}</div> -->
                <div class="padding-md">
                    <a href="{{ route('user.posts.show', $post->id) }}" class="button-main">View Posts</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @endforeach
    @endif
    @endsection
    </div>
