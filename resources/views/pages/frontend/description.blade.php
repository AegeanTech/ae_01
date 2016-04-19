@extends('home')

{{-- Page title --}}
@section('title')
    Περιγραφή TiPosPou
    @parent
    @stop

    {{-- Page content --}}
    @section('content')
    <!-- Intro -->
    <section class="site-section site-section-light site-section-top themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-slideDown"><i class="fa fa-bookmark"></i> <strong>Περιγραφή</strong></h1>
            <h2 class="h3 text-center animation-slideUp">Περιγραφή του TiPosPou!</h2>
        </div>
    </section>
    <!-- END Intro -->

    <!-- Promo Image -->
    <section class="site-content site-section">
        <div class="container text-center">
            <div class="site-block">
                <img src="{{ asset('assets/frontend/img/placeholders/screenshots/promo_all_devices.png') }}" alt="Promo Image" class="img-responsive visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeIn" data-element-offset="-100">
            </div>
            <hr>
        </div>
    </section>
    <!-- END Promo Image -->

    <!-- Key Features -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 site-block">
                    <h3 class="site-heading"><i class="fa fa-comment-o text-danger animation-pulse"></i> <strong>Τι;</strong> </h3>
                    <p class="remove-margin">Το <strong>www.tipospou.gr</strong> είναι ένας διαδικτυακός τόπος οπού ο κάθε χρήστης μπορεί να δημιουργήσει ένα micro - site για την επιχείρηση του. To micro - site αυτό αποτελεί το προφίλ του κάθε χρήστη.</p>
                </div>
                <div class="col-sm-4 site-block">
                    <h3 class="site-heading"><i class="fa fa-comment-o text-success animation-pulse"></i> <strong>Πως;</strong></h3>
                    <p class="remove-margin">Ο κάθε χρήστης πραγματοποιεί εγγραφή στο site και στην συνέχεια μέσω ενός wizard καθοδηγείται βήμα προς βήμα στην δημιουργία ενός προφίλ το οποίο θα αποτελεί το micro – site του. Αυτό το προφίλ έχει την δυνατότητα να το παραμετροποιήσει όπως θέλει.</p>
                </div>
                <div class="col-sm-4 site-block">
                    <h3 class="site-heading"><i class="fa fa-comment-o text-info animation-pulse"></i> <strong>Που;</strong></h3>
                    <p class="remove-margin">Ο κάθε χρήστης διαθέτει ένα διαχειριστικό περιβάλλον μέσω του οποίου, αφού πρώτα συνδεθεί, μπορεί να πραγματοποιήσει είτε την αρχικοποίηση του προφίλ του αν πρόκειται για πρώτη είσοδο είτε να κάνει αλλαγές σε αυτά που έχει εισάγει. Μόλις ολοκληρώσει αυτή την διαδικασία, δημιουργείται αυτόματα ένα micro – site του οποίου το link προκύπτει από το όνομα της επιχείρησης.</p>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!-- END Key Features -->
@stop