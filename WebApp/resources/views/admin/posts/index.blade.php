@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($posts)===0)
    <p>there are no posts!</p>
    @else
    <div class="row margin-bottom-md">
        <div class="col-md-6">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right">Add Post</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('admin.advertisements.create') }}" class="btn btn-primary float-right">Add an Advertisement</a>
        </div>

    </div>





    <div class="row margin-bottom-md">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="card margin-bottom-md">
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
            @endforeach
        </div>


        <!-- Side column -->

        <div class="col-md-4">
            @foreach ($advertisements as $advertisement)
            <div class="Adcard margin-bottom-md" data-id="{{$advertisement->id }}">
                <div class="h3 margin-bottom-md">{{$advertisement->title }}</div>
                <div class="h5 margin-bottom-md">{{$advertisement->description }}</div>

                <div class="">
                    <a href="{{ route('admin.advertisements.show', $advertisement->id) }}" class="button-main">View Advertisement</a>
                    <a href="{{ route('admin.advertisements.edit', $advertisement->id) }}" class="button-main">Edit</a>
                    <form style="display:inline-block" method="POST"
                        action="{{ route('admin.posts.destroy', $post->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-cotrol button-main">Delete</a>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    @endif
    @endsection
</div>
