@extends('layouts.dashboard')
@section('page_heading','Edit Customer')

@section('section')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-1 pull-right"><a href="{{url('/dashboard/customers')}}" class="btn btn-primary btn-md">Back</a></div></br></br></br>
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
                <form role="form" action="/dashboard/customers/update/{{$id}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>First Name</label>
                        <input class="form-control" name='first_name' @if (count($errors) < 1)value="{{$first_name}}"@else value="{{Request::old('first_name')}}" @endif placeholder="First Name">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input class="form-control" name='last_name' @if (count($errors) < 1)value="{{$last_name}}"@else value="{{Request::old('last_name')}}" @endif placeholder="Last Name">
                    </div>

                    <div class="form-group">
                        <label>Company</label>
                        <input class="form-control" name='company' @if (count($errors) < 1)value="{{$company}}"@else value="{{Request::old('company')}}" @endif placeholder="Company">
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name='phone' @if (count($errors) < 1)value="{{$phone}}"@else value="{{Request::old('phone')}}" @endif placeholder="Phone">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type='email' name='email' @if (count($errors) < 1)value="{{$email}}"@else value="{{Request::old('email')}}" @endif placeholder="Phone">
                    </div>

                    <div class="form-group">
                        <label>Address 1</label>
                        <input class="form-control" name='address_1' @if (count($errors) < 1)value="{{$address_1}}"@else value="{{Request::old('address_1')}}" @endif placeholder="Address 1">
                    </div>

                    <div class="form-group">
                        <label>Address 2</label>
                        <input class="form-control" name='address_2' @if (count($errors) < 1)value="{{$address_2}}"@else value="{{Request::old('address_2')}}" @endif placeholder="Address 2">
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <input class="form-control" name='city' @if (count($errors) < 1)value="{{$city}}"@else value="{{Request::old('city')}}" @endif placeholder="City">
                    </div>

                    <div class="form-group">
                        <label>State</label>
                        <input class="form-control" name='state' @if (count($errors) < 1)value="{{$state}}"@else value="{{Request::old('state')}}" @endif placeholder="State">
                    </div>

                    <div class="form-group">
                        <label>Zip</label>
                        <input class="form-control" name='zip' @if (count($errors) < 1)value="{{$zip}}"@else value="{{Request::old('zip')}}" @endif placeholder="Zip">
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/dashboard/customers/edit/{{$id}}" class="btn btn-danger">Reset</a>
                </form>
            </div>
            <?php $geo_str = 'https://www.google.com/maps/embed/v1/search?q='.rawurlencode($lat.', '.$lng).'&key=AIzaSyDk_6V4bD3vGohaDJWvJ7_SRXPwf-MJ5i8'; ?>
            <div class="col-sm-6 animate bounce">
                <address>
                    <h2><strong>{{$company}}</strong></h2>
                    <hr>
                    {{$address_1 . ', '.$address_2}}<br>
                    {{$city. ', '.$state.' '.$zip}}<br>
                    <abbr title="Phone">P:</abbr> {{$phone}}
                </address>

                <address>
                    <strong>{{$first_name . ' ' . $last_name}}</strong><br>
                    <a href="mailto:#">{{$email}}</a>
                </address>
                <div class="container-fluid map">
                    <iframe width="100%" height="250" frameborder="0" style="border:0" src="<?php echo $geo_str; ?>" allowfullscreen>
                    </iframe>
                </div>
            </div>

        </div>
    </div>

@stop



@section('footer_scripts')
@stop