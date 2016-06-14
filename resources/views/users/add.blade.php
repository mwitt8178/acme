@extends('layouts.dashboard')
@section('page_heading','Add User')

@section('section')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-1 pull-right"><a href="{{url('/dashboard/users')}}" class="btn btn-primary btn-md">Back</a></div></br></br>
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
                <form role="form" action="/dashboard/users/store" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name='name' @if (count($errors) > 0) value="{{Request::old('name')}}" @endif placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type='email' name='email' @if (count($errors) > 0) value="{{Request::old('email')}}" @endif placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <input class="form-control" name='department' @if (count($errors) > 0) value="{{Request::old('department')}}" @endif placeholder="Department">
                    </div>

                    <div class="form-group">
                        <label>Supervisor</label>
                        <input class="form-control" name='supervisor' @if (count($errors) > 0) value="{{Request::old('supervisor')}}" @endif placeholder="Supervisor">
                    </div>

                    <div class="form-group">
                        <label>Position</label>
                        <input class="form-control" name='position' @if (count($errors) > 0) value="{{Request::old('position')}}" @endif placeholder="Position">
                    </div>

                    <div class="form-group">
                        <label>Birthday</label>
                        <input class="form-control" type='date' name='birthday' @if (count($errors) > 0) value="{{Request::old('birthday')}}" @endif>
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/dashboard/users/create" class="btn btn-danger">Reset</a>
                </form>
            </div>
        </div>
    </div>

@stop



@section('footer_scripts')
@stop