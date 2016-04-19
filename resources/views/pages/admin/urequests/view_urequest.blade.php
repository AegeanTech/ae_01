@extends('master')

{{-- Page title --}}
@section('title')
Προβολή Αιτήματος
@parent
@stop

{{-- page level styles --}}
@section('header_styles')    
    <!--page level css starts here-->
	<link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css" />
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Προβολή Αιτήματος</h1>
                <ol class="breadcrumb">
                    <div id="date_sectiontime"></div>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row web-mail">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="whitebg">
                            {!! Form::open(['class' => '', 'url' => 'admin/urequests/manage/' . $urequest->id . '/view']) !!}
                            <input type="hidden" name="id" id="id" value="{{ $urequest->id  }}">
                            <input type="hidden" name="type" id="type" value="{{ $urequest->type  }}">
                            <table class="table table-striped table-advance">
                                <thead>
                                    <tr>
                                        <td colspan="4">
                                            <div class="col-md-8">
                                                <h4>
                                                    <strong>Αίτημα:</strong> {!! $urequest->type !!}
                                                </h4>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="4">
                                        <div class="row no-padding">
                                            <div class="col-md-12">
                                                <strong>Suburl: </strong><a href="{{ URL::to('admin/suburls/'. $urequest->sid . '/edit') }}" target="_blank" style="display: inline;">{!! $urequest->sites->suburl !!}</a>
                                                &nbsp;&nbsp;&nbsp;
                                                <strong>Χρήστης: </strong><a href="{{ URL::to('admin/users/'. $urequest->uid . '') }}" target="_blank" style="display: inline;">{!! $urequest->users->last_name . ' ' . $urequest->users->first_name !!}</a>
                                                &nbsp;&nbsp;&nbsp;
                                                <strong>Ενεργό Πακέτο: </strong>@if ($urequest->sites->group == 'R') {!! 'Κόκκινο' !!} @elseif ($urequest->sites->group == 'G') {!! 'Πράσινο' !!} @else {!! 'Μπλέ' !!} @endif
                                                &nbsp;&nbsp;&nbsp;
                                                <strong>Ημερομηνία Καταχώρησης: </strong>@if($urequest->created_at == '0000-00-00 00:00:00') {!! '-' !!} @else {!! date('d/m/Y', strtotime($urequest->created_at)) !!}  @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                        <div class="row no-padding">
                                            <div class="col-md-12">
                                                <strong>Κατάσταση:</strong>
                                                {!! $urequest->status !!}
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <b> Τύπος Αιτήματος: </b>
                                                    {!! $urequest->type !!}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>Περιγραφή Αιτήματος:</strong>
                                                    {!! $urequest->description !!}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-2">
                                                        <b>Κατάσταση:</b>
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! Form::select('status', [
                                                        'Εκκρεμεί' => 'Εκκρεμεί',
                                                        'Ολοκληρώθηκε' => 'Ολοκληρώθηκε',
                                                        'Ακυρώθηκε' => 'Ακυρώθηκε'], $urequest->status, ['id' => 'status', 'class' => 'form-control', 'style' => 'width:auto;']) !!}
                                                    </div>
                                                    <div class="col-md-2">
                                                        {!!Form::button('<span class="fa fa-floppy-o"></span> Αποθήκευση ',['class'=>'btn btn-sm btn-primary', 'type'=>'submit'])!!}
                                                        <input type="reset" onclick="location.href='{{ URL::to('admin/urequests/manage/list/all') }}';" class="btn btn-default" value="Άκυρο"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
