@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')

            <!-- /.row -->
            <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-lg-offset-1 pull-left animated rubberBand">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-folder-open-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$customer_count}}</div>
                                    <div>Customers</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="{{url('/dashboard/customers')}}">View Details</a></span>
                                <span class="pull-right"><a href="{{url('/dashboard/customers')}}"><i class="fa fa-arrow-circle-right"></i></a></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-lg-offset-1 animated rubberBand">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$user_count}}</div>
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="{{url('/dashboard/users')}}">View Details</a></span>
                                <span class="pull-right"><a href="{{url('/dashboard/users')}}"><i class="fa fa-arrow-circle-right"></i></a></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            </div>


@stop
