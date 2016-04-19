<!DOCTYPE html>
<html>

<head>
    <title>Είσοδος</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login.css') }}" />
    <!-- end of page level css -->

</head>

<body>
<div class="container">
    <div class="row vertical-offset-100">
        <!-- Notifications -->
        @include('notifications')

        <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
            <div id="container_demo">
                <a class="hiddenanchor" id="towelcome"></a>
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <a class="hiddenanchor" id="toforgot"></a>
                <div id="wrapper">
                    <div id="welcome" class="animate form">
                        <img src="{{ asset('assets/img/tipospu/tipospu_logo.png') }}" class="img-responsive" alt="tipospu">
                        <p class="change_link">
                            <a href="#tologin">
                                <button type="button" class="btn btn-responsive botton-alignment btn-success btn-sm">Είσοδος</button>
                            </a>
                            <a href="#toregister">
                                <button type="button" class="btn btn-responsive botton-alignment btn-success btn-sm" style="float:right;">Εγγραφή</button>
                            </a>

                        </p>
                    </div>
                    <div id="login" class="animate form">
                        <form action="{{ route('signin') }}" autocomplete="on" method="post" role="form">
                            <h3 class="black_bg">
                                <img src="{{ asset('assets/img/tipospu/logo.png') }}" alt="josh logo">
                                <br>Είσοδος χρηστών</h3>
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="email" class="uname control-label"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    E-mail
                                </label>
                                <input id="email" name="email" required type="email" placeholder="E-mail" value="{!! Input::old('email') !!}" />
                                <div class="col-sm-12">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="password" class="youpasswd"> <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    Κωδικός
                                </label>
                                <input id="password" name="password" required type="password" placeholder="π.χ. X8df!90EO" />
                                <div class="col-sm-12">
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <p class="keeplogin">
                                <input type="checkbox" name="remember-me" id="remember-me" value="remember-me" />
                                <label for="remember-me">Να με θυμάσαι</label>
                            </p>
                            <p class="login button">
                                <input type="submit" value="Είσοδος" class="btn btn-success" />
                            </p>
                            <p class="change_link">
                                <a href="#toforgot">
                                    <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Ανάκτηση κωδικού</button>
                                </a>
                                <a href="#toregister">
                                    <button type="button" class="btn btn-responsive botton-alignment btn-success btn-sm" style="float:right;">Εγγραφή</button>
                                </a>
                            </p>
                        </form>
                    </div>
                    <div id="register" class="animate form">
                        <form action="{{ route('signup') }}" autocomplete="on" method="post" role="form">
                            <h3 class="black_bg">
                                <img src="{{ asset('assets/img/tipospu/logo.png') }}" alt="josh logo">
                                <br>Νέα Εγγραφή</h3>
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            {{--<div class="form-group">--}}
                                {{--<label style="margin-bottom:0px;" for="pricing" class="">--}}
                                    {{--<i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>--}}
                                    {{--Πακέτο Χρήστη--}}
                                {{--</label>--}}
                                {{--<select id="pricing" disabled><option value="free" selected>Βασικό (Δωρεάν)</option></select>--}}
                            {{--</div>--}}

                            <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="pricing" class="">
                                    <i class="livicon" data-name="medal" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    Πακέτο χρήστη
                                </label>
                                <input id="first_name" name="pricing" required type="text" placeholder="Επιλογή πακέτου..." value="Μπλε (Δωρεάν)" disabled/>
                            </div>

                            <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="first_name" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    Όνομα χρήστη
                                </label>
                                <input id="first_name" name="first_name" required type="text" placeholder="Εισάγετε όνομα..." value="{!! Input::old('first_name') !!}" />
                                <div class="col-sm-12">
                                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="last_name" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    Επώνυμο χρήστη
                                </label>
                                <input id="last_name" name="last_name" required type="text" placeholder="Εισάγετε επώνυμο..." value="{!! Input::old('last_name') !!}" />
                                <div class="col-sm-12">
                                    {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="email" class="youmail">
                                    <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    E-mail
                                </label>
                                <input id="email" name="email" required type="email" placeholder="mail@mail.com" value="{!! Input::old('email') !!}" />
                                <div class="col-sm-12">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('email_confirm', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="email" class="youmail">
                                    <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    Επιβεβαίωση E-mail
                                </label>
                                <input id="email_confirm" name="email_confirm" required type="email" placeholder="mysupermail@mail.com" value="{!! Input::old('email_confirm') !!}" />
                                <div class="col-sm-12">
                                    {!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="password" class="youpasswd">
                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    Κωδικός
                                </label>
                                <input id="password" name="password" required type="password" placeholder="πχ. X8df!90EO" />
                                <div class="col-sm-12">
                                    {!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="passwor_confirm" class="youpasswd">
                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    Επιβεβαίωση κωδικού
                                </label>
                                <input id="password_confirm" name="password_confirm" required type="password" placeholder="πχ. X8df!90EO" />
                                <div class="col-sm-12">
                                    {!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <p class="signin button">
                                <input type="submit" class="btn btn-success" value="Εγγραφή" />
                            </p>
                            <p class="change_link">
                                <a href="#tologin" class="to_register">
                                    <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Πίσω</button>
                                </a>
                            </p>
                        </form>
                    </div>
                    <div id="forgot" class="animate form">
                        <form action="{{ route('forgot-password') }}" autocomplete="on" method="post" role="form">
                            <h3 class="black_bg">
                                <img src="{{ asset('assets/img/tipospu/logo.png') }}" alt="josh logo">Ανάκτηση Κωδικού</h3>
                            <p>
                                Εισάγετε το e-mail σας έτσι ώστε να σας αποσταλεί ένα αίτημα ανάκτησης κωδικιού εισόδου.
                            </p>

                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="emailsignup1" class="youmai">
                                    <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    Το e-mail σας
                                </label>
                                <input id="email" name="email" required type="email" placeholder="mail@mail.com" value="{!! Input::old('email') !!}" />
                                <div class="col-sm-12">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <p class="login button">
                                <input type="submit" value="Αποστολή" class="btn btn-success" />
                            </p>
                            <p class="change_link">
                                <a href="#tologin" class="to_register">
                                    <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Πίσω</button>
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!--livicons-->
<script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}"></script>
<script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>
<!-- end of global js -->
</body>
</html>