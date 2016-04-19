@extends('master')

{{-- Page title --}}
@section('title')
Προβολή Μηνύματος
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
                <h1>Προβολή Μηνύματος</h1>
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
                            {!! Form::open(['class' => '', 'url' => 'admin/umessages/view/edit']) !!}
                            <table class="table table-striped table-advance">
                                <thead>
                                <tr>
                                    <td colspan="4">
                                        <div class="col-md-8">
                                            <h4>
                                                <strong>Προβολή Μηνύματος</strong>
                                            </h4>
                                            @if($contents->state == 'readen')
                                                {{ '(Διαβασμένο)' }}
                                            @else
                                                {{ '(Μη διαβασμένο)' }}
                                            @endif
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
                                                    <input type="hidden" name="id" id="id" value="{{ $umessage->id  }}">
                                                    <input type="hidden" name="sid" id="sid" value="{{ $umessage->sid  }}">
                                                    <div class="form-group">
                                                        <label class="col-xs-2 hidden-xs" for="type">Τύπος:</label>
                                                        {!! Form::select('type', [
                                                        'danger' => 'Σημαντική ειδοποίηση',
                                                        'warning' => 'Προειδοποίηση',
                                                        'success' => 'Ενημέρωση',
                                                        'info' => 'Ειδοποίηση'], $umessage->type, ['id' => 'type', 'class' => 'form-control col-xs-9 required', 'style' => 'width:auto;', 'tabindex' => '1']) !!}
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <div class="clear"></div>
                                                    <label class="col-xs-2 hidden-xs" for="status">Κατάσταση:</label>
                                                    {!! Form::select('status', [
                                                    'active' => 'Ενεργό',
                                                    'inactive' => 'Ανενεργό'], $umessage->status, ['id' => 'type', 'class' => 'form-control col-xs-9 required', 'style' => 'width:auto;', 'tabindex' => '1']) !!}
                                                    </div>
                                                    </br>
                                                    <div class="clear"></div>
                                                    <div class="form-group">
                                                        <label class="col-xs-2 hidden-xs" for="description">Κείμενο:</label>
                                                        {!! Form::textarea('description', $umessage->description,
                                                        array('id' => 'description', 'class' => 'form-control required textarea col-xs-9', 'size' => '30x5', 'placeholder' => 'Κείμενο μηνύματος...', 'style' => 'width:auto;', 'tabindex' => '1')) !!}
                                                    </div>
                                                    <div class="clear"></div>
                                                    <div class='box-body pad col-sm-12'>
                                                        <form>
                                                            <div id="summernote"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        {{--</div>--}}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100%">
                                        <div class="row">
                                            <div class="col-md-8">
                                                {!!Form::button('<span class="fa fa-floppy-o"></span> Αποθήκευση ',['class'=>'btn btn-sm btn-primary', 'type'=>'submit'])!!}
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
@stop
