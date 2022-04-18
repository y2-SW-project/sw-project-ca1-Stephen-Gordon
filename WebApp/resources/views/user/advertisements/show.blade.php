@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center margin-bottom-md">
        <div class="col-md-8 col-sm-12 card">
            <div data-id="{{$advertisement->id }}">
                <div class="h3 padding-md">{{$advertisement->title }}</div>
                <div class="h5 padding-md">{{$advertisement->description }}</div>
                <div class="p padding-md">{{$advertisement->body }}</div>
                <div class="p padding-md">{{$advertisement->business_name }}</div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@endsection
