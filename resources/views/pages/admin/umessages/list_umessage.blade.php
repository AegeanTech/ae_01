@extends('master')

{{-- Page title --}}
@section('title')
Λίστα Μηνυμάτων
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/css/pages/alertmessage.css') }}" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
    <link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css" />
    <!-- page level css ends-->
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Λίστα Μηνυμάτων</h1>
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
                                    <a href="{{ URL::to('admin/umessages/' . $contents->id . '/create') }}">
                                        <i class="livicon" data-n="pen" data-s="16" data-c="white"></i>
                                        &nbsp; &nbsp;Υποβολή
                                    </a>
                                </li>
                                </br>
                                <li class="primary @if(Request::is('admin/umessages/*/list/all')){{ 'active' }}@endif">
                                    <a href="{{ URL::to('admin/umessages/' . $contents->id . '/list/all') }}">
                                        <i class="livicon" data-n="bell" data-s="16" data-c="white"></i>
                                        &nbsp; &nbsp;Όλα
                                    </a>
                                </li>
                                </br>
                                <li class="danger @if(Request::is('admin/umessages/*/list/danger')){{ 'active' }}@endif">
                                    <a href="{{ URL::to('admin/umessages/' . $contents->id . '/list/danger') }}">
                                        <i class="livicon" data-n="bell" data-s="16" data-c="gray"></i>
                                        &nbsp; &nbsp;Σημαντικές Ειδοποιήσεις
                                    </a>
                                </li>
                                </br>
                                <li class="warning @if(Request::is('admin/umessages/*/list/warning')){{ 'active' }}@endif">
                                    <a href="{{ URL::to('admin/umessages/' . $contents->id . '/list/warning') }}">
                                        <i class="livicon" data-n="bell" data-s="16" data-c="gray"></i>
                                        &nbsp; &nbsp;Προειδοποιήσεις
                                    </a>
                                </li>
                                </br>
                                <li class="success @if(Request::is('admin/umessages/*/list/success')){{ 'active' }}@endif">
                                    <a href="{{ URL::to('admin/umessages/' . $contents->id . '/list/success') }}">
                                        <i class="livicon" data-n="bell" data-s="16" data-c="gray"></i>
                                        &nbsp; &nbsp;Ενημερώσεις
                                    </a>
                                </li>
                                </br>
                                <li class="info @if(Request::is('admin/umessages/*/list/info')){{ 'active' }}@endif">
                                    <a href="{{ URL::to('admin/umessages/' . $contents->id . '/list/info') }}">
                                        <i class="livicon" data-n="bell" data-s="16" data-c="gray"></i>
                                        &nbsp; &nbsp;Ειδοποιήσεις
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
                                                    <strong>Λίστα Μηνυμάτων</strong>
                                                </h4>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($umessages as $umessage)
                                        <tr role="row" class="odd">
                                            <td class="view-message hidden-xs text-right">
                                                <a href="{{ URL::to('admin/umessages/'. $umessage->id . '/view') }}"><b>Κατάσταση χρήστη:</b></a>
                                            </td>
                                            <td class="view-message muted">
                                                <a href="{{ URL::to('admin/umessages/'. $umessage->id . '/view') }}">
                                                    @if($umessage->state == 'unread')
                                                        {!! '<span class =""> Μη διαβασμένο </span>'  !!}
                                                    @else
                                                        {!! '<span class ="text-muted"> Διαβασμένο </span>'  !!}
                                                    @endif
                                                </a>
                                            </td>
                                            <td class="view-message hidden-xs text-right">
                                                <a href="{{ URL::to('admin/umessages/'. $umessage->id . '/view') }}"><b>Κατάσταση:</b></a>
                                            </td>
                                            <td class="view-message">
                                                <a href="{{ URL::to('admin/umessages/'. $umessage->id . '/view') }}">
                                                    @if($umessage->status == 'active')
                                                        {!! '<span class =""> Ενεργό </span>'  !!}
                                                    @else
                                                        {!! '<span class ="text-muted"> Ανενεργό </span>'  !!}
                                                    @endif
                                                </a>
                                            </td>
                                            <td class="view-message hidden-xs text-right">
                                                <a href="{{ URL::to('admin/umessages/'. $umessage->id . '/view') }}"><b>Υποβλήθηκε:</b></a>
                                            </td>
                                            <td class="view-message hidden-xs">
                                                <a href="{{ URL::to('admin/umessages/'. $umessage->id . '/view') }}">@if($umessage->created_at == '0000-00-00 00:00:00') {!! '-' !!} @else {!! date('d/m/Y', strtotime($umessage->created_at)) !!}  @endif</a>
                                            </td>
                                            <td class="view-message hidden-xs text-right">
                                                <a href="{{ URL::to('admin/umessages/'. $umessage->id . '/view') }}"><b>Τελευταία αλλαγή:</b></a>
                                            </td>
                                            <td class="view-message hidden-xs">
                                                <a href="{{ URL::to('admin/umessages/'. $umessage->id . '/view') }}">@if($umessage->updated_at == '0000-00-00 00:00:00') {!! '-' !!} @else {!! date('d/m/Y', strtotime($umessage->updated_at)) !!}  @endif</a>
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
