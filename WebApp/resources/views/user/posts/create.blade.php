@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add a new post
          </div>
          <div class="card-body">
          <!-- this block is ran if the validation code in the controller fails
          this code looks after displaying the correct error message to the user -->
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('user.posts.store')  }}">
                <input type="hidden" name="_token" value="{{  csrf_token()  }}">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control form" id="title" name="title" value="{{ old('title') }}" />
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control form" id="description" name="description" value="{{ old('description') }}" />
                </div>
                <div class="form-group">
                  <label for="body">Body</label>
                  <input type="text" class="form-control " id="body" name="body" value="{{ old('body') }}" />
                </div>
                <div class="form-group">
                  <label for="name"></label>
                  <input type="hidden" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" />
                </div>

              <a href="{{ route('user.posts.index') }}" class="btn btn-outline">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
