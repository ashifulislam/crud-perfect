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
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            </tfoot>
        </table>
            </div>
        </div>

</body>
@endsection

