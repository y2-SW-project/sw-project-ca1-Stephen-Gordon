@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($posts)===0)
    <p>there are no posts!</p>
    @else
    @foreach ($posts as $post)
    <div class="row justify-content-center margin-bottom-md">
        <div class="col-md-12">

            <div class="bg-sec">


                <div class="row font-colour-white padding-bottom-md">
                    <div class="col-md-12">


                        <div data-id="{{$post->id }}">
                            <div class="h3 padding-md">{{$post->title }}></div>
                            <div class="h4">{{$post->description }}</div>
                            <div class="">{{$post->body }}</div>
                            <div>{{$post->name }}</div>
                            <div>
                                <a href="{{ route('user.posts.show', $post->id) }}" class="button-main">View Posts</a>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    @endforeach
    @endif
    @endsection
    </div>