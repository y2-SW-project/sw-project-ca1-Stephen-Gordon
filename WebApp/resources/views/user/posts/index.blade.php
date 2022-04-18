@extends('layouts.app')

@section('content')
<div class="container bg-sec">
    @if (count($posts)===0)
    <p>there are no posts!</p>
    @else




    <div class="row margin-bottom-md">
        <div class="col-md-8 col-sm-12">
            @foreach ($posts as $post)
            <div class="card margin-bottom-md">
                <div data-id="{{$post->id }}">
                    <div class="h3 padding-md">{{$post->title }}</div>
                    <div class="h5 padding-bottom-md">{{$post->description }}</div>
                    <div class="p padding-bottom-md">{{$post->body }}</div>
                    <div class="p padding-bottom-md purple">{{$post->name }}</div>
                    <div class="padding-bottom-md">
                        <a href="{{ route('user.posts.show', $post->id) }}" class="button-main">View Post</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <!-- Side column -->

        <div class="col-md-4 col-sm-12">
            <div>
                <div class="card margin-bottom-md">
                    <div class="margin-bottom-md">
                        <div class="margin-bottom-md ">
                            <h4>Add a Post</h4>
                            <a href="{{ route('user.posts.create') }}" class="btn">Go</a>
                        </div>
                        <div class="margin-bottom-md">
                            <a href="{{ route('user.categories.dublin', 1 ) }}" class="btn float-right">Visit Dublin Open Forum</a>
                        </div>
                        <div class="margin-bottom-md">
                            <a href="{{ route('user.categories.cork', 2 ) }}" class="btn float-right">Visit Cork Open Forum</a>
                        </div>
                        <div class="margin-bottom-md">
                            <a href="{{ route('user.categories.galway', 3 ) }}" class="btn float-right">Visit Galway Open Forum</a>
                        </div>
                    </div>
                </div>
            </div>
            <div>@foreach ($advertisements as $advertisement)
                <div class="Adcard margin-bottom-md" data-id="{{$advertisement->id }}">
                    <div class="h3 margin-bottom-md">{{$advertisement->title }}</div>
                    <div class="h5 margin-bottom-md">{{$advertisement->description }}</div>

                    <div class="">
                        <a href="{{ route('user.advertisements.show', $advertisement->id) }}" class="button-main">View Advertisement</a>
                    </div>
                </div>
                @endforeach</div>
        </div>
    </div>
    @endif
    @endsection
</div>
