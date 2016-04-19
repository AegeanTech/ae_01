@extends('master')

{{-- Page title --}}
@section('title')
Ενημερώσεις
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .table th, .table td {
            border-left: none !important;
            border-right: none !important;
        }
    </style>
    <link href="{{ asset('assets/vendors/switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" />
    <!-- end of page level css -->
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Ενημερώσεις</h1>
                <ol class="breadcrumb">
                    <div id="date_sectiontime"></div>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th colspan="2" class="primary">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="bell" data-size="18" data-color="white" data-hc="white" data-l="true"></i>Ενημερώσεις Χρήστη
                                    </h3>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($umessages as $umessage)
                                <tr class="{!! $umessage->type !!}">
                                    <td>
                                        <p id="umessage_text_{{ $umessage->id  }}" class="@if($umessage->state == 'readen') {!! 'text-muted' !!} @endif">
                                            {!! $umessage->description !!}
                                        </p>
                                    </td>
                                    <td>
                                        {!! Form::open(['class' => 'pull-right', 'url' => '']) !!}
                                        <input type="hidden" name="umessage_id" id="umessage_id_{{ $umessage->id  }}" value="{{ $umessage->id  }}">
                                        <input type="hidden" name="umessage_state" id="umessage_state_{{ $umessage->id  }}" value="{{ $umessage->state  }}">
                                        <input type="checkbox" name="my-checkbox" id="my_checkbox_{{ $umessage->id  }}" data-id="{{ $umessage->id  }}" data-on="default" class="make-switch pull-right" data-umsg_type="{!! $umessage->type !!}" @if($umessage->state == 'readen') {{ 'checked' }} @endif data-on-color="primary" data-on-text="&nbsp;&nbsp;Εμφάνιση&nbsp;&nbsp;" data-off-color="info" data-off-text="&nbsp;&nbsp;Απόκρυψη&nbsp;&nbsp;">
                                        {{--<button type="submit" id="umessage_button" class="btn btn-responsive button-alignment btn-default pull-right @if($umessage->state == 'readen') {!! 'disabled' !!} @endif">Εντάξει</button>--}}
                                        {{--{!!Form::button('Εντάξει',['id'=>'umessage_button', 'class'=>'btn btn-responsive button-alignment btn-default pull-right', 'type'=>'submit'])!!}--}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach

                            {{--<tr class="success">--}}
                                {{--<td>John</td>--}}
                                {{--<td>Doe</td>--}}
                                {{--<td>--}}
                                    {{--{!! Form::open(['class' => '', 'url' => 'admin/update']) !!}--}}
                                    {{--{!!Form::button('Εντάξει',['class'=>'btn btn-responsive button-alignment btn-default pull-right', 'type'=>'submit'])!!}--}}
                                    {{--{!!Form::close()!!}--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr class="danger">--}}
                                {{--<td>Mary</td>--}}
                                {{--<td>Moe</td>--}}
                                {{--<td>mary@example.com</td>--}}
                            {{--</tr>--}}
                            {{--<tr class="info">--}}
                                {{--<td>July</td>--}}
                                {{--<td>Dooley</td>--}}
                                {{--<td>july@example.com</td>--}}
                            {{--</tr>--}}
                            {{--<tr class="info disabled">--}}
                                {{--<td><p class="text-muted">July</p></td>--}}
                                {{--<td>Dooley</td>--}}
                                {{--<td>july@example.com</td>--}}
                            {{--</tr>--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/js/tipospu/umessages.js') }}" ></script>

    <!--time picker-->
    <script src="{{ asset('assets/vendors/timepicker/js/bootstrap-timepicker.min.js') }}" ></script>
    <!--datetime picker-->
    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}"  charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js') }}"  charset="UTF-8"></script>

    <!--touchspin-->
    <script src="{{ asset('assets/vendors/touchspin/dist/jquery.bootstrap-touchspin.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/multiselect/js/bootstrap-multiselect.js') }}" ></script>

    <!--switch-->
    <script src="{{ asset('assets/vendors/switch/dist/js/bootstrap-switch.js') }}" ></script>

    <!--spinner-->
    <script src="{{ asset('assets/vendors/spinner/dist/jquery.spinner.min.js') }}" ></script>
    <script src="{{ asset('assets/js/pages/pickers.js') }}" ></script>


@stop
