@include('layouts.customer.header')
@if(Session::has('success'))
    <div class="alert-float alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{Session::get('success')}}
    </div>
@endif
@yield('content')
