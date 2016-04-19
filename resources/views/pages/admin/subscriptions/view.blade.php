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
        <h1>Συνδρομές</h1>
        <ol class="breadcrumb">
            <div id="date_sectiontime"></div>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="link" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
                            Προβολή Προφίλ: {!! $subscription->suburl !!}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="#" class="form-horizontal">
                            <div class="form-body">
                                <h3>Site</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputFirstName" class="col-md-3 control-label">Όνομα Χρήστη :</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">{!! $subscription->users->first_name !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputLastName" class="col-md-3 control-label">Επώνυμο Χρήστη :</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">{!! $subscription->users->last_name !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputFirstName" class="col-md-3 control-label">Τίτλος :</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">{!! $subscription->name !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputLastName" class="col-md-3 control-label">Ενεργό Πακέτο :</label>
                                            <div class="col-md-9">
                                                {!! $subscription->group !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-md-3 control-label">Ενεργό Suburl :</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">
                                                    <a href="{{ URL::to('site/'.$subscription->suburl) }}" target="_blank">{!! $subscription->suburl !!}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selGender" class="col-md-3 control-label">Λίστα Suburl :</label>
                                            <div class="col-md-9">
                                                <ul class="form-control-static">@foreach($subscription->suburls as $key => $suburl)<li><a href="{{ URL::to('site/'.$subscription->suburl) }}" target="_blank">{{ $suburl->suburl }}</a></li>@endforeach</ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3>Συνδρομή</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress1" class="col-md-3 control-label">Τελευταία Ανανέωση :</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">@if($subscription->subscriptions->upgraded_at == '0000-00-00'){{ '-'  }}@else{{ date('d/m/Y', strtotime($subscription->subscriptions->upgraded_at)) }}@endif</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress2" class="col-md-3 control-label">Πακέτο :</label>
                                            <div class="col-md-9">
                                                {!! $subscription->subscriptions->group  !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStates" class="col-md-3 control-label">Έναρξη Συνδρομής :</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">@if($subscription->subscriptions->started_at == '0000-00-00'){{ '-'  }}@else{{ date('d/m/Y', strtotime($subscription->subscriptions->started_at)) }}@endif</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputCity" class="col-md-3 control-label">Λήξη Συνδρομής :</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">@if($subscription->subscriptions->ended_at == '0000-00-00'){{ '-'  }}@else{{ date('d/m/Y', strtotime($subscription->subscriptions->ended_at)) }}@endif</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions text-right pal">
                                <input type="reset" onclick="location.href='{{ URL::to('admin/subscriptions') }}';" class="btn btn-default hidden-xs" value="Πίσω"></div>
                        </form>
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
