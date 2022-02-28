@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Post: {{ $post->name }}
                </div>

                <div class="card-body">
                    <table id="table-posts" class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Title</td>
                                    <td>{{$post->title }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{$post->description }}</td>
                                </tr>
                                <tr>
                                    <td>Body</td>
                                    <td>{{$post->body }}</td>
                                </tr>
                                <tr>
                                    <td>name</td>
                                    <td>{{$post->name }}</td>
                                </tr>

                            </tbody>
                        </table>
                        <a href="{{ route('user.posts.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
