@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Customer: {{ $customer->name }}
                </div>

                <div class="card-body">
                    <table id="table-customers" class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{$customer->name }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{$customer->address }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$customer->email }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$customer->phone }}</td>
                                </tr>
                               {{--  <tr>
                                    <td>Image</td>
                                    <td>{{$customer->image }}</td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <a href="{{ route('user.customers.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
