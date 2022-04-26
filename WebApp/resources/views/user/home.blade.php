@extends('layouts.app')

@section('content')
<div class="container bg-colour">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="btn">
                        <a href="{{route('admin.posts.index')}}">View All Posts</a>

                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
