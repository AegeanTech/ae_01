<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>TiPosPou - Κατάλογος Επαγγελματιών</title>

    <meta name="description" content="Δημιουργήστε εύκολα και με λίγα βήματα το micro-site της επιχείρησης σας.">
    <meta name="author" content="AegeanTech">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Facebook Meta -->
    <meta property="og:url"	content="http://tipospou.gr/" />
    <meta property="og:type"	content="website" />
    <meta property="og:title"	content="Πλατφόρμα δημιουργίας micro-site" />
    <meta property="og:description"	content="Δημιουργήστε εύκολα και με λίγα βήματα το micro-site της επιχείρησης σας" />
    <meta property="og:image"	content="http://tipospou.gr/assets/frontend/img/placeholders/screenshots/meta_logo_md.png" />

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/icon57.png') }}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/icon72.png') }}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/icon76.png') }}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/icon114.png') }}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/icon120.png') }}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/icon144.png') }}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/icon152.png') }}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/icon180.png') }}" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins.css') }}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/themes.css') }}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) & Respond.js (enables responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="{{ asset('assets/frontend/js/vendor/modernizr-respond.min.js') }}"></script>
</head>
<body>
<!-- Page Container -->
<!-- In the PHP version you can set the following options from inc/config file -->
<!-- 'boxed' class for a boxed layout -->
<div id="page-container">
    <div class="wrapper">
        <!-- Site Header -->
        <header>
            <div class="container">
                <!-- Site Logo -->
                {{--<a href="#" class="site-logo">--}}
                {{--<i class="gi gi-flash"></i> <strong>T</strong>i<strong>P</strong>os<strong>P</strong>u--}}
                {{--</a>--}}
                <img src="{{ asset('assets/frontend/img/placeholders/headers/logo.png') }}" class="img-responsive site-logo" alt="tipospou">
                <!-- Site Logo -->

                <!-- Site Navigation -->
                <nav>
                    <!-- Menu Toggle -->
                    <!-- Toggles menu on small screens -->
                    <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                        <i class="fa fa-bars"></i>
                    </a>
                    <!-- END Menu Toggle -->

                    <!-- Main Menu -->
                    <ul class="site-nav">
                        <li>
                            <a href="{{ URL::to('/') }}">Αρχικη</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/description') }}">Περιγραφη</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/features') }}">Δυνατοτητες</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/pricing') }}">Πακετα</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/contact') }}">Επικοινωνια</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/signin#tologin') }}" class="btn btn-primary">Εισοδος</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/signin#toregister') }}" class="btn btn-success">Εγγραφη</a>
                        </li>
                        {{--<li>--}}
                        {{--{!!HTML::link('/login','Login',['class'=>'btn btn-primary'])!!}--}}
                        {{--<a href="#" class="btn btn-primary">Log In</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--{!!HTML::link('/register','Register',['class'=>'btn btn-success'])!!}--}}
                        {{--<a href="#" class="btn btn-success">Sign Up</a>--}}
                        {{--</li>--}}
                    </ul>
                    <!-- END Main Menu -->
                </nav>
                <!-- END Site Navigation -->
            </div>
        </header>
        <!-- END Site Header -->

        <!-- Content -->
        @yield('content')
        <div class="push"></div>
    </div>

    <!-- Footer -->
    <footer class="site-footer site-section">
        <div class="container">
            <!-- Footer Links -->
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <h4 class="footer-heading">Σχετικά Με Εμάς</h4>
                    <ul class="footer-nav list-inline">
                        <li><a href="{{ URL::to('/contact') }}">Επικοινωνία</a></li>
                        <li><a href="{{ URL::to('/cookies') }}">Cookies</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-4">
                    <h4 class="footer-heading">Ακολουθήστε Μας</h4>
                    <ul class="footer-nav footer-nav-social list-inline">
                        <li><a href="https://www.facebook.com/Tipospou-120168251653988/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        {{--<li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>--}}
                        {{--<li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>--}}
                    </ul>
                </div>
                <div class="col-sm-6 col-md-4">
                    <h4 class="footer-heading">&copy; TiPosPou 2015</h4>
                    <ul class="footer-nav list-inline">
                        <cite>powered by <a href="http://www.aegeantech.gr" target="_blank">AegeanTech</a></cite>
                    </ul>
                </div>
            </div>
            <!-- END Footer Links -->
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="{{ asset('assets/frontend/js/vendor/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins.js') }}"></script>
<script src="{{ asset('assets/frontend/js/app.js') }}"></script>
<script src="{{ asset('assets/js/tipospu/bootstrap-cookie-consent.js') }}"></script>

{{--<script src="{{ asset('assets/js/tipospu/googleanalytics.js') }}"></script>--}}
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-68456378-1', 'auto');
    ga('send', 'pageview');

</script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{ asset('assets/frontend/js/pages/login.js') }}"></script>
<script>$(function(){ Portfolio.init(); });</script>
</body>
</html>