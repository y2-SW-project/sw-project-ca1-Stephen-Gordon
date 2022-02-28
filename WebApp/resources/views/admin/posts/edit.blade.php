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
            Edit customers
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


            <form method="POST" action="{{ route('admin.customers.update', $customer->id)}}">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <input type="hidden" name="_method" value="PUT">

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('title', $customer->name) }}" />
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $customer->address) }}" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $customer->email) }}" />
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" />
              </div>
              {{-- <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $customer->image) }}" />
              </div> --}}
              <a href="{{ route('admin.customers.index') }}" class="btn btn-outline">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
