@extends('master')

{{-- Page title --}}
@section('title')
Editable Datatables
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/extensions/Responsive/css/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}"  />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Επεξεργασία Suburl</h1>
                <ol class="breadcrumb">
                    <div id="date_sectiontime"></div>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Second Data Table -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box default">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="link" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Πίνακας Suburl
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="btn-group">
                                        <button id="sample_editable_1_new" class=" btn btn-custom">
                                            Προσθήκη Νέου
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="sample_editable_1_wrapper" class="">
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1">Suburl</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Ταξινόμηση
                                            : activate to sort column ascending" style="width: 222px;">Ταξινόμηση</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Επεξεργασία
                                            : activate to sort column ascending" style="width: 88px;">Επεξεργασία</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Διαγραφή
                                            : activate to sort column ascending" style="width: 125px;">Διαγραφή</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?Php $oddloop=TRUE; ?>
                                        @foreach ($suburls as $suburl)
                                            <?Php if ($oddloop==TRUE){?>
                                            <tr role="row" class="odd">
                                            <?Php $oddloop=FALSE;}
                                            elseif ($oddloop==FALSE){?>
                                            <tr role="row" class="even">
                                                <?Php $oddloop=TRUE;} ?>
                                                <td class="sorting_1">{!! $suburl->suburl !!}</td>
                                                <td class="center">@if($suburl->master == 1){{ 'Πρωτεύον' }}@else{!! 'Δευτερεύον' !!}@endif</td>
                                                <td>
                                                    <a class="edit" href="javascript:;">Επεξεργασία</a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;">Διαγραφή</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tipospu/pages/table-editable.js') }}" ></script>
@stop
