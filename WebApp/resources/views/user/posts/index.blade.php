@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (count($posts)===0)
                    <p>there are no posts!</p>
                    @else
                    <table id="table-posts" class="table table-hover">
                        <thead>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Body</th>
                            <th>Name</th>
                        </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr data-id="{{$post->id }}">
                                    <td>{{$post->title }}</td>
                                    <td>{{$post->description }}</td>
                                    <td>{{$post->body }}</td>
                                    <td>{{$post->name }}</td>
                                    <td>
                                        <a href="{{ route('user.posts.show', $post->id) }}" class="btn btn-primary">View Posts</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
