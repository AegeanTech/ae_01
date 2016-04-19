@extends('master')

{{-- Page title --}}
@section('title')
Προσθήκη Χρήστη
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link rel="stylesheet" href="{{ asset('assets/vendors/wizard/jquery-steps/css/wizard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/wizard/jquery-steps/css/jquery.steps.css') }}">
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Προσθήκη Νέου Χρήστη</h1>
        <ol class="breadcrumb">
            <div id="date_section"></div>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Add New User
                        </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <!-- errors -->
                        <div class="has-error">
                            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('group', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('pic', '<span class="help-block">:message</span>') !!}
                        </div>

                        <!--main content-->
                        <div class="col-md-12">

                            <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                            <form class="form-wizard form-horizontal" action="{{ route('create/user') }}" method="POST" id="wizard-validation" enctype="multipart/form-data">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <!-- first tab -->
                                <h1>User Profile</h1>

                                <section>

                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-2 control-label">Όνομα *</label>
                                        <div class="col-sm-10">
                                            <input id="first_name" name="first_name" type="text" placeholder="Όνομα" class="form-control required" value="{!! Input::old('first_name') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name" class="col-sm-2 control-label">Επίθετο *</label>
                                        <div class="col-sm-10">
                                            <input id="last_name" name="last_name" type="text" placeholder="Επίθετο" class="form-control required" value="{!! Input::old('last_name') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" placeholder="E-Mail" type="text" class="form-control required email" value="{!! Input::old('email') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">Κωδικός *</label>
                                        <div class="col-sm-10">
                                            <input id="password" name="password" type="password" placeholder="Κωδικός" class="form-control required" value="{!! Input::old('password') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirm" class="col-sm-2 control-label">Επιβεβαίωση Κωδικού *</label>
                                        <div class="col-sm-10">
                                            <input id="password_confirm" name="password_confirm" type="password" placeholder="Επιβεβαίωση Κωδικού " class="form-control required" value="{!! Input::old('password_confirm') !!}" />
                                        </div>
                                    </div>

                                    <p>(*) Υποχρεωτικά Πεδία</p>

                                </section>

                                <!-- second tab -->
                                <h1>Ομάδα Χρηστών</h1>

                                <section>

                                    <p class="text-danger"><strong>Να είσαστε προσεκτικοί με την επιλογή ομάδας χρηστών, σε περίπτωση που δώσετε δικαιώματα διαχειριστή.</strong></p>
                                    <div class="form-group">
                                        <label for="group" class="col-sm-2 control-label">Ομάδα *</label>
                                        <div class="col-sm-10">
                                            <select class="form-control " title="Επιλέξτε ομάδα..." name="group" id="group">
                                                <option value="">Επιλογή</option>
                                                @foreach($groups as $group)
                                                    <option value="{{ $group->id }}" @if($group->id == Input::old('group')) selected="selected" @endif >{{ $group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="activate" class="col-sm-2 control-label"> Ενεργοποίηση Χρήστη</label>
                                        <div class="col-sm-10">
                                            <input id="activate" name="activate" type="checkbox" class="pos-rel p-l-30" value="1" @if(Input::old('activate')) checked="checked" @endif  >
                                        </div>
                                        <span>Σε περίπτωση που ο χρήστης δεν είναι ενεργοποιημένος, ένα mail θα σταλεί με τον σύνδεσμο ενεργοποίησης.</span>
                                    </div>


                                </section>

                            </form>
                            <!-- END FORM WIZARD WITH VALIDATION -->
                        </div>
                        <!--main content end-->
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form_wizard.js') }}"></script>
@stop