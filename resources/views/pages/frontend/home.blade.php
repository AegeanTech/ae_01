@extends('home')

{{-- Page title --}}
@section('title')
    Form Wizard
    @parent
    @stop

    {{-- Page content --}}
    @section('content')
            <!-- Media Container -->
    <div class="media-container">
        <!-- Intro -->
        <section class="site-section site-section-light site-section-top">
            <div class="container text-center">
                <h1 class="animation-slideDown"><strong>Πλατφόρμα δημιουγρίας επαγγελματικών site!</strong></h1>
                <h2 class="h3 animation-slideUp hidden-xs">Δημιουργήστε το δικό σας micro-site με ελάχιστα βήματα!</h2>
            </div>
        </section>
        <!-- END Intro -->

        <!-- For best results use an image with a resolution of 2560x279 pixels -->
        <img src="{{ asset('assets/frontend/img/placeholders/headers/store_home.jpg') }}" alt="" class="media-image animation-pulseSlow">
    </div>
    <!-- END Media Container -->

    <!-- Products -->
    <section class="site-content site-section">
        <div class="container">
            <!-- Seach Form -->
            <div class="site-block">
                <form action="#" method="post">
                    <div class="input-group input-group-lg">
                        <input type="text" id="ecom-search" name="ecom-search" class="form-control text-center" placeholder="Αναζήτηση Επαγγελματία...">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Seach Form -->

        </div>
    </section>
    <!-- END Products -->

    <!-- Helpdesk -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row">
                <!-- Content -->
                <div class="col-sm-8 col-md-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Tutorials -->
                            <h3 class="push-bit"><i class="fa fa-user"></i> <strong>Τελευταία μέλη</strong></h3>
                            <ul class="fa-ul ul-breath push">
                                <li>
                                    <i class="fa fa-arrow-right fa-li"></i> <a href="javascript:void(0)">How to get started</a>
                                    <p class="text-muted"><small>6 days ago by <strong>Bobby Miller</strong></small></p>
                                </li>
                                <li>
                                    <i class="fa fa-file-text-o fa-li"></i> <a href="javascript:void(0)">How to change your username</a>
                                    <p class="text-muted"><small>2 weeks ago by <strong>Stephen Jacobs</strong></small></p>
                                </li>
                                <li>
                                    <i class="fa fa-file-text-o fa-li"></i> <a href="javascript:void(0)">How to change your email</a>
                                    <p class="text-muted"><small>1 month ago by <strong>Randy Guzman</strong></small></p>
                                </li>
                                <li>
                                    <i class="fa fa-file-text-o fa-li"></i> <a href="javascript:void(0)">How to refer more people</a>
                                    <p class="text-muted"><small>1 year ago by <strong>Bobby Miller</strong></small></p>
                                </li>
                            </ul>
                            <!-- END Tutorials -->
                        </div>
                        <div class="col-sm-6 ">
                            <!-- Features -->
                            <h3 class="push-bit"><i class="fa fa-file-text"></i> <strong>Τελευταία επαγγέλματα</strong></h3>
                            <ul class="fa-ul ul-breath push">
                                <li>
                                    <i class="fa fa-file-text-o fa-li"></i> <a href="javascript:void(0)">How to use our email service</a>
                                    <p class="text-muted"><small>6 days ago by <strong>Harold Rodriguez</strong></small></p>
                                </li>
                                <li>
                                    <i class="fa fa-check fa-li"></i> <a href="javascript:void(0)">How to enable the tasks feature</a>
                                    <p class="text-muted"><small>2 weeks ago by <strong>Kenneth Daniels</strong></small></p>
                                </li>
                                <li>
                                    <i class="fa fa-check fa-li"></i> <a href="javascript:void(0)">New features roundup for v3.0</a>
                                    <p class="text-muted"><small>1 month ago by <strong>Ashley Henry</strong></small></p>
                                </li>
                                <li>
                                    <i class="fa fa-check fa-li"></i> <a href="javascript:void(0)">Introducing auto backups</a>
                                    <p class="text-muted"><small>3 months ago by <strong>AMary Dean</strong></small></p>
                                </li>
                            </ul>
                            <!-- END Features -->
                        </div>
                    </div>
                    <!-- END All Categories -->
                </div>
                <!-- END Content -->

                <!-- Sidebar -->
                <div class="col-sm-4 col-md-3">
                    <aside class="sidebar site-block">
                        <!-- Categories -->
                        <div class="sidebar-block">
                            <h4 class="site-heading"><strong>Κύριες</strong> Κατηγορίες</h4>
                            <ul class="list-unstyled ul-breath">
                                <li><a href="javascript:void(0)" class="label label-default">Tutorials (25)</a></li>
                                <li><a href="javascript:void(0)" class="label label-warning">Features (19)</a></li>
                                <li><a href="javascript:void(0)" class="label label-success">Payments (32)</a></li>
                                <li><a href="javascript:void(0)" class="label label-info">Membership (14)</a></li>
                                <li><a href="javascript:void(0)" class="label label-danger">Articles (17)</a></li>
                            </ul>
                        </div>
                        <!-- END Categories -->

                        <!-- Popular Articles -->
                        <div class="sidebar-block">
                            <h4 class="site-heading"><strong>Δημοφιλείς</strong> Κατηγορίες</h4>
                            <ul class="fa-ul ul-breath">
                                <li><i class="fa fa-file-text-o fa-li"></i> <a href="javascript:void(0)">Is my data secured?</a></li>
                                <li><i class="fa fa-file-text-o fa-li"></i> <a href="javascript:void(0)">How to get started?</a></li>
                                <li><i class="fa fa-file-text-o fa-li"></i> <a href="javascript:void(0)">Can I change my username?</a></li>
                                <li><i class="fa fa-file-text-o fa-li"></i> <a href="javascript:void(0)">Can I change my email?</a></li>
                                <li><i class="fa fa-file-text-o fa-li"></i> <a href="javascript:void(0)">How to refer more people</a></li>
                                <li><i class="fa fa-file-text-o fa-li"></i> <a href="javascript:void(0)">Intro for advanced users</a></li>
                            </ul>
                        </div>
                        <!-- END Popular Articles -->
                    </aside>
                </div>
                <!-- END Sidebar -->
            </div>
        </div>
    </section>
    <!-- END Helpdesk -->
@stop