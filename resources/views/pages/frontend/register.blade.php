@extends('home')

{{-- Page title --}}
@section('title')
    signup
    @parent
    @stop

    {{-- Page content --}}
    @section('content')
            <!-- Media Container -->
    <div class="media-container">
        <!-- Intro -->
        <section class="site-section site-section-light site-section-top">
            <div class="container text-center">
                <h1 class="animation-slideDown"><i class="fa fa-arrow-right"></i> <strong>Είσοδος</strong></h1>
                <h2 class="h3 animation-slideUp hidden-xs">Εγγραφείτε στο TiPosPu!!!</h2>
            </div>
        </section>
        <!-- END Intro -->

        <!-- For best results use an image with a resolution of 2560x279 pixels -->
        <img src="{{ asset('assets/frontend/img/placeholders/headers/store_home.jpg') }}" alt="" class="media-image animation-pulseSlow">
    </div>
    <!-- END Media Container -->

            {{--<!-- Intro -->--}}
    {{--<section class="site-section site-section-light site-section-top themed-background-dark">--}}
        {{--<div class="container">--}}
            {{--<h1 class="text-center animation-slideDown"><i class="fa fa-plus"></i> <strong>Εγγραφή</strong></h1>--}}
            {{--<h2 class="h3 text-center animation-slideUp">Εγγραφείτε στο TiPosPu!</h2>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<!-- END Intro -->--}}

    <!-- Sign Up -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 site-block">
                    <!-- Sign Up Form -->
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{!!$error!!}</p>
                    @endforeach
                    {!!Form::open(['url'=>'/register','id'=>'form-sign-up', 'class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
                        {{--<div class="form-group">--}}
                            {{--<div class="col-xs-12">--}}
                                {{--<div class="input-group">--}}
                                    {{--<span class="input-group-addon"><i class="gi gi-user"></i></span>--}}
                                    {{--<input type="text" id="register-firstname" name="register-firstname" class="form-control input-lg" placeholder="First name">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                    {!! Form::text('email',Input::old('email'),['id'=>'register-email', 'class'=>'form-control input-lg', 'placeholder'=>'Email']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                    {!! Form::password('password',['id'=>'register-password', 'class'=>'form-control input-lg', 'placeholder'=>'Password']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                    {!! Form::password('password_confirmation',['id'=>'register-password-verify', 'class'=>'form-control input-lg', 'placeholder'=>'Verify Password']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-actions">
                            <div class="col-xs-6">
                                <label class="switch switch-primary" data-toggle="tooltip" title="Agree to the terms">
                                    <input type="checkbox" id="register-terms" name="register-terms"><span></span>
                                </label>
                                <a href="#modal-terms" data-toggle="modal" class="register-terms"><small>View Terms</small></a>
                            </div>
                            <div class="col-xs-6 text-right">
                                {!!Form::submit('Register',['class'=>'btn btn-sm btn-primary'])!!}
                                {{--<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Sign Up</button>--}}
                            </div>
                        </div>
                    {!!Form::close()!!}
                    <!-- END Sign Up Form -->
                </div>
            </div>

        </div>
    </section>
    <!-- END Sign Up -->
@stop