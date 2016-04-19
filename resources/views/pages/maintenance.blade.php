<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Το www.tipospou.gr είναι ένας διαδικτυακός τόπος οπού ο κάθε χρήστης μπορεί να δημιουργήσει ένα micro - site για την επιχείρηση του.">
    <meta name="author" content="AegeanTech">

    <meta name="keywords" content="TiPosPou, {{ $content->suburl }}">
    <title>TiPosPou | @if($content->status == 0) Υπό Κατασκευή  @elseif($content->status == 2) Ανενεργό @endif</title>

    <!-- for Facebook -->
    <meta property="og:title" content="TiPosPou - Κατάλογος Επαγγελματιών"/>
    <meta property="og:image" content="{{ asset('assets/template/img/profile.png') }}" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:description" content="Το www.tipospou.gr είναι ένας διαδικτυακός τόπος οπού ο κάθε χρήστης μπορεί να δημιουργήσει ένα micro - site για την επιχείρηση του." />

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
            <a class="navbar-brand" href="#">@if($content->status == 0)Προφίλ Υπό Κατασκευή@elseif($content->status == 2)Ανενεργό Προφίλ@endif</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($content->status == 0)
                    <img class="img-responsive" src="{{ asset('assets/template/img/under-construction_profile.png') }}" alt="Το προφίλ αυτό στο TiPosPou είναι υπό κατασκευή.">
                @elseif($content->status == 2)
                    <img class="img-responsive" src="{{ asset('assets/template/img/disabled_profile.png') }}" alt="Το προφίλ αυτό στο TiPosPou είναι ανενεργό.">
                @endif
            </div>
        </div>
    </div>
</header>

<!-- object Grid Section -->
<section id="object">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="intro-text" style="font-size: 1.75em; text-align: center; ">
                    <span class="skills">
                        @if($content->status == 0)
                            <h2>Το προφίλ που αναζητάτε είναι υπό κατασκευή!</h2>
                        @elseif($content->status == 2)
                            <h3>Το προφίλ που αναζητάτε είναι ανενεργό!</h3>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/template/js/classie.js') }}"></script>
<script src="{{ asset('assets/template/js/cbpAnimatedHeader.js') }}"></script>

<!-- Contact Form JavaScript -->
<script src="{{ asset('assets/template/js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('assets/template/js/contact_me.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('assets/template/js/freelancer.js') }}"></script>

<!-- Social Media JavaScript -->
<script src="{{ asset('assets/js/tipospu/socialmedia.js') }}"></script>

</body>

</html>