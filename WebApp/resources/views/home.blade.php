@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="h1">The Open Forum</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="button-main ">
                        <a href="{{route('user.posts.index')}}" class="">View All Posts</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
