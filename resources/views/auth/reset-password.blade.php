@extends ('layouts.plane')
@section ('body')
<div class="container">
    <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br /><br /><br />
                @section ('auth.reset-password_panel_title','Reset Password')
                @section ('auth.reset-password_panel_body')
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <p>Please enter a new password to reset your account password</p>
                        <form role="form" action="{{ '/auth/password/save/'.$token }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password Confirmation" name="password_confirmation" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Reset"/>
                            </fieldset>
                        </form>

                    @endsection
                    @include('widgets.panel', array('as'=>'auth.reset-password', 'header'=>true))
            </div>
        </div>
    </div>
@stop