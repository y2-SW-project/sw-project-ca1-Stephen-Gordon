@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bg-sec">
                <!-- <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (count($posts)===0)
                    <p>there are no posts!</p>
                    @else
                    <table id="table-posts" class=" table-hover">
                        <thead>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Body</th>
                            <th>Name</th>
                        </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr class="font-colour-white" data-id="{{$post->id }}">
                                    <td class="h3 ">{{$post->title }}</td>
                                    <td class="h4">{{$post->description }}</td>
                                    <td class="">{{$post->body }}</td>
                                    <td>{{$post->name }}</td>
                                    <td>
                                        <a href="{{ route('user.posts.show', $post->id) }}" class="button-main">View Posts</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    @endif
                </div>
            </div> -->

                <div class="row font-colour-white">
                    <div class="col-md-12">
                        @if (count($posts)===0)
                        <p>there are no posts!</p>
                        @else
                        @foreach ($posts as $post)
                        
                        
                            <div class="" data-id="{{$post->id }}">
                            <td class="h3 ">{{$post->title }}</td>
                            <td class="h4">{{$post->description }}</td>
                            <td class="">{{$post->body }}</td>
                            <td>{{$post->name }}</td>
                            <td>
                                <a href="{{ route('user.posts.show', $post->id) }}" class="button-main">View Posts</a>
                                </form>
                            </td>
                        </div>
                        @endforeach
                        </tbody>
                        </table>
                        @endif
                        <div class="h3 ">{{$post->title }}>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
