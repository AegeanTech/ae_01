@extends('master')

{{-- Page title --}}
@section('title')
    Συνδρομές
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />

    <!--clock face css-->
    <link href="{{ asset('assets/vendors/iCheck/skins/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Suburls</h1>
        <ol class="breadcrumb">
            <div id="date_sectiontime"></div>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="money" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
                        Επεξεργασία Συνδρομής
                    </h3>
                </div>
                <div class="panel-body">



                    <div class="row">

                        {!! Form::open(['class' => 'form-horizontal', 'url' => 'admin/subscriptions']) !!}
                        <div class="col-lg-12">

                        <div class="col-md-6">
                            <div class="form-horizontal">

                                <div class="form-group">
                                    <label class="control-label col-md-3" for="upgraded_at">Site:</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-link"></i>
                                            </div>
                                            <input type="text" class="form-control" id="suburl" name="suburl" disabled value="{!! $subscription_site->suburl !!}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" for="upgraded_at">Ανανέωση:</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="upgraded_at" name="upgraded_at" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="{!! $subscription_info->upgraded_at !!}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" for="started_at">Ημερομηνία Έναρξης:</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="started_at" name="started_at" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="{!! $subscription_info->started_at !!}"/>
                                        </div>
                                    </div>
                                </div>

                                <br></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal">

                                <div class="form-group">
                                    <label class="control-label col-md-3" for="sid">Κωδικός Site:</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-key"></i>
                                            </div>
                                            <input type="text" class="form-control" id="sid" name="sid" value="{!! $subscription_info->sid !!}"/>
                                            <input type="hidden" id="uid" name="uid" value="{!! $subscription_info->uid !!}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Πακέτο:</label>
                                    <div class="col-md-2">
                                        <label class="radio-inline">
                                            <input type="radio" name="group" style="color:#dd4033" value="R" @if($subscription_info->group == 'R'){{ 'checked' }}@endif/><p style="color:#dd4033"> Κόκκινο</p></label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="radio-inline">
                                            <input type="radio" name="group" style="color:#009178" value="G" @if($subscription_info->group == 'G'){{ 'checked' }}@endif/><p style="color:#009178"> Πράσινο</p></label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="radio-inline">
                                            <input type="radio" name="group" style="color:#3f779f" value="B" @if(($subscription_info->group == 'B') || ($subscription_info->group == '')){{ 'checked' }}@endif/><p style="color:#3f779f"> Μπλε</p></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" for="ended_at">Ημερομηνία Λήξης:</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="ended_at" name="ended_at" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="{!! $subscription_info->ended_at !!}"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">

                                {!!Form::button('<span class="fa fa-floppy-o"></span> Αποθήκευση ',['class'=>'btn btn-responsive btn-primary', 'type'=>'submit'])!!}
                                {{--{!!Form::button('<span class="fa fa-reply"></span> Άκυρο ',['class'=>'btn btn-responsive btn-default', 'onclick'=>'location.href="{{ URL::to(\'admin/subscriptions\')" }}', 'type'=>'reset'])!!}--}}

                                {{--<input type="submit" class="btn btn-primary" value="Αποθήκευση">--}}
                                <input type="reset" onclick="location.href='{{ URL::to('admin/subscriptions') }}';" class="btn btn-default" value="Άκυρο"/></div>
                        </div>

                        </div>
                        {!! Form::close() !!}

                    </div>



                </div>
            </div>
        </div>
    </div>
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <!-- InputMask -->
    <script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/input-mask/jquery.inputmask.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/input-mask/jquery.inputmask.date.extensions.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/input-mask/jquery.inputmask.extensions.js') }}"  type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets/vendors/daterangepicker/daterangepicker.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/iCheck/icheck.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/iCheck/demo/js/custom.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/autogrow/js/jQuery-autogrow.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/maxlength/bootstrap-maxlength.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/card/js/card.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}"  type="text/javascript"></script>

@stop
