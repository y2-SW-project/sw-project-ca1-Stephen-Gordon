@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Posts
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right">Add</a>
                  </div>
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
                                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-default">View</a>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                        <form style="display:inline-block" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
                                          <input type="hidden" name="_method" value="DELETE">
                                          <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                                          <button type="submit" class="form-cotrol btn btn-danger">Delete</a>
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
