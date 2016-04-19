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
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="whitebg">
                            <ul>
                                <li class="compose">
                                    <a href="{{ URL::to('admin/urequests') }}">
                                        <i class="livicon" data-n="pen" data-s="16" data-c="white"></i>
                                        &nbsp; &nbsp;Υποβολή
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="{{ route('user.urequest.list') }}">
                                        <i class="livicon" data-n="inbox" data-s="16" data-c="white"></i>
                                        &nbsp; &nbsp;Λίστα Αιτημάτων
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8">
                        <div class="whitebg">
                            <table class="table table-striped table-advance">
                                <thead>
                                    <tr>
                                        <td colspan="4">
                                            <div class="col-md-8">
                                                <h4>
                                                    <strong>Αίτημα</strong>
                                                </h4>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <div class="row no-padding">
                                                <b>Κατάσταση:</b>
                                                {!! $urequest->status !!}
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            <br>
                                            <b> {!! $urequest->type !!} </b>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br>
                                                    {!! $urequest->description !!}
                                                    <br>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
