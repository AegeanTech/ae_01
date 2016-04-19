@extends('master')

{{-- Page title --}}
@section('title')
Διαχείριση Αρχείων
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('assets/vendors/spinner/dist/bootstrap-spinner.css') }}" rel="stylesheet" />
    <!-- end of page level css-->
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Διαχείριση Αρχείων</h1>
    <ol class="breadcrumb">
        <div id="date_sectiontime"></div>
    </ol>
</section>
<!--section ends-->
<section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box info">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="doc-portrait" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Διαχείριση Αρχείων
                                </div>
                            </div>
                            <div class="portlet-body">

                                {!! Form::open(['class' => 'form-horizontal', 'url' => 'admin/file/manage']) !!}

                                {{--@foreach ($files as $index => $file)--}}
                                    {{--<input type="hidden" name="id1[]" value="{{ $file->id }}">--}}
                                    {{--<input type="hidden" name="id2[]" value="{{ $file['id'] }}">--}}
                                {{--@endforeach--}}

                                <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Αρχείο</th>
                                                <th>Περιγραφή</th>
                                                <th>Έτος</th>
                                                <th>Κατάσταση</th>
                                                <th>Θέση</th>
                                                {{--<th>Header 5</th>--}}
                                                {{--<th>Header 6</th>--}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($files as $index => $file)

                                            <tr>
                                                <td>
                                                    <input type="hidden" name="id[]" value="{{ $file->id }}">
                                                    {{ $index+1 }}
                                                </td>
                                                <td><a href="{{ asset('uploads/files/' . $file->filename) }}" target="_blank">{{ $file->filename }}</a></td>
                                                <td>
                                                    <div class="input-group">
                                                        {!! Form::text('description[]', $file->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Περιγραφή αρχείου...')) !!}
                                                    </div>
                                                    {{--{{ $file->description }}--}}
                                                </td>
                                                <td>
                                                    {!! Form::select('year[]', [
                                                    '' => '-',
                                                    '1998' => '1998',
                                                    '1999' => '1999',
                                                    '2000' => '2000',
                                                    '2001' => '2001',
                                                    '2002' => '2002',
                                                    '2003' => '2003',
                                                    '2004' => '2004',
                                                    '2005' => '2005',
                                                    '2006' => '2006',
                                                    '2007' => '2007',
                                                    '2008' => '2008',
                                                    '2009' => '2009',
                                                    '2010' => '2010',
                                                    '2011' => '2011',
                                                    '2012' => '2012',
                                                    '2013' => '2013',
                                                    '2014' => '2014',
                                                    '2015' => '2015',
                                                    '2016' => '2016'], $file->description != '' ? $file->description : '-', ['id' => 'year' . $index, 'class' => 'form-control col-xs-9 year required', 'style' => 'width:auto;', 'tabindex' => '1']) !!}
                                                </td>
                                                <td>
                                                    {!! Form::select('status[]', [
                                                    'Ενεργό' => 'Ενεργό',
                                                    'Ανενεργό' => 'Ανενεργό'], $file->status, ['id' => 'status', 'class' => 'form-control col-xs-9 status required', 'style' => 'width:auto;', 'tabindex' => '1']) !!}
                                                    {{--{{ $file->status }}--}}
                                                </td>
                                                <td>
                                                    <div class="input-group spinner" data-trigger="spinner">
                                                        <input type="text" name="order[]" value="{{ $file->order }}" data-rule="quantity">
                                                        <div class="input-group-addon">
                                                            <a href="javascript:;" class="spin-up" data-spin="up">
                                                                <i class="glyphicon glyphicon-chevron-up"></i>
                                                            </a>
                                                            <a href="javascript:;" class="spin-down" data-spin="down">
                                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <hr>
                                            {!!Form::button('<span class="fa fa-floppy-o"></span> Αποθήκευση ',['class'=>'btn btn-responsive btn-primary', 'type'=>'submit'])!!}
                                            <input type="reset" onclick="location.href='{{ URL::to('admin/file') }}';" class="btn btn-default" value="Άκυρο"/>
                                        </div>
                                    </div>

                                    {!! Form::close() !!}

                            </div>
                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/table-responsive.js') }}"></script>

    <!--Year Selection-->
    <script>
        $( document ).ready(function(){
            $(".year").change(function(){
                var curent = $(this);
                var selVal=[];
                console.log($('option:selected',this).val()) ;
                $(".year").each(function(){
                    selVal.push(this.value);
                });
                console.log(selVal);

                $(".year").each(function(){
                    $(this).not(curent).find("option").removeAttr("disabled").filter(function(){
                        var a=$(this).parent("select").val();
                        console.log(a);
                        return (($.inArray(this.value, selVal) > -1) && (this.value!=a))
                    }).attr("disabled","disabled");
                });

                if ($('option:selected',this).val() === '') {
                    $(".status").each(function() {
                        $(this).prop("disabled", true);
                        $(this).val("Ανενεργό");
                    });
                } else {
                    $(".status").each(function() {
                        $(this).prop("disabled", false);
                    });
                }

                $(".year").each(function(){
                    if ($.inArray('', selVal) != -1)
                    {
                        $(".status").each(function() {
                            $(this).prop("disabled", true);
                            $(this).val("Ανενεργό");
                        });
                    }
                });

//                $(this).siblings(".year").find("option").removeAttr("disabled").filter(function(){
//                    var a=$(this).parent("select").val();
//                    console.log(a);
//                    return (($.inArray(this.value, selVal) > -1) && (this.value!=a))
//                }).attr("disabled","disabled");
            });

            $(".year").eq(0).trigger('change');
        });
    </script>

    <!--spinner-->
    <script src="{{ asset('assets/vendors/spinner/dist/jquery.spinner.min.js') }}" ></script>
    <script src="{{ asset('assets/js/pages/pickers.js') }}" ></script>
@stop