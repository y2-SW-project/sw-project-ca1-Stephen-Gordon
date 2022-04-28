@extends('layouts.app')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="h4 card-header">
                    Add a new post
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.posts.store')  }}">
                        <input type="hidden" name="_token" value="{{  csrf_token()  }}">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form font-colour-white" id="title" name="title"
                                value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form font-colour-white" id="description" name="description"
                                value="{{ old('description') }}" />
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form font-colour-white" id="body" rows="10" name="body"
                                value="{{ old('body') }}"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="category_id" name="category_id" value="1">
                            <label for="dublin">Dublin</label><br>

                            <input type="checkbox" id="category_id" name="category_id" value="2">
                            <label for="cork">Cork</label><br>

                            <input type="checkbox" id="category_id" name="category_id" value="3">
                            <label for="galway"> Galway</label>
                        </div>

                        <div class="form-group">
                            <label for="name"></label>
                            <input type="hidden" class="form-control" id="name" name="name"
                                value="{{ Auth::user()->name }}" />
                        </div>

                        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
