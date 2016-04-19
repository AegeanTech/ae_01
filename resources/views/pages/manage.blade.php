@extends('master')

{{-- Page title --}}
@section('title')
Διαχείριση Εικόνων
@parent
@stop

{{-- page level styles --}}
@section('header_styles')    
    
	<!-- Add fancyBox main CSS files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/gallery/fancy_box/jquery.fancybox.css') }}" media="screen" />
    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/gallery/fancy_box/helpers/jquery.fancybox-buttons.css') }}" />
    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/gallery/fancy_box/helpers/jquery.fancybox-thumbs.css') }}" />
    <!--page level css end-->
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Διαχείριση Εικόνων</h1>
                <ol class="breadcrumb">
                    <div id="date_sectiontime"></div>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary tabtop">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="image" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Διαχείριση Εικόνων
                                </h4>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['class' => 'form-horizontal', 'url' => 'admin/upload/manage']) !!}
                                <div class="table-responsive">





                                    <div class="nav-tabs-custom">
                                        <div class="tab-content">
                                            <div class="tab-pane active gallery-padding" id="tab_1">

                                                <div class="col-md-12">
                                                    @foreach ($images as $image)

                                                    <input type="hidden" name="id[]" value="{{ $image->id }}">
                                                    <input type="hidden" name="sid[]" value="{{ $image->sid }}">
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="{{ asset('gallery/full_size/' . $sid . '/' . $image->filename . '.jpg') }}" title="Κάντε κλικ πάνω δεξιά για κλείσιμο">
                                                            {{--<img src="{{ asset('gallery/icon_size/' . $sid . '/' . $image->filename . '.jpg') }}" class="img-responsive gallery-style" style="width: 200px; height: 200px;" alt="Image">--}}
                                                            <img src="{{ asset('gallery/icon_size/' . $sid . '/' . strtolower(camel_case($image->original_name))) }}" class="img-responsive gallery-style" style="width: 200px; height: 200px;" alt="{{ $image->description }}">
                                                        </a>
                                                        {{--<label>Περιγραφή</label>--}}
                                                        <div class="input-group">
                                                            {!! Form::text('description[]', $image->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Περιγραφή...')) !!}
                                                        </div>
                                                        <label>Τύπος Gallery και θέση</label>
                                                        <div class="input-group">
                                                            {!! Form::select('gallery[]', [
                                                            'Gallery' => 'Gallery',
                                                            'Slideshow' => 'Slideshow',
                                                            'Και στα δυο' => 'Και στα δυο'], $image->gallery, ['id' => 'gallery', 'class' => 'form-control', 'style' => 'width:auto;', 'tabindex' => '1']) !!}
                                                        {{--</div>--}}
                                                        {{--<label>Σειρά</label>--}}
                                                        {{--<div class="input-group">--}}
                                                            {!! Form::select('order[]', [
                                                            '1' => '1',
                                                            '2' => '2',
                                                            '3' => '3'], $image->order, ['id' => 'order', 'class' => 'form-control', 'style' => 'width:auto;', 'tabindex' => '1']) !!}
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- /basic gallery -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>
                                    <!-- nav-tabs-custom -->

                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <hr>
                                        {!!Form::button('<span class="fa fa-floppy-o"></span> Αποθήκευση ',['class'=>'btn btn-responsive btn-primary', 'type'=>'submit'])!!}
                                        <input type="reset" onclick="location.href='{{ URL::to('admin/upload') }}';" class="btn btn-default" value="Άκυρο"/>
                                    </div>
                                </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="{{ asset('assets/vendors/gallery/fancy_box/jquery.mousewheel.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/gallery/fancy_box/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/gallery/fancy_box/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/gallery/fancy_box/helpers/jquery.fancybox-thumbs.js') }}" ></script>
    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="{{ asset('assets/vendors/gallery/fancy_box/helpers/jquery.fancybox-media.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/gallery.js') }}"  ></script>
    
@stop