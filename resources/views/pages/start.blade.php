@extends('master')

{{-- Page title --}}
@section('title')
    Φόρμα Wizard
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link href="{{ asset('assets/vendors/wizard/jquery-steps/css/wizard.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/wizard/jquery-steps/css/jquery.steps.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/vendors/validation/dist/css/bootstrapValidator.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/vendors/image-picker/image-picker.css') }}" rel="stylesheet" />
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>
            <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#333" data-hc="#333"></i>
            Προφίλ Επιχείρησης
        </h1>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Οδηγός Δημιουργίας Προφίλ Επιχείρησης
                        </h3>
                    {{--<span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>--}}
                    </div>
                    <div class="panel-body">
                        <!--main content-->
                        <div class="row">

                            <div class="col-md-12">
                                {{--<h3>Οδηγός Δημιουργίας Προφίλ Επιχείρησης</h3>--}}

                                <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                                {!! Form::open(['class' => 'form-wizard', 'url' => 'admin/store', 'files' => true]) !!}
                                        <!--form class="form-wizard" action="#" method="POST"-->
                                <h1> Στοιχεία επιχείρησης</h1>
                                <section>
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group">
                                        <label for="name">Επωνυμία *</label>
                                        <div class="input-group">
                                        {!! Form::text('name', null, array('id' => 'name', 'class' => 'form-control required', 'required'=>'', 'placeholder' => 'Εισάγετε τον επωνυμία...')) !!}
                                        <span class="input-group-addon danger">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Διακριτικός τίτλος</label>
                                        <div class="input-group">
                                        {!! Form::text('title', null, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον διακριτικό τίτλο...')) !!}
                                        <span class="input-group-addon info">
                                            <span class="glyphicon glyphicon-asterisk"></span>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vatn">ΑΦΜ</label>
                                        <div class="input-group">
                                        {!! Form::text('vatn', null, array('id' => 'vatn', 'class' => 'form-control', 'maxlength' => '10', 'placeholder' => 'Εισάγετε το ΑΦΜ...')) !!}
                                        <span class="input-group-addon info">
                                            <span class="glyphicon glyphicon-asterisk"></span>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="doy">Δ.Ο.Υ.</label>
                                        <div class="input-group">
                                        {{--{!! Form::text('doy', null, array('id' => 'doy', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τη Δ.Ο.Υ.')) !!}--}}
                                        {{--{{ Form::select('doy', $doys) }}--}}
                                        {!! Form::select('doy', $doys, null, ['id' => 'doy_list', 'class' => 'form-control select2', 'placeholder' => 'Εισάγετε τη Δ.Ο.Υ.']) !!}
                                        <span class="input-group-addon info">
                                            <span class="glyphicon glyphicon-asterisk"></span>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="objects">Επαγγελματικό αντικείμενο *</label>
                                        <div class="input-group">
                                        {{--{!! Form::text('object', null, array('id' => 'object', 'class' => 'form-control required', 'placeholder' => 'Εισάγετε το επαγγελματικό αντικείμενο...')) !!}--}}
                                        {{--{!! Form::select('object[]', $objects, null, ['class' => 'form-control', 'select2']) !!}--}}
                                        {!! Form::select('objects[]', $objects, null, ['id' => 'object_list', 'class' => 'form-control', 'required'=>'', 'multiple']) !!}
                                        <span class="input-group-addon danger">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </span>
                                        </div>
                                    </div>
                                    <p>Σε περίπτωση που το επάγγελμα που επιθυμείτε δεν βρίσκεται στην λίστα, επιλέξτε το <i>Άλλο</i> από την λίστα επαγγελμάτων και στην συνέχεια εισάγετε παρακάτω το επάγγελμα σας.</p>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            Νέο επάγγελμα:
                                        </div>
                                        {!! Form::text('request_desctription', null, array('id' => 'request_description', 'class' => 'form-control', 'placeholder' => 'Περιγραφή νέου επαγγέλματος...')) !!}
                                    </div>
                                    <div class="">
                                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                                        <label for="acceptTerms">Έχω διαβάσει τους όρους χρήσης.</label>
                                    </div>

                                    <p>(*) Υποχρεωτικό πεδίο</p>
                                </section>
                                <h1> Στοιχεία επικοινωνίας</h1>
                                <section>
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group">
                                        <label for="address">Στοιχεία διεύθυνσης *</label>
                                        <div class="input-group">
                                        {{--{!! Form::text('address', null, array('id' => 'address', 'class' => 'form-control required', 'placeholder' => 'Εισάγετε λίγα λόγια για την επιχείρηση σας')) !!}--}}
                                        {!! Form::text('address', null, array('id' => 'address', 'class' => 'form-control required', 'required'=>'', 'placeholder' => 'Εισάγετε τα στοιχεία διεύθυνσης της επιχείρησης')) !!}
                                        <input type="hidden" name="lat" id="lat" value="">
                                        <input type="hidden" name="lng" id="lng" value="">
                                        <input type="hidden" name="city" id="my_new_city" value="">
                                        <input type="hidden" name="state" id="my_new_state" value="">
                                        <input type="hidden" name="postalcode" id="my_new_postalcode" value="">
                                        <span class="input-group-addon danger">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Τηλέφωνο *</label>
                                        <div class="input-group" data-validate="phone">
                                        {!! Form::text('phone', null, array('id' => 'phone', 'class' => 'form-control required', 'required'=>'', 'placeholder' => 'Εισάγετε το τηλέφωνο της επιχείρησης')) !!}
                                        <span class="input-group-addon danger">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="site">Site</label>
                                        <div class="input-group">
                                        {!! Form::text('site', null, array('id' => 'site', 'class' => 'form-control', 'placeholder' => 'Εισάγετε το site της επιχείρησης')) !!}
                                        <span class="input-group-addon info">
                                            <span class="glyphicon glyphicon-asterisk"></span>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail *</label>
                                        <div class="input-group" data-validate="email">
                                        {!! Form::text('email', null, array('id' => 'email', 'class' => 'form-control required email', 'required'=>'', 'placeholder' => 'Εισάγετε το e-mail της επιχείρησης')) !!}
                                        <span class="input-group-addon danger">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="form-group social-group">
                                        <label>Social Networks</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-facebook"></i>
                                            </div>
                                            {!! Form::text('socialf', null, array('id' => 'socialf', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον λογαριασμό του facebook...')) !!}
                                            <span class="input-group-addon info">
                                                    <span class="glyphicon glyphicon-asterisk"></span>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-twitter"></i>
                                            </div>
                                            {!! Form::text('socialt', null, array('id' => 'socialt', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον λογαριασμό του twitter...')) !!}
                                            <span class="input-group-addon info">
                                                    <span class="glyphicon glyphicon-asterisk"></span>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-instagram"></i>
                                            </div>
                                            {!! Form::text('sociali', null, array('id' => 'sociali', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον λογαριασμό του instagram...')) !!}
                                            <span class="input-group-addon info">
                                                    <span class="glyphicon glyphicon-asterisk"></span>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-linkedin"></i>
                                            </div>
                                            {!! Form::text('sociall', null, array('id' => 'sociall', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον λογαριασμό του linkedin...')) !!}
                                            <span class="input-group-addon info">
                                                    <span class="glyphicon glyphicon-asterisk"></span>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-youtube"></i>
                                            </div>
                                            {!! Form::text('socialy', null, array('id' => 'socialy', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον λογαριασμό του youtube...')) !!}
                                            <span class="input-group-addon info">
                                                    <span class="glyphicon glyphicon-asterisk"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <p>(*) Υποχρεωτικό πεδίο</p>
                                </section>

                                <h1> Περιγραφή επιχείρησης</h1>
                                <section>
                                    {{--<div class="form-group">--}}
                                        {{--<label for="Logo">Λογότυπο</label>--}}
                                        {{--{!! Form::text('logo', null, array('id' => 'logo', 'class' => 'form-control', 'placeholder' => 'Εισάγετε λογότυπο...')) !!}</div>--}}

                                    <div class="form-group">
                                        {!! Form::label('Λογότυπο') !!}
                                    </div>

                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img data-src="holder.js/256x256" alt="..."></div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                            <div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">
                                            Επιλογή εικόνας
                                        </span>
                                        <span class="fileinput-exists">Αλλαγή</span>
                                        <input type="file" name="logo"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Αφαίρεση</a>
                                            </div>
                                        </div>
                                    </div>

                                    {{--<div class="form-group">--}}
                                        {{--{!! Form::label('Λογότυπο') !!}--}}
                                        {{--{!! Form::file('logo') !!}</div>--}}
                                    <div class="form-group">
                                        {{--<label for="theme">Θέμα</label>--}}
                                        <div class="form-group">
                                            {{--<label for="theme">Θέμα</label>--}}
                                            {{--<select class="form-control">--}}
                                                {{--<option>Κόκκινο</option>--}}
                                                {{--<option>Κίτρινο</option>--}}
                                                {{--<option>Μπλε</option>--}}
                                            {{--</select>--}}
                                            @if((head($userRoles) == 'R-User') || (head($userRoles) == 'G-User'))
                                            <select id="select-theme" name="theme" class="image-picker show-html">
                                                <option data-img-src="{{ asset('assets/img/templates/00.png') }}" value="0">Θέμα 0</option>
                                                <option data-img-src="{{ asset('assets/img/templates/01.png') }}" value="1">Θέμα 1</option>
                                                <option data-img-src="{{ asset('assets/img/templates/02.png') }}" value="2">Θέμα 2</option>
                                                <option data-img-src="{{ asset('assets/img/templates/03.png') }}" value="3">Θέμα 3</option>
                                                <option data-img-src="{{ asset('assets/img/templates/04.png') }}" value="4">Θέμα 4</option>
                                            </select>
                                            @else
                                            <select id="select-theme" name="theme" class="image-picker show-html">
                                                <option data-img-src="{{ asset('assets/img/templates/01.png') }}" value="1">Θέμα 1</option>
                                                <option data-img-src="{{ asset('assets/img/templates/04.png') }}" value="4">Θέμα 4</option>
                                            </select>
                                            @endif
                                        {{--{!! Form::select('theme', [--}}
                                           {{--'1' => 'Κόκκινο',--}}
                                           {{--'2' => 'Κίτρινο',--}}
                                           {{--'3' => 'Μπλε']--}}
                                        {{--)  !!}--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="descriptionobj">Περιγραφή αντικειμένου *</label>
                                        {!! Form::textarea('descriptionobj', null, array('id' => 'descriptionobj', 'maxlength' => '1000', 'class' => 'form-control required', 'size' => '30x5', 'placeholder' => 'Εισάγετε περιγραφή αντικειμένου...')) !!}</div>
                                    <div class="form-group">
                                        <label for="description">Λίγα λόγια για εμας *</label>
                                        {!! Form::textarea('description', null, array('id' => 'description', 'maxlength' => '1000', 'class' => 'form-control required', 'size' => '30x5', 'placeholder' => 'Εισάγετε λίγα λόγια για εσάς...')) !!}</div>
                                    <div class="form-group">
                                        <label for="slogan">Απόφθεγμα (σλόγκαν)</label>
                                        {!! Form::text('slogan', null, array('id' => 'slogan', 'class' => 'form-control', 'placeholder' => 'Εισάγετε το απόφθεγμα (slogan) σας...')) !!}</div>
                                    <div class="form-group">
                                        <label>
                                            Κατάσταση
                                        </label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" id="optionsRadios1" value="0" checked>Υπο κατασκευή</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" id="optionsRadios2" value="1">Ενεργό</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" id="optionsRadios3" value="2">Ανενεργό</label>
                                        </div>
                                    <h2 class="hidden">&nbsp;</h2>
                                    <span>Όροι χρήσης</span>
                                    <div class="pos-rel p-l-30">
                                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="pos-rel p-l-30 required">
                                        <label for="acceptTerms">Έχω διαβάσει τους όρους χρήσης.</label>
                                    </div>
                                </section>
                                <!--/form-->

                                <!-- END FORM WIZARD WITH VALIDATION --> </div>
                        </div>
                        <!--main content end--> </div>
                </div>
            {{--</div>--}}
        </div>
        <!--row end-->
        <!--main content ends-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')


    <!--google-maps-->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&language=gr&hl=ja&q=paris" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tipospu/searchaddress.js') }}"></script>

    <!-- begining of page level js -->
    <script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/tipospu/validation-msg.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wizard/jquery-steps/js/wizard.js') }}"></script>
    <script src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('assets/vendors/wizard/jquery-steps/js/form_wizard.js') }}"></script>
    <script src="{{ asset('assets/js/pages/formwizard.js') }}"></script>

    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script>
        jQuery(document).ready(function (){
            jQuery('#doy_list').select2();
            jQuery('#object_list').select2();
        });
    </script>

    <script src="{{ asset('assets/vendors/validation/dist/js/bootstrapValidator.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/validation.js') }}"  type="text/javascript"></script>

    <!--livicons-->
    <script type="text/javascript" src="{{ asset('assets/vendors/maxlength/bootstrap-maxlength.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tipospu/editformelements.js') }}"></script>

    <!--livicons-->
    <script type="text/javascript" src="{{ asset('assets/vendors/image-picker/image-picker.min.js') }}"></script>
    <script>
        jQuery(document).ready(function (){
            // initialize imagepicker
            $("#select-theme").imagepicker();
            $('.image_picker_selector > li').css('list-style-type', 'none');
        });
    </script>

@stop