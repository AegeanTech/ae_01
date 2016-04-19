@extends('master')

{{-- Page title --}}
@section('title')
Υποβολή Νέου Αιτήματος
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/summernote/dist/summernote.css') }}" rel="stylesheet" media="screen"
          xmlns="http://www.w3.org/1999/html"/>
    <link href="{{ asset('assets/vendors/summernote/dist/summernote-bs3.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Αιτήματα</h1>
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
                    <li>
                        <a href="{{ route('user.urequest.list') }}">
                            <i class="livicon" data-n="inbox" data-s="16" data-c="gray"></i>
                            &nbsp; &nbsp;Λίστα Αιτημάτων
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-8">
            <div class="whitebg">
                {!! Form::open(['class' => '', 'url' => 'admin/urequests/save']) !!}
                <input type="hidden" name="uid" id="uid" value="{{ $content->uid  }}">
                <input type="hidden" name="sid" id="sid" value="{{ $content->id  }}">
                <input type="hidden" name="status" id="status" value="Εκκρεμεί">
                <table class="table table-striped table-advance">
                    <thead>
                    <tr>
                        <td colspan="4">
                            <div class="col-md-8">
                                <h4>
                                    <strong>Υποβολή Αιτήματος</strong>
                                </h4>
                            </div>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="compose row">
                                        <div class="form-group">
                                        <label class="col-xs-2 hidden-xs" for="type">Τύπος:</label>
                                            {!! Form::select('type', [
                                            'Αναβάθμιση πακέτου' => 'Αναβάθμιση πακέτου',
                                            'Αλλαγή ονόματος (Suburl)' => 'Αλλαγή ονόματος (Suburl)',
                                            'Προσθήκη επαγγελματικής κατηγορίας' => 'Προσθήκη επαγγελματικής κατηγορίας',
                                            'Άλλο' => 'Άλλο'], null, ['id' => 'type', 'class' => 'form-control col-xs-9 required', 'style' => 'width:auto;', 'tabindex' => '1']) !!}
                                        </div>
                                        </br>
                                        <div class="clear"></div>
                                        <div class="form-group">
                                            <label class="col-xs-2 hidden-xs" for="description">Περιγραφή:</label>
                                            {!! Form::textarea('description', null,
                                            array('id' => 'description', 'class' => 'form-control required col-xs-9', 'size' => '30x5', 'placeholder' => 'Περιγραφή αιτήματος...', 'style' => 'width:auto;', 'tabindex' => '1')) !!}
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="100%">
                            <div class="row">
                                <div class="col-md-8">
                                    {!!Form::button('<span class="fa fa-floppy-o"></span> Υποβολή ',['class'=>'btn btn-sm btn-primary', 'type'=>'submit'])!!}
                                        {{--<a href="{{ URL::to('admin/inbox') }}" class="btn btn-sm btn-primary">--}}
                                            {{--<span class="livicon" data-n="external-link" data-s="18" data-c="white" data-hc="white"></span>--}}
                                            {{--Υποβολή--}}
                                        {{--</a>--}}
                                </div>
                            </div>
                        </td>
                        <td width="3%"></td>
                        <td width="13%" class="view-message text-right">&nbsp;</td>
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

    <script  src="{{ asset('assets/vendors/summernote/dist/summernote.min.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/js/pages/add_newblog.js') }}"  type="text/javascript"></script>
    <script type="text/javascript">
    $('#slimscrollside').slimscroll({
        height: '700px',
        size: '3px',
        color: 'black',
        opacity: .3

    });
    </script>
    
@stop
