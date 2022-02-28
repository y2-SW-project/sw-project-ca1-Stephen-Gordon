{{--

    Once the edit button is clicked in index

    Then gets routed to the Edit route in Web.php

    Then routes you to Edit function In the Controller

    Edit Function Loads edit.blade.php

    The customer id gets passed through the function

    The View and Form then gets populated with the customer's Id  data

    The sumbit button goes to the update route. then goes to Web.php to find out where to go

    The udate route goes to the update Function in the controller

    the update function validates the data and saves it to the database

    Once saved, index.php is then loaded again

    Edit.php is loaded from the Controller
    --}}




@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit Post
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


            <form method="POST" action="{{ route('admin.posts.update', $post->id)}}">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <input type="hidden" name="_method" value="PUT">

              <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" />
              </div>
              <div class="form-group">
                <label for="text">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $post->description) }}" />
              </div>
              <div class="form-group">
                <label for="text">Body</label>
                <input type="text" class="form-control" id="body" name="body" value="{{ old('body', $post->body) }}" />
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $post->name) }}" />
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
