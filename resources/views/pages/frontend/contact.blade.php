@extends('home')

{{-- Page title --}}
@section('title')
    Φόρμα Επικοινωνίας
    @parent
    @stop

    {{-- Page content --}}
    @section('content')
            <!-- Intro -->
    <section class="site-section site-section-light site-section-top themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-slideDown"><i class="fa fa-envelope"></i> <strong>Επικοινωνήστε Μαζί Μας</strong></h1>
            <h2 class="h3 text-center animation-slideUp">Θα χαρούμε να λάβουμε την όποια απορία ή ερώτηση σας!</h2>
        </div>
    </section>
    <!-- END Intro -->

    <!-- Contact -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row">
                {{--<div class="col-sm-6 col-md-4 site-block">--}}
                    {{--<div class="site-block">--}}
                        {{--<h3 class="h2 site-heading"><strong>Company</strong> Inc</h3>--}}
                        {{--<address>--}}
                            {{--Address<br>--}}
                            {{--Town/City<br>--}}
                            {{--Region, Zip/Postal Code<br><br>--}}
                            {{--<i class="fa fa-phone"></i> (000) 000-0000<br>--}}
                            {{--<i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">example@example.com</a>--}}
                        {{--</address>--}}
                    {{--</div>--}}
                    {{--<div class="site-block">--}}
                        {{--<h3 class="h2 site-heading"><strong>About</strong> Us</h3>--}}
                        {{--<p class="remove-margin">--}}
                            {{--In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti.--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-sm-6 col-md-12 site-block">
                    <h3 class="h2 site-heading"><strong>Φόρμα Επικοινωνίας</strong></h3>
                    @include('partials.errors')
                    @include('partials.success')
                    {!! Form::open(['method' => 'post', 'class' => '', 'url' => '/contact']) !!}
                        {{--<input type="hidden" name="_token" value="{!! csrf_token() !!}">--}}
                        {{--<div class="row control-group">--}}
                            {{--<div class="form-group col-xs-12">--}}
                                {{--<label for="name">Name</label>--}}
                                {{--<input type="text" class="form-control" id="name" name="name"--}}
                                       {{--value="{{ old('name') }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    <div class="form-group">
                        <label for="contact-name">Όνομα</label>
                        <input type="text" id="contact-name" name="name" class="form-control input-lg" placeholder="Το όνομα σας...">
                    </div>
                        {{--<div class="row control-group">--}}
                            {{--<div class="form-group col-xs-12">--}}
                                {{--<label for="email">Email Address</label>--}}
                                {{--<input type="email" class="form-control" id="email" name="email"--}}
                                       {{--value="{{ old('email') }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    <div class="form-group">
                        <label for="contact-email">E-mail</label>
                        <input type="text" id="contact-email" name="email" class="form-control input-lg" placeholder="Το e-mail σας...">
                    </div>
                        {{--<div class="row control-group">--}}
                            {{--<div class="form-group col-xs-12 controls">--}}
                                {{--<label for="message">Message</label>--}}
                    {{--<textarea rows="5" class="form-control" id="message" name="message">{{ old('message') }}</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    <div class="form-group">
                        <label for="contact-message">Μήνυμα</label>
                        {!! Form::textarea('message', '', array('placeholder' => 'Το μήνυμα σας...', 'class' => 'form-control input-lg', 'id' => 'message', 'rows' => '10' )) !!}
                    </div>
                        {{--<br>--}}
                        {{--<div class="row">--}}
                            {{--<div class="form-group col-xs-12">--}}
                                {{--<button type="submit" class="btn btn-default">Send</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                    <div class="form-group">
                        {!! Form::submit('Αποστολή Μηνύματος', array('class' => 'btn btn-lg btn-primary')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Contact -->
@stop