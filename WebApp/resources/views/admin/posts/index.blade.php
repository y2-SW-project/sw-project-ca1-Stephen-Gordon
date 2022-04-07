@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($posts)===0)
    <p>there are no posts!</p>
    @else
    <div class="row justify-content-center margin-bottom-md">
        <div class="col-md-12">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right">Add</a>
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
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="button-main">View Post</a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="button-main">Edit</a>
                        <form style="display:inline-block" method="POST"
                            action="{{ route('admin.posts.destroy', $post->id) }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="form-cotrol button-main">Delete</a>
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

                <div class="">
                    <a href="{{ route('admin.posts.show', $post->id) }}" class="button-main">View Post</a>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="button-main">Edit</a>
                    <form style="display:inline-block" method="POST"
                        action="{{ route('admin.posts.destroy', $post->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-cotrol button-main">Delete</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @endforeach
    @endif
    @endsection
</div>
