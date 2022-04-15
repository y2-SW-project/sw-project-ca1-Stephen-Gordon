@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($posts)===0)
    <p>there are no posts!</p>
    @else
    <div class="row justify-content-center margin-bottom-md">
        {{-- <div class="col-md-12">
            <a href="{{ route('user.posts.create') }}" class="btn float-right">Add</a>
    </div> --}}

</div>



<div class="row margin-bottom-md">
    <div class="col-md-8">

        @foreach ($posts as $post)
        @if ($post->category_id ==1)
        <p  class="text-primary">Here are the posts for Dublin</p>
        @endif

        @if ($post->category_id ==2)
        <p  class="text-primary">Here are the posts for Cork</p>
        @endif

        @if ($post->category_id ==3)
        <p  class="text-primary">Here are the posts for Galway</p>
        @endif

        <div class="card margin-bottom-md">
            <div data-id="{{$post->id }}">
                <div class="h3 padding-md">{{$post->title }}</div>
                <div class="h5 padding-bottom-md">{{$post->description }}</div>
                <div class="p padding-bottom-md">{{$post->body }}</div>
                <div class="p padding-bottom-md">{{$post->name }}</div>
                <div class="padding-bottom-md">
                    <a href="{{ route('user.posts.show', $post->id) }}" class="button-main">View Post</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <!-- Side column -->

    {{-- <div class="col-md-4">
            @foreach ($advertisements as $advertisement)
            <div class="Adcard margin-bottom-md" data-id="{{$advertisement->id }}">
    <div class="h3 margin-bottom-md">{{$advertisement->title }}</div>
    <div class="h5 margin-bottom-md">{{$advertisement->description }}</div>

    <div class="">
        <a href="{{ route('user.advertisements.show', $advertisement->id) }}" class="button-main">View Advertisement</a>
    </div>
</div>
@endforeach
</div> --}}
</div>
@endif
@endsection
</div>
