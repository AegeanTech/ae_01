<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Τίτλος σελίδας</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="{{ asset('assets/template/css/00_default/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/template/css/00_default/freelancer.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/template/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:700,400&subset=latin,greek' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
            <a class="navbar-brand" href="#page-top">Όνομα Επιχείρησης</a>
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
                <img class="img-responsive" src="{{ asset('assets/template/img/profile.png') }}" alt="">
                <div class="intro-text">
                    <span class="name">Τίτλος Επιχείρησης</span>
                    <hr class="star-light">
                    <span class="skills"><strong>Απόφθεγμα (σλόγκαν)</strong><br>Στην περιοχή "Απόφθεγμα (σλόγκαν)" εισάγετε ένα απόφθεγμα (σλόγκαν) που χρησιμοποιείτε για την επιχείρηση σας, εάν υπάρχει. Η εισαγωγή κειμένου σε αυτή την περιοχή είναι προαιρετική.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- object Grid Section -->
<section id="object">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Περιγραφή αντικειμένου</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                Στην περιοχή "<i>Περιγραφή αντικειμένου</i>" μπορείτε να εισάγετε μια σύντομη περιγραφή των εργασιών καθώς και του αντικειμένου της επιχείρησης σας. Η περιγραφή αυτή μπορεί να έχει μέγιστο μέγεθος τους 40 χαρακτήρες. Η εισαγωγή κειμένου σε αυτή την περιοχή είναι <strong>υποχρεωτική</strong>.
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
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <span class="skills">Στην περιοχή "<i>Σχετικά με εμάς</i>" μπορείτε να εισάγετε ένα κείμενο με μια σύντομη αναφορά στην επιχείρηση σας. Η εισαγωγή κειμένου σε αυτή την περιοχή είναι <strong>υποχρεωτική</strong>.</span>
            </div>
        </div>
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
                <img class="img-responsive" src="{{ asset('assets/template/img/test_map.png') }}" />
            </div>
            <div class="col-lg-6">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Όνομα</label>
                            <input type="text" class="form-control" placeholder="Όνομα" id="name" required data-validation-required-message="Παρακαλώ εισάγετε το όνομά σας.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>E-mail</label>
                            <input type="email" class="form-control" placeholder="E-mail" id="email" required data-validation-required-message="Παρακαλώ εισάγετε το e-mail σας.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Μήνυμα</label>
                            <textarea rows="5" class="form-control" placeholder="Μήνυμα" id="message" required data-validation-required-message="Παρακαλώ εισάγετε ένα μήνυμα."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Αποστολή</button>
                        </div>
                    </div>
                </form>
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
                    <p>Στην περιοχή "<i>Βρείτε μας</i>" εμφανίζονται τα στοιχεία διεύθυνσης της επιχείρησης σας. Η εισαγωγή των στοιχείων σε αυτή την περιοχή είναι <strong>υποχρεωτική</strong>.</p>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Social Media</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Επικοινωνήστε μαζί μας</h3>
                    <p>Στην περιοχή "<i>Επικοινωνήστε μαζί μας</i>" εμφανίζονται τα στοιχεία επικοινωνίας της επιχείρησης σας. Η εισαγωγή των στοιχείων σε αυτή την περιοχή είναι <strong>υποχρεωτική</strong>.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; tipospu.gr 2015
                </div>
                <cite>Powered by AegeanTeach</cite>
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

</body>

</html>