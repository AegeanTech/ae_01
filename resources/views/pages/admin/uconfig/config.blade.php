@extends('master')

{{-- Page title --}}
@section('title')
Ρυθμίσεις Προφίλ
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    
    <link href="{{ asset('assets/css/pages/form_layouts.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/vendors/spinner/dist/bootstrap-spinner.css') }}" rel="stylesheet" />
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Ρυθμίσεις Προφίλ</h1>
                <ol class="breadcrumb">
                    <div id="date_sectiontime"></div>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="livicon" data-name="settings" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i>
                                            Ρυθμίσεις Προφίλ
                                        </h3>
                                    </div>
                                    <div class="panel-body border">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Ονοματεπώνυμο</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{!! $configs->users->last_name . '&nbsp;' . $configs->users->first_name !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email Χρήστη</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><a href="mailto:{!! $configs->users->email !!}?Subject=TiPosPou%20Support" target="_top">{!! $configs->users->email !!}</a></p>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Επωνυμία Επιχείρησης</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{!! $configs->name !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Διακριτικός Τίτλος</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{!! $configs->title !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Suburl</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><a href="{{ URL::to('site/'.$configs->suburl) }}" target="_blank">{!! $configs->suburl !!}</a></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Ενεργοποιημένο Γκρουπ</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        @if($configs->group == '')
                                                            {!! 'Μπλε' !!}
                                                        @else
                                                            @if($configs->group == 'R')
                                                                {!! 'Κόκκινο' !!}
                                                            @elseif($configs->group = 'G')
                                                                {!! 'Πράσινο' !!}
                                                            @else
                                                                {!! 'Μπλε' !!}
                                                            @endif
                                                        @endif
                                                        {{--{!! $configs->group !!}--}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Τελευταία Ανανέωση</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">@if($configs->subscriptions->upgraded_at == '0000-00-00'){{ '-'  }}@else{{ date('d/m/Y', strtotime($configs->subscriptions->upgraded_at)) }}@endif</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Πακέτο</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        @if($configs->subscriptions->group =='')
                                                            {{ '-' }}
                                                        @else
                                                            @if($configs->subscriptions->group == 'R')
                                                                {!! 'Κόκκινο' !!}
                                                            @elseif($configs->subscriptions->group = 'G')
                                                                {!! 'Πράσινο' !!}
                                                            @else
                                                                {!! 'Μπλε' !!}
                                                            @endif
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Έναρξη Συνδρομής</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">@if($configs->subscriptions->started_at == '0000-00-00'){{ '-'  }}@else{{ date('d/m/Y', strtotime($configs->subscriptions->started_at)) }}@endif</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Λήξη Συνδρομής</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">@if($configs->subscriptions->ended_at == '0000-00-00'){{ '-'  }}@else{{ date('d/m/Y', strtotime($configs->subscriptions->ended_at)) }}@endif</p>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Αριθμός Φωτογραφιών</label>
                                                <div class="col-md-9">
                                                    <div class="col-md-1 form-control-static col-md-9 input-group spinner" data-trigger="spinner">
                                                        <input class="form-control" type="text" name="images" value="{!! $configs->configs->images !!}" data-rule="quantity">
                                                        <div class="input-group-addon">
                                                            <a href="javascript:;" class="spin-up" data-spin="up">
                                                                <i class="glyphicon glyphicon-chevron-up"></i>
                                                            </a>
                                                            <a href="javascript:;" class="spin-down" data-spin="down">
                                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-textarea-input">Περιγραφή</label>
                                                <div class="col-md-6">
                                                    <textarea id="example-textarea-input" name="description" rows="7" class="form-control" placeholder="Περιγραφή..">{!! $configs->configs->description !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <a href="#" class="btn btn-effect-ripple btn-primary" role="button">Αποθήκευση</a>
                                                    <input type="reset" onclick="location.href='{{ URL::to('admin/suburls') }}';" class="btn btn-effect-ripple btn-danger" value="Άκυρο"/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- content --> 
    @stop

{{-- page level scripts --}}
@section('footer_scripts')

<!--spinner-->
<script src="{{ asset('assets/vendors/spinner/dist/jquery.spinner.min.js') }}" ></script>
<script src="{{ asset('assets/js/pages/pickers.js') }}" ></script>

@stop