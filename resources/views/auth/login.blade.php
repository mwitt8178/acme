@extends ('layouts.plane')
@section ('body')
<div class="container">
    <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br /><br /><br />
                @section ('auth.login_panel_title','Please Sign In')
                @section ('auth.login_panel_body')
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

                    @if (session('auth_message'))
                            <div class="alert alert-success">
                                {{ session('auth_message') }}
                            </div>
                    @endif

                    <form role="form" action="{{ url ('login/authenticate') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="link">
                                    <p>Forgot your password? <a href="{{ url ('auth/forgotpassword') }}">click here</a></p>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type='submit' class="btn btn-lg btn-success btn-block" value="Login"/>
                            </fieldset>
                        </form>

                    @endsection
                    @include('widgets.panel', array('as'=>'auth.login', 'header'=>true))
            </div>
        </div>
    </div>
@stop