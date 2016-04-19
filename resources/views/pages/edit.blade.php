@extends('master')

{{-- Page title --}}
@section('title')
    Φόρμα Επεξεργασίας
    @parent
    @stop

    {{-- page level styles --}}
    @section('header_styles')
            <!--page level css -->
    <link href="{{ asset('assets/vendors/wizard/jquery-steps/css/wizard.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/wizard/jquery-steps/css/jquery.steps.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/vendors/image-picker/image-picker.css') }}" rel="stylesheet" />

    @if((head($userRoles) == 'R-User'))
    <!-- file upload -->
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <!-- multiple file upload -->
    <link rel="stylesheet" href="{{ asset('assets/css/pages/blueimp-gallery.min.css') }}" />
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/jQuery-File-Upload/css/jquery.fileupload.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jQuery-File-Upload/css/jquery.fileupload-ui.css') }}" />
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/vendors/jQuery-File-Upload/css/jquery.fileupload-noscript.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendors/jQuery-File-Upload/css/jquery.fileupload-ui-noscript.css') }}" />
    </noscript>
    @endif

    <!--text editor -->
    @if((head($userRoles) == 'R-User') || (head($userRoles) == 'G-User'))
        <link rel="stylesheet" href="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendors/tags/assets/app.css') }}" />
    <link href="{{ asset('assets/vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/stylesheets/bootstrap-wysihtml5/core-b3.css') }}"  rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>
    @endif
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
        <ol class="breadcrumb">
            <div id="date_sectiontime"></div>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Επεξεργασία Προφίλ Επιχείρησης
                            <i class="livicon" data-name="arrow-right" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            <span class="subtitle_step">
                                @if($step==1)
                                    {!!  '<span class="subtitle_step1"> Στοιχεία επιχείρησης </span>'  !!}
                                @elseif($step==2)
                                    {!!  '<span class="subtitle_step2"> Προφίλ Επιχείρησης </span>'  !!}
                                @elseif($step==3)
                                    {!!  '<span class="subtitle_step3"> Περιγραφή επιχείρησης </span>'  !!}
                                @else
                                    {!!  '<span class="subtitle_step1"> Στοιχεία επιχείρησης </span>'  !!}
                                @endif
                            </span>
                        </h3>
                        {{--<span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>--}}
                    </div>
                    <div class="panel-body">
                        <!--main content-->
                        <div class="row">

                            <div class="col-md-12">
                                {{--<h3>Επεξεργασία Προφίλ Επιχείρησης</h3>--}}
                                <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                                {!! Form::open(['class' => '', 'url' => 'admin/update', 'files' => true]) !!}
                                {{--{!! Form::open(['method' => 'PATCH', 'action' => ['EditController@storeEdit'], 'class' => '', 'files' => true]) !!}--}}
                                <div id="step01"

                                     @if($step==1)
                                     style="display:block;"
                                     @else
                                     style="display:none;"
                                        @endif
                                        >
                                    <section>
                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="form-group">
                                            <label for="name">Επωνυμία *</label>
                                            {!! Form::text('name', $content->name, array('id' => 'name', 'class' => 'form-control required', 'placeholder' => 'Εισάγετε τον επωνυμία...')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Διακριτικός τίτλος</label>
                                            {!! Form::text('title', $content->title, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον διακριτικό τίτλο...')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="vatn">ΑΦΜ</label>
                                            {!! Form::text('vatn', $content->vatn, array('id' => 'vatn', 'class' => 'form-control', 'maxlength' => '10', 'placeholder' => 'Εισάγετε το ΑΦΜ...')) !!}
                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<label for="doy">Δ.Ο.Υ.</label>--}}
                                            {{--{!! Form::text('doy', $content->doy, array('id' => 'doy', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τη Δ.Ο.Υ.')) !!}--}}
                                        {{--</div>--}}
                                        <div class="form-group">
                                            <label for="doy">Δ.Ο.Υ.</label>
                                            {{--{!! Form::text('doy', null, array('id' => 'doy', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τη Δ.Ο.Υ.')) !!}--}}
                                            {{--{{ Form::select('doy', $doys) }}--}}
                                            {!! Form::select('doy', $doys, null, ['id' => 'doy_list', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τη Δ.Ο.Υ.']) !!}
                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<label for="object">Επαγγελματικό αντικείμενο *</label>--}}
                                            {{--{!! Form::text('object', $content->object, array('id' => 'object', 'class' => 'form-control required', 'placeholder' => 'Εισάγετε το επαγγελματικό αντικείμενο...')) !!}--}}
                                        {{--</div>--}}
                                        <div class="form-group">
                                            <label for="objects">Επαγγελματικό αντικείμενο *</label>
                                            {{--{!! Form::text('object', null, array('id' => 'object', 'class' => 'form-control required', 'placeholder' => 'Εισάγετε το επαγγελματικό αντικείμενο...')) !!}--}}
                                            {{--{!! Form::select('object[]', $objects, null, ['class' => 'form-control', 'select2']) !!}--}}
                                            {!! Form::select('objects[]', $objects, null, ['id' => 'object_list', 'class' => 'form-control', 'multiple']) !!}
                                        </div>
                                        <p>Σε περίπτωση που το επάγγελμα που επιθυμείτε δεν βρίσκεται στην λίστα, επιλέξτε το <i>Άλλο</i> από την λίστα επαγγελμάτων και στην συνέχεια εισάγετε παρακάτω το επάγγελμα σας.</p>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                Νέο επάγγελμα:
                                            </div>
                                            {!! Form::text('request_desctription', null, array('id' => 'request_description', 'class' => 'form-control', 'placeholder' => 'Περιγραφή νέου επαγγέλματος...')) !!}
                                        </div>
                                        <br>
                                        <p>(*) Υποχρεωτικό πεδίο</p>
                                    </section>
                                </div>
                                <div id="step02"
                                     @if($step==2)
                                     style="display:block;"
                                     @else
                                     style="display:none;"
                                        @endif
                                        >
                                    <section>
                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="form-group">
                                            <label for="address">Στοιχεία διευθυνσης *</label>
                                            {!! Form::text('address', $content->address, array('id' => 'address', 'class' => 'form-control required', 'placeholder' => 'Εισάγετε λίγα λόγια για την επιχείρηση σας')) !!}
                                            <input type="hidden" name="lat" id="lat" value="{{ $content->lat  }}">
                                            <input type="hidden" name="lng" id="lng" value="{{ $content->lng  }}">
                                            <input type="hidden" name="city" id="my_new_city" value="{{ $content->city  }}">
                                            <input type="hidden" name="state" id="my_new_state" value="{{ $content->state  }}">
                                            <input type="hidden" name="postalcode" id="my_new_postalcode" value="{{ $content->postalcode  }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Τηλέφωνο *</label>
                                            {!! Form::text('phone', $content->phone, array('id' => 'phone', 'class' => 'form-control required', 'placeholder' => 'Εισάγετε τις συνεργαζόμενες εταιρείες της επιχείρησης')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="site">Site</label>
                                            {!! Form::text('site', $content->site, array('id' => 'site', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τις συνεργαζόμενες εταιρείες της επιχείρησης')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-mail *</label>
                                            {!! Form::text('email', $content->email, array('id' => 'email', 'class' => 'form-control required email', 'placeholder' => 'Εισάγετε τις συνεργαζόμενες εταιρείες της επιχείρησης')) !!}
                                        </div>
                                        <div class="form-group social-group">
                                            <label>Social Networks</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-facebook"></i>
                                                </div>
                                                {!! Form::text('socialf', $content->socialf, array('id' => 'socialf', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον λογαριασμό του facebook...')) !!}
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-twitter"></i>
                                                </div>
                                                {!! Form::text('socialt', $content->socialt, array('id' => 'socialt', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον λογαριασμό του twitter...')) !!}
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-instagram"></i>
                                                </div>
                                                {!! Form::text('sociali', $content->sociali, array('id' => 'sociali', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον λογαριασμό του instagram...')) !!}
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-linkedin"></i>
                                                </div>
                                                {!! Form::text('sociall', $content->sociall, array('id' => 'sociall', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον λογαριασμό του linkedin...')) !!}
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-youtube"></i>
                                                </div>
                                                {!! Form::text('socialy', $content->socialy, array('id' => 'socialy', 'class' => 'form-control', 'placeholder' => 'Εισάγετε τον λογαριασμό του youtube...')) !!}
                                            </div>
                                        </div>
                                        <p>(*) Υποχρεωτικό πεδίο</p>
                                    </section>
                                </div>
                                <div id="step03"
                                     @if($step==3)
                                     style="display:block;"
                                     @else
                                     style="display:none;"
                                        @endif
                                        >
                                    <section>
                                        {{--<div class="form-group">--}}
                                        {{--<label for="Logo">Λογότυπο</label>--}}
                                        {{--{!! Form::text('logo', null, array('id' => 'logo', 'class' => 'form-control', 'placeholder' => 'Εισάγετε λογότυπο...')) !!}</div>--}}

                                        <fieldset>
                                            <legend>Γραφικά προφίλ</legend>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="@if((head($userRoles) == 'R-User')) col-lg-6 @else col-lg-12 @endif col-md-6">
                                                <div class="form-group">
                                                    {!! Form::label('Λογότυπο') !!}
                                                </div>

                                                <div class="form-group">
                                                    @if($content->logo == 1)
                                                        <div class="fileinput fileinput-exists" data-provides="fileinput">
                                                            @elseif($content->logo == 0)
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    @endif
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img data-src="holder.js/256x256" alt="..."></div>
                                                                    {{--<img data-src="{{ $base64  }}" alt="..."></div>--}}
                                                                    <input type="hidden" name="logo-removed" id="logo-removed" value="0">
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">

                                                                        @if($content->logo == 1)
                                                                            @if(File::exists('images/' . $content->suburl . '.png'))
                                                                                <img src="{{ asset('images/' . $content->suburl . '.png') }}" alt="" style="width: 200px; height: auto;">
                                                                            @elseif(File::exists('images/' . $content->suburl . '.jpg'))
                                                                                <img src="{{ asset('images/' . $content->suburl . '.jpg') }}" alt="" style="width: 200px; height: auto;">
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                    <div>
                                                                    <span class="btn btn-default btn-file">
                                                                        <span class="fileinput-new">Επιλογή εικόνας</span>
                                                                        <span class="fileinput-exists">Αλλαγή</span>
                                                                        <input type="file" name="logo-file">
                                                                    </span>
                                                                        <a href="#" id="remove-logo-img" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Αφαίρεση</a>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>

                                                    @if((head($userRoles) == 'R-User'))
                                                    <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('Φόντο') !!}
                                                    </div>
                                                        <div class="form-group">
                                                            @if($content->background == 1)
                                                                <div class="fileinput fileinput-exists" data-provides="fileinput">
                                                                    @elseif($content->background == 0)
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            @endif
                                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                                <img data-src="holder.js/256x256" alt="..."></div>
                                                                            {{--<img data-src="{{ $base64  }}" alt="..."></div>--}}
                                                                            <input type="hidden" name="background-removed" id="background-removed" value="0">
                                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">

                                                                                @if($content->background == 1)
                                                                                    @if(File::exists('backgrounds/' . $content->suburl . '.png'))
                                                                                        <img src="{{ asset('backgrounds/' . $content->suburl . '.png') }}" alt="" style="width: 200px; height: auto;">
                                                                                    @elseif(File::exists('backgrounds/' . $content->suburl . '.jpg'))
                                                                                        <img src="{{ asset('backgrounds/' . $content->suburl . '.jpg') }}" alt="" style="width: 200px; height: auto;">
                                                                                    @endif
                                                                                @endif
                                                                            </div>
                                                                            <div>
                                                                    <span class="btn btn-default btn-file">
                                                                        <span class="fileinput-new">Επιλογή εικόνας</span>
                                                                        <span class="fileinput-exists">Αλλαγή</span>
                                                                        <input type="file" name="background-file">
                                                                    </span>
                                                                                <a href="#" id="remove-logo-img" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Αφαίρεση</a>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                    </div>

                                                </div>
                                                @endif
                                            </div>

                                                <div class="form-group">
                                                    {!! Form::label('Θέμα') !!}
                                                </div>
                                                <div class="form-group">
                                                @if((head($userRoles) == 'R-User'))
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
                                                </div>
                                                </fieldset>

                                                @if((head($userRoles) == 'R-User'))
                                                <fieldset>
                                                <legend>Ισολογισμός</legend>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="name" style="text-align: right"><h4> Αρχείο ισολογισμού:</h4></label>
                                                    <div class="col-md-9">

                                                        @if($content->file == 1)
                                                            <div class="fileinput fileinput-exists input-group" data-provides="fileinput">
                                                        @elseif($content->file == 0)
                                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                        @endif
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename">
                                                                    @if($content->file == 1)
                                                                        @if(File::exists('files/' . $content->suburl . '.pdf'))
                                                                            {{ $content->suburl . '.pdf' }}
                                                                        @endif
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file">
                                                                <span class="fileinput-new">Επιλογή αρχείου</span>
                                                                <span class="fileinput-exists">Αλλαγή</span>
                                                                <input type="hidden" name="plain-removed" id="plain-removed" value="0">
                                                                <input type="file" name="plain-file" accept="application/pdf"></span>
                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Αφαίρεση</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                </fieldset>
                                                @endif

                                                @if((head($userRoles) == 'R-User') || (head($userRoles) == 'G-User'))
                                                <fieldset>
                                                <legend>Κείμενα προφίλ</legend>
                                                <div class="form-group">
                                                    <label for="tags">Λέξεις κλειδιά</label>
                                                    <input type="text" name="tag" value="{{ $content->tag }}" data-role="tagsinput" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="descriptionobj">Περιγραφή αντικειμένου *</label>
                                                    {!! Form::textarea('descriptionobj', $content->descriptionobj, array('id' => 'descriptionobj', 'class' => 'form-control required textarea editor-cls', 'size' => '30x5', 'placeholder' => 'Εισάγετε περιγραφή αντικειμένου...')) !!}</div>
                                                <div class="form-group">
                                                    <label for="description">Λίγα λόγια για εμας *</label>
                                                    {!! Form::textarea('description', $content->description, array('id' => 'description', 'class' => 'form-control required textarea editor-cls', 'size' => '30x5', 'placeholder' => 'Εισάγετε λίγα λόγια για εσάς...')) !!}</div>
                                                <div class="form-group">
                                                    <label for="slogan">Απόφθεγμα (σλόγκαν)</label>
                                                    {!! Form::text('slogan', $content->slogan, array('id' => 'slogan', 'class' => 'form-control', 'placeholder' => 'Εισάγετε το απόφθεγμα (slogan) σας...')) !!}</div>
                                                </fieldset>
                                                @else
                                                <fieldset>
                                                <legend>Κείμενα προφίλ</legend>
                                                <div class="form-group">
                                                    <label for="descriptionobj">Περιγραφή αντικειμένου *</label>
                                                    {!! Form::textarea('descriptionobj', $content->descriptionobj, array('id' => 'descriptionobj', 'maxlength' => '1000', 'class' => 'form-control required', 'size' => '30x5', 'placeholder' => 'Εισάγετε περιγραφή αντικειμένου...')) !!}</div>
                                                <div class="form-group">
                                                    <label for="description">Λίγα λόγια για εμας *</label>
                                                    {!! Form::textarea('description', $content->description, array('id' => 'description', 'maxlength' => '1000', 'class' => 'form-control required', 'size' => '30x5', 'placeholder' => 'Εισάγετε λίγα λόγια για εσάς...')) !!}</div>
                                                <div class="form-group">
                                                    <label for="slogan">Απόφθεγμα (σλόγκαν)</label>
                                                    {!! Form::text('slogan', $content->slogan, array('id' => 'slogan', 'class' => 'form-control', 'placeholder' => 'Εισάγετε το απόφθεγμα (slogan) σας...')) !!}</div>
                                                </fieldset>
                                                @endif
                                                <input type="hidden" name="group" id="group" value="@if(head($userRoles) == 'R-User'){{ 'R' }}@elseif(head($userRoles) == 'G-User'){{ 'G' }}@elseif(head($userRoles) == 'B-User'){{ 'B' }}@else-@endif">
                                                <fieldset>
                                                    <legend>Κατάσταση προφίλ</legend>
                                                <div class="form-group">
                                                    <label>
                                                        Κατάσταση
                                                    </label>
                                                    <div class="radio">
                                                        <label>
                                                            @if($content->status == 0)
                                                                <input type="radio" name="status" id="optionsRadios1" value="0" checked> Υπο κατασκευή
                                                            @else
                                                                <input type="radio" name="status" id="optionsRadios1" value="0"> Υπο κατασκευή
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            @if($content->status == 1)
                                                                <input type="radio" name="status" id="optionsRadios2" value="1" checked> Ενεργό
                                                            @else
                                                                <input type="radio" name="status" id="optionsRadios2" value="1"> Ενεργό
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            @if($content->status == 2)
                                                                <input type="radio" name="status" id="optionsRadios3" value="2" checked> Ανενεργό
                                                            @else
                                                                <input type="radio" name="status" id="optionsRadios3" value="2"> Ανενεργό
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                </fieldset>
                                    </section>
                                </div>
                                <!--/form-->
                                <!-- END FORM WIZARD WITH VALIDATION -->

                                <div class="actions clearfix">
                                    {{--<button type="button" class="btn btn-responsive button-alignment btn-success pull-right" style="margin-bottom:7px;" data-toggle="button"><span class="glyphicon glyphicon-floppy-save"></span> Αποθήκευση</button>--}}
                                    {!!Form::button('<span class="fa fa-floppy-o"></span> Αποθήκευση ',['class'=>'btn btn-responsive button-alignment btn-primary pull-right', 'type'=>'submit'])!!}
                                    {!!Form::button('<span class="fa fa-reply"></span> Άκυρο ',['class'=>'btn btn-responsive button-alignment btn-info pull-left', 'type'=>'submit'])!!}
                                    {{--{!!Form::submit('Είσοδος',['class'=>'btn btn-sm btn-primary'])!!}--}}
                                </div>
                                {!!Form::close()!!}

                            </div>
                        </div>
                        <!--main content end--> </div>
                </div>
            </div>
        </div>
        <!--row end-->
        <!--main content ends-->
    </section>
    @stop

    {{-- page level scripts --}}
    @section('footer_scripts')
            <!-- begining of page level js -->
    <!--livicons-->
    <script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}"></script>

    <!--livicons-->
    <script type="text/javascript" src="{{ asset('assets/vendors/maxlength/bootstrap-maxlength.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tipospu/editformelements.js') }}"></script>

    <!--livicons-->
    <script type="text/javascript" src="{{ asset('assets/vendors/image-picker/image-picker.min.js') }}"></script>
    <script>
        jQuery(document).ready(function (){
            // initialize imagepicker
            $("#select-theme").imagepicker();

            // somehow change the selected items directly on your select html element
            $("#select-theme").val('{{ $content->theme }}');

            // re-sync the plugin
            $("#select-theme").data('picker').sync_picker_with_select();
        });
    </script>
    <!----------------------------------------------------------------------------------------------------------------->

    <!--google-maps-->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&language=gr&hl=ja&q=paris" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tipospu/searchaddress.js') }}"></script>

    {{--<script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/additional-methods.min.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/vendors/wizard/jquery-steps/js/wizard.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.steps.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/vendors/wizard/jquery-steps/js/form_wizard.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/js/pages/formwizard.js') }}"></script>--}}

    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script>
        jQuery(document).ready(function (){
            jQuery('#doy_list').select2();
            @if(isset($content->doy) && (!empty($content->doy)))
                jQuery('#doy_list').select2('data', {id: '{{ $content->doy  }}', text: '{!! $content->doys->descriptiondoy  !!}'});
            @endif
            jQuery('#object_list').select2();
            var object_list = [
            @foreach($content->objects as $object)
                    { id: '{!! $object->oid  !!}', text: '{!! $object->object  !!}'},
            @endforeach
            ];
            jQuery('#object_list').select2('data', object_list);
        });
    </script>

    @if((head($userRoles) == 'R-User'))
            <!-- multiple file upload -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/vendor/jquery.ui.widget.js') }}" ></script>
            <!-- The Templates plugin is included to render the upload/download listings -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/tmpl.min.js') }}" ></script>
            <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/load-image.min.js') }}" ></script>
            <!-- The Canvas to Blob plugin is included for image resizing functionality -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/canvas-to-blob.min.js') }}" ></script>
            <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/jquery.blueimp-gallery.min.js') }}" ></script>
            <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/jquery.iframe-transport.js') }}" ></script>
            <!-- The basic File Upload plugin -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/jquery.fileupload.js') }}" ></script>
            <!-- The File Upload processing plugin -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/jquery.fileupload-process.js') }}" ></script>
            <!-- The File Upload image preview & resize plugin -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/jquery.fileupload-image.js') }}" ></script>
            <!-- The File Upload audio preview plugin -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/jquery.fileupload-audio.js') }}" ></script>
            <!-- The File Upload video preview plugin -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/jquery.fileupload-video.js') }}" ></script>
            <!-- The File Upload validation plugin -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/jquery.fileupload-validate.js') }}" ></script>
            <!-- The File Upload user interface plugin -->
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/jquery.fileupload-ui.js') }}" ></script>
            <script src="{{ asset('assets/vendors/jQuery-File-Upload/js/main.js') }}" ></script>
            <!-- The template to display files available for upload -->
            <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-primary start" disabled>
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
            <!-- The template to display files available for download -->
            <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                        <span>{%=file.name%}</span>
                    {% } %}
                </p>
                {% if (file.error) { %}
                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                    <input type="checkbox" name="delete" value="1" class="toggle">
                {% } else { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <!-- file upload -->
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
    @endif

    @if((head($userRoles) == 'R-User') || (head($userRoles) == 'G-User'))
    <!-- Bootstrap tags -->
        <script src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.min.js') }}"  type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/tags/bower_components/typeahead.js/dist/typeahead.bundle.min.js') }}"  type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/tags/assets/app_bs3.js') }}"  type="text/javascript"></script>
        <script src="{{ asset('assets/js/pages/tagsinput.js') }}"  type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script  src="{{ asset('assets/vendors/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/adapters/jquery.js') }}" type="text/javascript" ></script>
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}" type="text/javascript" ></script>
    <script  src="{{ asset('assets/vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/wysihtml5.js') }}" type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/javascripts/bootstrap-wysihtml5/core-b3.js') }}" type="text/javascript"></script>
    <script  src="{{ asset('assets/js/pages/editor.js') }}" type="text/javascript"></script>
    @endif

@stop