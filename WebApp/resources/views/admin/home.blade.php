@extends('layouts.app')

@section('content')
<div class="container bg-colour">
    <div class="row justify-content-center border-bottom">
        <div class="col-md-12">
            <div class="font-colour-white justify-content-center">
                <div class="h1 mb-5 mt-5">The Open Forum</div>

                <div class="ms-5  mb-5 ">
                    <h5 class="mb-5 ">
                        Welecome to The Open Forum
                    </h5>
                    <h5 class="mb-5">A place to share with your community</h5>
                    <div class="">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="button-main text-dark">
                            <a href="{{route('admin.posts.index')}}" class="text-dark">View All Posts</a>

                           </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
