@extends('layouts.dashboard')
@section('page_heading','Add Customer')

@section('section')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-1 pull-right"><a href="{{url('/dashboard/customers')}}" class="btn btn-primary btn-md">Back</a></div></br></br>
            <div class="col-sm-6">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form role="form" action="/dashboard/customers/store" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" name='first_name' @if (count($errors) > 0)value="{{Request::old('first_name')}}" @endif placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" name='last_name' @if (count($errors) > 0)value="{{Request::old('last_name')}}" @endif placeholder="Last Name">
                        </div>

                        <div class="form-group">
                            <label>Company</label>
                            <input class="form-control" name='company' @if (count($errors) > 0)value="{{Request::old('company')}}" @endif placeholder="company">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name='email' @if (count($errors) > 0)value="{{Request::old('email')}}" @endif placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name='phone' @if (count($errors) > 0)value="{{Request::old('phone')}}" @endif placeholder="Phone">
                        </div>

                        <div class="form-group">
                            <label>Address 1</label>
                            <input class="form-control" name='address_1' @if (count($errors) > 0)value="{{Request::old('address_1')}}" @endif placeholder="Address 1">
                        </div>

                        <div class="form-group">
                            <label>Address 2</label>
                            <input class="form-control" name='address_2' @if (count($errors) > 0)value="{{Request::old('address_2')}}" @endif placeholder="Address 2">
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input class="form-control" name='city' @if (count($errors) > 0)value="{{Request::old('city')}}" @endif placeholder="City">
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <input class="form-control" name='state' @if (count($errors) > 0)value="{{Request::old('state')}}" @endif placeholder="State">
                        </div>

                        <div class="form-group">
                            <label>Zip</label>
                            <input class="form-control" name='zip' @if (count($errors) > 0)value="{{Request::old('zip')}}" @endif placeholder="Zip">
                        </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/dashboard/customers/create" class="btn btn-danger">Reset</a>
                </form>
            </div>
        </div>
    </div>

@stop



@section('footer_scripts')
@stop