@extends('master')

{{-- Page title --}}
@section('title')
    Διαχείριση
    @parent
    @stop

    {{-- page level styles --}}
    @section('header_styles')
            <!--page level css -->
    <link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/only_dashboard.css') }}" />
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        @if($initial == 0)
            <h1>{{ Sentinel::getUser()->first_name }}, καλώς ήρθες</h1>
        @elseif($initial == 1)
            <h1>Καλώς ήρθατε {{ Sentinel::getUser()->first_name }},</h1>
        @endif

        <ol class="breadcrumb">
            <div id="date_section"></div>
            {{--<li class="active">--}}
                {{--<a href="{{ URL::to('/admin') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>--}}
                    {{--Home--}}
                {{--</a>--}}
            {{--</li>--}}
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <br><br><br>
                <img class="img-responsive welcome-logo" src="{{ asset('assets/img/tipospu/tipospu_logo.png') }}" >
                <br><br><br>
            </div>
        </div>

        <div class="clearfix"></div>

        {{--<div class="flash-message">--}}
            {{--@foreach (['danger', 'warning', 'success', 'info'] as $msg)--}}
                {{--@if(Session::has('alert-' . $msg))--}}

                    {{--<p class="alert alert-{{ $msg }}">{!! Session::get('alert-' . $msg) !!} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>--}}
                {{--@endif--}}
            {{--@endforeach--}}
        {{--</div> <!-- end .flash-message -->--}}

        {{--<div class="col-md-12 alert alert-success fade in">--}}
            {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
            {{--<div class="col-md-12">This alert box could indicate a successful or positive action.</div>--}}
            {{--<div class="col-md-12">--}}
                {{--{!! Form::open(['class' => '', 'url' => 'admin/update', 'files' => true]) !!}--}}
                    {{--<button type="button" class="btn btn-default"><a href="#" class="close" data-dismiss="alert" aria-label="close">Εντάξει</a></button>--}}
                {{--<div class="actions clearfix">--}}
                    {{--<button type="button" class="btn btn-responsive button-alignment btn-success pull-right" style="margin-bottom:7px;" data-toggle="button"><span class="glyphicon glyphicon-floppy-save"></span> Αποθήκευση</button>--}}
                    {{--{!!Form::button('<span class="fa fa-floppy-o"></span> Αποθήκευση ',['class'=>'btn btn-responsive button-alignment btn-primary pull-right', 'type'=>'submit'])!!}--}}
                    {{--{!!Form::button('<span class="fa fa-reply"></span> Άκυρο ',['class'=>'btn btn-responsive button-alignment btn-info pull-left', 'type'=>'submit'])!!}--}}
                    {{--{!!Form::submit('Είσοδος',['class'=>'btn btn-sm btn-primary'])!!}--}}
                {{--</div>--}}
                {{--{!!Form::close()!!}--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <div class="col-md-12 alert alert-{{ $msg }} fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <div class="col-md-12">{!! Session::get('alert-' . $msg) !!}</div>
                        <div class="col-md-12">
                            {!! Form::open(['class' => '', 'url' => 'admin/update', 'files' => true]) !!}
                            <div class="actions clearfix">
                                {!!Form::button('<span class="fa fa-check"></span>&nbsp;<a href="#" class="close" data-dismiss="alert" aria-label="close"> Εντάξει </a>',['class'=>'btn btn-responsive button-alignment btn-' . $msg . ' pull-right', 'type'=>'submit'])!!}
                            </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->

		@if($initial == 1)
        <div class="col-md-12 tpp_finfo">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Ενημέρωση
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="alert-message alert-message-success">
                        <h4>&nbsp;Αρχικοποίηση</h4>
                        <p>
                            &nbsp;Εκκρεμεί η δημιουργία του προφίλ σας. Ακολουθώντας ένα wizard θα δημιουργήσετε βήμα προς βήμα την σελίδα της επιχείρησης σας.
                        </p>
                    </div>
                    <a href="{{ URL::to('admin/wizard') }}" class="btn btn-success btn-lg btn-block" role="button">
                        <span class="glyphicon glyphicon-ok-sign"></span>
                        &nbsp;&nbsp;&nbsp;Έναρξη οδηγού αρχικοποίησης σελίδας...
                    </a>
                    <div class="alert-message alert-message-default">
                        <h4>&nbsp;Επιλογές μενού</h4>
                        <p>
                            &nbsp;Μετά την αρχικοποίηση του προφίλ, θα ενεργοποιηθούν οι επιπλέον επιλογές προεπισκόπησης και επεξεργασίας.
                        </p>
                    </div>
                </div>
            </div>
        </div>
		@endif

        <div class="clearfix"></div>
        @if(strpos(head($userRoles), 'User') !== FALSE)
        {{--@if(head($userRoles) == 'User')--}}
        <div class="row">
            @if($initial == 0)
            <div class="col-lg-4 col-md-12 col-sm-12 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <div class="tipospuredcolorbg no-radius" onclick="location.href='{{ ( $initial==0 ? URL::to('admin/preview') : '#') }}';" style="cursor: pointer;">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h3 class="stat-label">Προεπισκόπηση</h3>
                                    {{--@foreach($userRoles as $name)<span>{{ $name }}</span>@endforeach--}}
                                    {{--{{ $userRoles[0]['name'] }}--}}
                                </div>
                                <div class="col-xs-6">
                                    <i class="livicon pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <span class="stat-label">Επιλέγοντας τις οδηγίες εμφανίζεται η ενότητα με την περιγραφή της κάθε περιοχής του template.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <div class="tipospugreencolorbg no-radius" onclick="location.href='{{ ( $initial==0 ? URL::to('admin/edit') : '#') }}';" style="cursor: pointer;">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h3 class="stat-label">Επεξεργασία</h3>
                                </div>
                                <div class="col-xs-6">
                                    <i class="livicon pull-right" data-name="gear" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <span class="stat-label">Επιλέγοντας την επεξεργασία εμφανίζεται η ενότητα επεξεργασία των περιοχών του template.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="tipospubluecolorbg no-radius" onclick="location.href='{{ ( $initial==0 ? URL::to('admin/help') : '#') }}';" style="cursor: pointer;">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h3 class="stat-label">Οδηγίες</h3>
                                </div>
                                <div class="col-xs-6">
                                <i class="livicon pull-right" data-name="info" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <span class="stat-label">Επιλέγοντας τις οδηγίες εμφανίζεται η ενότητα με την περιγραφή της κάθε περιοχής του template.</span>
                                </div>
                            </div>
                            {{--<div class="row">--}}
                                {{--<i class="livicon pull-right" data-name="info" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<small class="stat-label">Επιλέγοντας τις οδηγίες εμφανίζεται η ενότητα με την περιγραφή της κάθε περιοχής του template.</small>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-6 text-right">--}}
                                    {{--<h4 class="stat-label">Οδηγίες</h4>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            @elseif($initial == 1)
                <div class="col-lg-12 col-md-12 col-sm-12 margin_10 animated fadeInRightBig">
                    <!-- Trans label pie charts strats here-->
                    <div class="tipospubluecolorbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h3 class="stat-label">Οδηγίες</h3>
                                    </div>
                                    <div class="col-xs-6">
                                        <i class="livicon pull-right" data-name="info" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <span class="stat-label">Επιλέγοντας τις οδηγίες εμφανίζεται η ενότητα με την περιγραφή της κάθε περιοχής του template.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>



        <!--/row-->
        @endif
    </section>
    @stop

    {{-- page level scripts --}}
    @section('footer_scripts')
            <!--  todolist-->
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- EASY PIE CHART JS -->
    <script src="{{ asset('assets/vendors/charts/easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/charts/jquery.easypiechart.min.js') }}"></script>
    <!--for calendar-->
    <script src="{{ asset('assets/vendors/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/fullcalendar/calendarcustom.min.js') }}" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="{{ asset('assets/vendors/charts/jquery.flot.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/charts/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
    <!--Sparkline Chart-->
    {{--<script src="{{ asset('assets/vendors/charts/jquery.sparkline.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/vendors/countUp/countUp.js') }}"></script>--}}
    <!--   maps -->
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}" type="text/javascript"></script>
    <!--   tipospu -->
    {{--<script src="{{ asset('assets/js/tipospu/tipospu.js') }}" type="text/javascript"></script>--}}
    <!-- end of page level js -->
    <script type="text/javascript">
        $(document).ready(function() {
            var composeHeight = $('#calendar').height() + 21 - $('.adds').height();
            $('.list_of_items').slimScroll({
                color: '#A9B6BC',
                height: composeHeight + 'px',
                size: '5px'
            });
        });
    </script>
@stop