@extends('master')

{{-- Page title --}}
@section('title')
Υποβολή Νέου Μηνύματος
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/summernote/dist/summernote.css') }}" rel="stylesheet" media="screen"
          xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"/>
    <link href="{{ asset('assets/vendors/summernote/dist/summernote-bs3.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Μηνύματα</h1>
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
                    <li class="primary">
                        <a href="{{ URL::to('admin/umessages/' . $contents->id . '/list/all') }}">
                            <i class="livicon" data-n="bell" data-s="16" data-c="white"></i>
                            &nbsp; &nbsp;Όλα
                        </a>
                    </li>
                    </br>
                    <li class="danger">
                        <a href="{{ URL::to('admin/umessages/' . $contents->id . '/list/danger') }}">
                            <i class="livicon" data-n="bell" data-s="16" data-c="gray"></i>
                            &nbsp; &nbsp;Σημαντικές Ειδοποιήσεις
                        </a>
                    </li>
                    </br>
                    <li class="warning">
                        <a href="{{ URL::to('admin/umessages/' . $contents->id . '/list/warning') }}">
                            <i class="livicon" data-n="bell" data-s="16" data-c="gray"></i>
                            &nbsp; &nbsp;Προειδοποιήσεις
                        </a>
                    </li>
                    </br>
                    <li class="success">
                        <a href="{{ URL::to('admin/umessages/' . $contents->id . '/list/success') }}">
                            <i class="livicon" data-n="bell" data-s="16" data-c="gray"></i>
                            &nbsp; &nbsp;Ενημερώσεις
                        </a>
                    </li>
                    </br>
                    <li class="info">
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
                {!! Form::open(['class' => '', 'url' => 'admin/umessages/create']) !!}
                <input type="hidden" name="uid" id="uid" value="{{ $contents->uid  }}">
                <input type="hidden" name="sid" id="sid" value="{{ $contents->id  }}">
                <input type="hidden" name="state" id="state" value="unread">
                <table class="table table-striped table-advance">
                    <thead>
                    <tr>
                        <td colspan="4">
                            <div class="col-md-8">
                                <h4>
                                    <strong>Υποβολή Μηνύματος</strong>
                                </h4>
                            </div>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <div class="col-md-4">
                                <h5>
                                    <strong>Επωνυμία:</strong>
                                </h5>
                                {{ $contents->name }}
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="col-md-4">
                                <h5>
                                    <strong>Suburl:</strong>
                                </h5>
                                {{ $contents->suburl }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="compose row">
                                        <div class="form-group">
                                        <label class="col-xs-2 hidden-xs" for="type">Τύπος:</label>
                                            {!! Form::select('type', [
                                            'danger' => 'Σημαντική ειδοποίηση',
                                            'warning' => 'Προειδοποίηση',
                                            'success' => 'Ενημέρωση',
                                            'info' => 'Ειδοποίηση'], null, ['id' => 'type', 'class' => 'form-control col-xs-9 required', 'style' => 'width:auto;', 'tabindex' => '1']) !!}
                                        </div>
                                        </br>

                                        </br>
                                        <div class="clear"></div>
                                        <label class="col-xs-2 hidden-xs" for="status">Κατάσταση:</label>
                                        {!! Form::select('status', [
                                        'active' => 'Ενεργό',
                                        'inactive' => 'Ανενεργό'], null, ['id' => 'type', 'class' => 'form-control col-xs-9 required', 'style' => 'width:auto;', 'tabindex' => '1']) !!}
                                        </div>
                                        </br>
                                        <div class="clear"></div>

                                        <div class="clear"></div>
                                        <div class="form-group">
                                            <label class="col-xs-2 hidden-xs" for="triggered_at">Έναρξη:</label>
                                            <div class="col-xs-2 hidden-xs">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="triggered_at" name="triggered_at" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value=""/>
                                                </div>
                                            </div>
                                        </div>

                                        </br>
                                        </br>

                                        <div class="clear"></div>
                                        <div class="form-group">
                                            <label class="col-xs-2 hidden-xs" for="expired_at">Λήξη:</label>
                                            <div class="col-xs-2 hidden-xs">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="expired_at" name="expired_at" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value=""/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clear"></div>
                                        <div class="form-group">
                                            <label class="col-xs-2 hidden-xs" for="description">Κείμενο:</label>
                                            {!! Form::textarea('description', null, array('id' => 'description', 'maxlength' => '1000', 'class' => 'form-control required', 'size' => '30x5', 'placeholder' => 'Κείμενο μηνύματος...')) !!}
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

    <!-- InputMask -->
    <script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/input-mask/jquery.inputmask.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/input-mask/jquery.inputmask.date.extensions.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/input-mask/jquery.inputmask.extensions.js') }}"  type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets/vendors/daterangepicker/daterangepicker.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}"  type="text/javascript"></script>
    
@stop
