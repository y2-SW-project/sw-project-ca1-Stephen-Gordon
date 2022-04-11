@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit An Advertisement
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

            <form method="POST" action="{{ route('admin.advertisements.update', $advertisement->id)}}">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <input type="hidden" name="_method" value="PUT">

              <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $advertisement->title) }}" />
              </div>
              <div class="form-group">
                <label for="text">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $advertisement->description) }}" />
              </div>
              <div class="form-group">
                <label for="text">Body</label>
                <input type="text" class="form-control" id="body" name="body" value="{{ old('body', $advertisement->body) }}" />
              </div>
              <div class="form-group">
                <label for="business_name">Business Name</label>
                <input type="text" class="form-control" id="business_name" name="business_name" value="{{ old('business_name', $advertisement->business_name) }}" />
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
