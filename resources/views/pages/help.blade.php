@extends('master')

{{-- Page title --}}
@section('title')
    Επεξήγηση Σελίδας
    @parent
    @stop

    {{-- page level styles --}}
    @section('header_styles')
            <!--page level css -->
    <link href="{{ asset('assets/vendors/wizard/jquery-steps/css/wizard.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/wizard/jquery-steps/css/jquery.steps.css') }}" rel="stylesheet" />
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>
            <i class="livicon" data-name="info" data-size="16" data-loop="true" data-c="#333" data-hc="#333"></i>
            Οδηγίες Σελίδας
        </h1>
        <ol class="breadcrumb">
            <div id="date_section"></div>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                {{--<iframe width="100%"  height="1000px" style="overflow:hidden;" src="{{ URL::to('admin/context') }}" frameborder="0" allowfullscreen></iframe>--}}
                <div class="fluidMedia">
                    <iframe name="help" src="{{ URL::to('admin/context') }}" width="100%" frameborder="0"></iframe>
                </div>
            </div>
        </div>
        <!--row end-->
        <!--main content ends-->
    </section>
        <style>
            .fluidMedia {
                position: relative;
                padding-bottom: 56.25%; /* proportion value to aspect ratio 16:9 (9 / 16 = 0.5625 or 56.25%) */
                padding-top: 30px;
                height: 0;
                overflow: hidden;
            }

            .fluidMedia iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            </style>
    @stop

    {{-- page level scripts --}}
    @section('footer_scripts')
            <!-- begining of page level js -->
    <script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wizard/jquery-steps/js/wizard.js') }}"></script>
    <script src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('assets/vendors/wizard/jquery-steps/js/form_wizard.js') }}"></script>
    <script src="{{ asset('assets/js/pages/formwizard.js') }}"></script>
@stop