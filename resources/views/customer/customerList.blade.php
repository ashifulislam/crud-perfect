@extends('layouts.customer.master')
@section('content')
    <!DOCTYPE html>
<html>
<body>
<h1>Here is the all customer list</h1>
<div class="row">
    <div class="container">
        <a href="{{route('customer.customerAdd')}}" class="btn btn-primary button">Create Customer</a>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Nid</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer as $customerDetails)
            <tr>
                <td>{{$customerDetails->user->username}}</td>
                <td>{{$customerDetails->user->email}}</td>
                <td>{{$customerDetails->gender}}</td>
                <td>{{$customerDetails->nid}}</td>
                <td>Edit | Delete</td>
            </tr>
            @endforeach
            </tfoot>
        </table>
            </div>
        </div>

</body>
@endsection

