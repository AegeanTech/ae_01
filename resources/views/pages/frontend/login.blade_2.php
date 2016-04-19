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
                <h2 class="h3 animation-slideUp hidden-xs">Συνδεθείτε στο tipospu!</h2>
            </div>
        </section>
        <!-- END Intro -->

        <!-- For best results use an image with a resolution of 2560x279 pixels -->
        <img src="{{ asset('assets/frontend/img/placeholders/headers/store_home.jpg') }}" alt="" class="media-image animation-pulseSlow">
    </div>
    <!-- END Media Container -->

    <!-- Log In -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 site-block">
                    <!-- Log In Form -->
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{!!$error!!}</p>
                    @endforeach
                    {{--{!!Form::open(['url'=>'/login', 'id'=>'form-log-in', 'class'=>'form form-horizontal'])!!}--}}
                    <form>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                {!! Form::text('email',Input::old('email'),['id'=>'login-email', 'class'=>'form-control input-lg',  'placeholder'=>'E-mail']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                {!! Form::password('password',['id'=>'login-password', 'class'=>'form-control input-lg', 'placeholder'=>'Κωδικός']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-6">
                            <label class="switch switch-primary">
                                <input type="checkbox" id="login-remember-me" name="login-remember-me" checked><span></span>
                            </label>
                            <small>Να με θυμάσαι</small>
                        </div>
                        <div class="col-xs-6 text-right">
                            {!!Form::submit('Είσοδος',['class'=>'btn btn-sm btn-primary'])!!}
                            {{--<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Log In</button>--}}
                        </div>
                    </div>
                    <div class="form-group">

                    </div>
                    {{--{!!Form::close()!!}--}}
                        </form>
                    {{--<div class="text-center">--}}
                    {{--<a href="javascript:void(0)"><small>Forgot password?</small></a>--}}
                    {{--</div>--}}
                            <!-- END Log In Form -->
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!-- END Log In -->
@stop