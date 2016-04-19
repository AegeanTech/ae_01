@extends('master')

{{-- Page title --}}
@section('title')
Λίστα Αιτημάτων
@parent
@stop

{{-- page level styles --}}
@section('header_styles')    
    
	<link href="{{ asset('assets/css/pages/alertmessage.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css" />
    <!-- page level css ends-->
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Λίστα Αιτημάτων</h1>
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
                            <table class="table table-striped table-advance table-hover" id="inbox-check">
                                <thead>
                                    <tr>
                                        <td colspan="4">
                                            <div class="col-md-8">
                                                <h4>
                                                    <strong>Λίστα Αιτημάτων</strong>
                                                </h4>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($urequests as $urequest)
                                        <tr role="row" class="odd">
                                            <td class="view-message hidden-xs text-right">
                                                <a href="{{ URL::to('admin/urequests/'. $urequest->id . '/view') }}"><b>Τύπος αιτήματος:</b></a>
                                            </td>
                                            <td class="view-message">
                                                <a href="{{ URL::to('admin/urequests/'. $urequest->id . '/view') }}">{!! $urequest->type !!}</a>
                                            </td>
                                            <td class="view-message hidden-xs text-right">
                                                <a href="{{ URL::to('admin/urequests/'. $urequest->id . '/view') }}"><b>Κατάσταση:</b></a>
                                            </td>
                                            <td class="view-message">
                                                <a href="{{ URL::to('admin/urequests/'. $urequest->id . '/view') }}">{!! $urequest->status !!}</a>
                                            </td>
                                            <td class="view-message hidden-xs text-right">
                                                <a href="{{ URL::to('admin/urequests/'. $urequest->id . '/view') }}"><b>Υποβλήθηκε:</b></a>
                                            </td>
                                            <td class="view-message hidden-xs">
                                                <a href="{{ URL::to('admin/urequests/'. $urequest->id . '/view') }}">@if($urequest->created_at == '0000-00-00 00:00:00') {!! '-' !!} @else {!! date('d/m/Y', strtotime($urequest->created_at)) !!}  @endif</a>
                                            </td>
                                            <td class="view-message hidden-xs text-right">
                                                <a href="{{ URL::to('admin/urequests/'. $urequest->id . '/view') }}"><b>Τελευταία αλλαγή:</b></a>
                                            </td>
                                            <td class="view-message hidden-xs">
                                                <a href="{{ URL::to('admin/urequests/'. $urequest->id . '/view') }}">@if($urequest->updated_at == '0000-00-00 00:00:00') {!! '-' !!} @else {!! date('d/m/Y', strtotime($urequest->updated_at)) !!}  @endif</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
    
    <script type="text/javascript">
    $('#slimscrollside').slimscroll({
        height: '700px',
        size: '3px',
        color: 'black',
        opacity: .3
    });
    </script>
    <script>
    $(document).ready(function() {
        $("#inbox-check #checkall").click(function() {

            if ($("#inbox-check #checkall").is(':checked')) {
                $("#inbox-check input[type=checkbox]").each(function() {
                    $(this).prop("checked", true);
                });
            } else {
                $("#inbox-check input[type=checkbox]").each(function() {
                    $(this).prop("checked", false);
                });
            }
        });
    });
    </script>
    
@stop
