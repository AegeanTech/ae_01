<!DOCTYPE html>
<html lang="gr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $content->description }}">
    <meta name="author" content="AegeanTech">

    <meta name="keywords" content="TiPosPou, @foreach($content->objects as $key => $object) @if ($key>0),&nbsp;@endif {{ $object->object }} @endforeach, {{ $content->suburl }}, @if(($content->group=='R') || ($content->group=='G')) {{ $content->tag }} @endif">
    <title>TiPosPou | {{ $content->title  }}</title>

    <!-- for Facebook -->
    <meta property="og:title" content="TiPosPou - Κατάλογος Επαγγελματιών"/>
    <meta property="og:title" content="TiPosPou | {{ $content->title  }}"/>
    <meta property="og:image" content="{{ asset('assets/template/img/profile.png') }}" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:description" content="{{ $content->description }}" />

    <!-- for Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="TiPosPou | {{ $content->title  }}" />
    <meta name="twitter:description" content="{{ $content->description }}" />
    <meta name="twitter:image" content="{{ asset('assets/template/img/profile.png') }}" />

    <link rel="shortcut icon" href="{{ asset('assets/img/tipospu/favicon.png') }}">
    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    {{--<link href="{{ asset('assets/template/css/bootstrap.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset($core_css) }}" rel="stylesheet">

    <!-- Custom CSS -->
    {{--<link href="{{ asset('assets/template/css/freelancer.css') }}" rel="stylesheet">--}}
    <link href="{{ asset($custom_css) }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/template/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:700,400&subset=latin,greek' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/template/js/html5shiv.js') }}"></script>
    <script src="{{ asset('assets/template/js/respond.min.js') }}"></script>
    <![endif]-->

    @if($content->group=='R')
        <link href="{{ asset('assets/template/css/prettyPhoto.css') }}" rel="stylesheet" type="text/css">
        <style type="text/css" media="screen">

            ul li { display: inline; }

            #gallery {
                margin: 0 auto;
                padding: 0 auto;
                /*padding: 30px;*/
                /*width: 1000px;*/
            }
        </style>
    @endif


    <!-- extra styles -->
    <style>

        .parallax:before {
            content: "";
            position: fixed;
            left: 0;
            right: 0;
            z-index: -1;

            display: block;
            background-image: url( {{ asset($background_file) }} );
            background-repeat: no-repeat;
            background-size: 100%;

            -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px);
        }

        .parallax {
            background-repeat: no-repeat;
            background-size: 100%;

            /*-webkit-filter: blur(1px);*/
            /*-moz-filter: blur(1px);*/
            /*-o-filter: blur(1px);*/
            /*-ms-filter: blur(1px);*/
            /*filter: blur(1px);*/
        }

        .after_parallax {
        }

        .parallax-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .parallax-overlay.pattern {
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAI0lEQVQIW2NkwAT/GdHE/gP5jMiCYAGQIpggXAAmiCIAEgQAAE4FBbECyZcAAAAASUVORK5CYII=) repeat fixed;
        }
        .parallax-overlay.gradient {
            background-color: #00eaff;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#00eaff), to(#88006d));
            background-image: -webkit-linear-gradient(top, #00eaff, #88006d);
            background-image: -moz-linear-gradient(top, #00eaff, #88006d);
            background-image: -ms-linear-gradient(top, #00eaff, #88006d);
            background-image: -o-linear-gradient(top, #00eaff, #88006d);
        }
    </style>
    <!-- end of extra styles -->>
</head>

<body id="page-top" class="index">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#page-top">{{ $content->title  }}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="#object">Επαγγελματικό αντικείμενο</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">Σχετικά με εμάς</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">Επικοινωνία</a>
                </li>
                <li id="socialShare" class="btn-group share-group">
                        <a data-toggle="dropdown" class="btn">
                            <i class="fa fa-share-alt"></i>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a id="twitter_sh" data-original-title="Twitter" rel="tooltip"  href="#" class="btn btn-twitter" data-placement="left">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a id="facebook_sh" data-original-title="Facebook" rel="tooltip"  href="#" class="btn btn-facebook" data-placement="left">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a id="g_plus_sh" data-original-title="Google+" rel="tooltip"  href="#" class="btn btn-google" data-placement="left">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a id="pinterest_sh" data-original-title="Pinterest" rel="tooltip"  class="btn btn-pinterest" data-placement="left">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header @if($content->group=='R') class="parallax" style="background-image: url( {{ asset($background_file) }} );"  data-overlay-class="pattern" data-overlay-opacity="0.6" @endif>
    <div class="container after_parallax">
        <div class="row">
            @if($content->group=='R')
                <div class="col-lg-12">
                    @if($content->logo == 1)
                        @if(File::exists('images/' . $content->suburl . '.png'))
                            <img src="{{ asset('images/' . $content->suburl . '.png') }}" alt="{{ $content->suburl }}" style="width: 200px; height: auto;">
                        @elseif(File::exists('images/' . $content->suburl . '.jpg'))
                            <img src="{{ asset('images/' . $content->suburl . '.jpg') }}" alt="{{ $content->suburl }}" style="width: 200px; height: auto;">
                        @endif
                    @elseif($content->logo == 0)
                        <img class="img-responsive" src="{{ asset('assets/template/img/profile.png') }}" alt="{{ $content->suburl }}">
                    @endif
                    <div class="intro-text">
                        @if(isset($content->name) && (!empty($content->name)))
                            <span class="name">{{ $content->name }}</span>
                        @else
                            <span class="name">{{ $content->title }}</span>
                        @endif
                        <hr class="star-light">
                        <span class="skills">{{ $content->slogan }}</span>
                    </div>
                </div>
            @else
                <div class="col-lg-12">
                    @if($content->logo == 1)
                        @if(File::exists('images/' . $content->suburl . '.png'))
                            <img src="{{ asset('images/' . $content->suburl . '.png') }}" alt="{{ $content->suburl }}" style="width: 200px; height: auto;">
                        @elseif(File::exists('images/' . $content->suburl . '.jpg'))
                            <img src="{{ asset('images/' . $content->suburl . '.jpg') }}" alt="{{ $content->suburl }}" style="width: 200px; height: auto;">
                        @endif
                    @elseif($content->logo == 0)
                        <img class="img-responsive" src="{{ asset('assets/template/img/profile.png') }}" alt="{{ $content->suburl }}">
                    @endif
                    <div class="intro-text">
                        @if(isset($content->name) && (!empty($content->name)))
                            <span class="name">{{ $content->name }}</span>
                        @else
                            <span class="name">{{ $content->title }}</span>
                        @endif
                        <hr class="star-light">
                        <span class="skills">{{ $content->slogan }}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</header>

<!-- object Grid Section -->
<section id="object">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                    @foreach($content->objects as $key => $object)<span>@if ($key>0),&nbsp;@endif{{ $object->object }}</span>@endforeach
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="intro-text" style="font-size: 1.75em">
                    <span class="skills">
                        @if(($content->group=='R') || ($content->group=='G'))
                            {!! $content->descriptionobj  !!}
                        @else
                            {{ $content->descriptionobj }}
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="success" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Σχετικά με εμάς</h2>
                <hr class="star-light">
                @if($content->file == 1)
                    @if(File::exists('files/' . $content->suburl . '.pdf'))
                        <ul class="list-inline">
                            <h4><a href="{{ asset('files/' . $content->suburl . '.pdf') }}" target="_blank" class=""><i class="fa fa-fw fa-download"></i> Αρχείο Ισολογισμού</a></h4>
                        </ul>
                    @endif
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="intro-text" style="font-size: 1.75em">
                    <span class="skills">
                        @if(($content->group=='R') || ($content->group=='G'))
                            {!! $content->description  !!}
                        @else
                            {{ $content->description }}
                        @endif
                    </span>
                </div>
            </div>
        </div>

        @if($content->group=='R')
        <div class="row">
            {{--<div id="gallery" class="col-lg-12 gallery clearfix">--}}
                {{--<ul class="gallery clearfix">--}}
                    {{--@foreach($gallery_file as $gallery)--}}
                        {{--<li><a href="{{ asset('gallery/full_size/' . $gallery['folder'] . '/' . $gallery['name']) }}" rel="prettyPhoto[gallery2]"><img src="{{ asset('gallery/icon_size/' . $gallery['folder'] . '/' . $gallery['name']) }}" width="60" height="60" alt="" /></a></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
            <div id="gallery" class="col-lg-12 gallery clearfix">
                @foreach($gallery_file as $gallery)
                    <div class="col-lg-4 col-sm-4 col-xs-6"><a href="{{ asset('gallery/full_size/' . $gallery['folder'] . '/' . $gallery['name']) }}" rel="prettyPhoto[gallery2]"><img class="thumbnail img-responsive" src="{{ asset('gallery/icon_size/' . $gallery['folder'] . '/' . $gallery['name']) }}"/></a></div>
                @endforeach
            </div>
            {{--<div id="gallery" class="col-lg-12 gallery clearfix">--}}
                {{--<ul class="thumbnails">--}}
                    {{--@foreach($gallery_file as $gallery)--}}
                        {{--<li class="span4"><div class="thumbnail"><a href="{{ asset('gallery/full_size/' . $gallery['folder'] . '/' . $gallery['name']) }}" rel="prettyPhoto[gallery2]"><img src="{{ asset('gallery/icon_size/' . $gallery['folder'] . '/' . $gallery['name']) }}" width="60" height="60" alt="" /></a></div></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
        @endif

    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Επικοινωνήστε μαζί μας</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                @if(($content->lat !== '') && ($content->lng !== ''))
                    <div id="map" style="width: 100%; height: 500px;"></div>
                @else
                    <img class="img-responsive" src="{{ asset('assets/template/img/test_map.png') }}" />
                @endif
            </div>
            <div class="col-lg-6">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                @if ($status == "online")
                @include('partials.errors')
                @include('partials.success')
                {!! Form::open(['method' => 'post', 'class' => '', 'url' => '/site/'.$content->suburl ]) !!}
                @else
                <form name="sentMessage" id="" novalidate>
                @endif
                    <input type="hidden" name="user_suburl" value="{{ $content->suburl }}">
                    <input type="hidden" name="user_mail" value="{{ $content->email }}">

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Όνομα</label>
                            {{--<input type="text" class="form-control" placeholder="Όνομα" id="name" name="name" required data-validation-required-message="Παρακαλώ εισάγετε το όνομά σας.">--}}
                            <input type="text" id="contact-name" name="name" class="form-control input-lg" placeholder="Το όνομα σας...">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>E-mail</label>
                            {{--<input type="email" class="form-control" placeholder="E-mail" id="email" name="email" required data-validation-required-message="Παρακαλώ εισάγετε το e-mail σας.">--}}
                            <input type="text" id="contact-email" name="email" class="form-control input-lg" placeholder="Το e-mail σας...">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Μήνυμα</label>
                            {!! Form::textarea('message', '', array('placeholder' => 'Το μήνυμα σας...', 'class' => 'form-control input-lg', 'id' => 'message', 'rows' => '10' )) !!}
                            {{--<textarea rows="5" class="form-control" placeholder="Μήνυμα" id="message" name="message" required data-validation-required-message="Παρακαλώ εισάγετε ένα μήνυμα."></textarea>--}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        {{--<div class="form-group col-xs-12">--}}
                            {{--<button type="submit" class="btn btn-success btn-lg">Αποστολή</button>--}}
                        {{--</div>--}}
                        <div class="form-group col-xs-12">
                            {!! Form::submit('Αποστολή Μηνύματος', array('class' => 'btn btn-success btn-lg')) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Βρείτε μας</h3>
                    <h6>{{ $content->name }}</h6>
                    <p>Διεύθυνση<br>{{ $content->address }}</p>
                </div>
                <div class="footer-col col-md-4">
                    @if(($content->socialf !== '') || ($content->socialt !== '') || ($content->sociali !== '') || ($content->sociall !== '') || ($content->socialy !== ''))
                    <h3>Social Media</h3>
                    <ul class="list-inline">
                        @if($content->socialf !== '')
                            <li>
                                <a href="{{ $content->socialf }}" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                        @endif
                        @if($content->socialt !== '')
                            <li>
                                <a href="{{ $content->socialt }}" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                        @endif
                        @if($content->sociali !== '')
                            <li>
                                <a href="{{ $content->sociali }}" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a>
                            </li>
                        @endif
                        @if($content->sociall !== '')
                            <li>
                                <a href="{{ $content->sociall }}" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                        @endif
                        @if($content->socialy !== '')
                            <li>
                                <a href="{{ $content->socialy }}" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-youtube"></i></a>
                            </li>
                         @endif
                    </ul>
                        @endif
                </div>
                <div class="footer-col col-md-4">
                    <h3>Επικοινωνήστε μαζί μας</h3>
                    <p><i class="fa fa-fw fa-phone"></i><a href="tel:{{ $content->phone }}">{{ $content->phone }}</a> <br> <i class="fa fa-fw fa-envelope-o"></i><a href="mailto:{{ $content->email }}?Subject=Μήνυμα%20από%20tipospu">{{ $content->email }}</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; TiPosPou 2015
                </div>
                <cite>Powered by <a href="http://www.aegeantech.gr" target="_blank">AegeanTeach</a></cite>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- jQuery -->
<script src="{{ asset('assets/template/js/jquery.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/template/js/bootstrap.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('assets/template/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/template/js/classie.js') }}"></script>
<script src="{{ asset('assets/template/js/cbpAnimatedHeader.js') }}"></script>

<!-- Contact Form JavaScript -->
{{--<script src="{{ asset('assets/template/js/jqBootstrapValidation.js') }}"></script>--}}
{{--<script src="{{ asset('assets/template/js/contact_me.js') }}"></script>--}}

<!-- Custom Theme JavaScript -->
<script src="{{ asset('assets/template/js/freelancer.js') }}"></script>

<!-- Social Media JavaScript -->
<script src="{{ asset('assets/js/tipospu/socialmedia.js') }}"></script>

@if($content->group=='R')

    <!-- Simple Parallax -->
    <script src="{{ asset('assets/template/js/jquery.simpleparallax.min.js') }}"></script>
    <script>
        $(function(){

            $(".parallax").css("min-height", $(window).height());

            $(".parallax").simpleParallax();
        })
    </script>

    <!-- Pretty Photo -->
    <script src="{{ asset('assets/template/js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $("area[rel^='prettyPhoto']").prettyPhoto();

            $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
            $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});

            $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
                custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
                changepicturecallback: function(){ initialize(); }
            });

            $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
                custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
                changepicturecallback: function(){ _bsap.exec(); }
            });
        });
    </script>
@endif

<!-- Show GoogleMaps JavaScript -->
<script>
    function initMap() {
        var myLatLng = {lat: {{ $content->lat }}, lng: {{ $content->lng }} };

        var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h5 id="firstHeading" class="firstHeading">{!!   $content->title  !!}</h5>'+
                '<div id="bodyContent">'+
                '{!!   $content->address  !!}'+
                '</div>'+
                '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: myLatLng,
            disableDefaultUI: true,
            scrollwheel: false,
            scaleControl:true,
            panControl:true,
            zoomControl:true,
            mapTypeControl:false,
            streetViewControl:false,
            overviewMapControl:false,
            rotateControl:true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: ' {!!   $content->title  !!} '
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyJN2vgbIM6i79GatTj_PvlSAdxJl9dpY&signed_in=true&callback=initMap" async defer>
</script>
</body>

</html>