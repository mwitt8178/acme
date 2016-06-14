@extends ('layouts.plane')
@section ('body')
<div class="container">
    <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br /><br /><br />
                @section ('auth.forgot-password_panel_title','Forgot Password')
                @section ('auth.forgot-password_panel_back_button')
                    <a href="{{ url ('/') }}" class="btn btn-sm btn-primary btn-block">Back</a>
                @endsection

                @section ('auth.forgot-password_panel_body')
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
                    <p>Please enter your email address below and we will send you instructions on how to change your password</p>
                        <form role="form" action="{{url('/auth/forgotpassword/send')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="email" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Send</button>
                            </fieldset>
                        </form>

                    @endsection
                    @include('widgets.panel', array('as'=>'auth.forgot-password', 'header'=>true))
            </div>
        </div>
    </div>
@stop