@extends('home')

{{-- Page title --}}
@section('title')
    Form Wizard
    @parent
    @stop

    {{-- Page content --}}
    @section('content')
            <!-- Home Carousel -->
    <div id="home-carousel" class="carousel carousel-home slide my_tipospou" data-ride="carousel" data-interval="5000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="active item">
                <section class="site-section site-section-light site-section-top themed-background-default">
                    <div class="container">
                        <h1 class="text-center animation-slideDown"><strong>Ένα πλήρες site σε minimal μορφή</strong></h1>
                        <h2 class="text-center animation-slideUp push">Δημιουργήστε εύκολα και με λίγα βήματα το micro-site της επιχείρησης σας</h2>
                        <p class="text-center animation-fadeIn">
                            <img src="{{ asset('assets/frontend/img/placeholders/screenshots/promo_desktop_left_01.png') }}" alt="Promo Image 1">
                        </p>
                    </div>
                </section>
            </div>
            <div class="item">
                <section class="site-section site-section-light site-section-top themed-background-fire">
                    <div class="container">
                        <h1 class="text-center animation-fadeIn360"><strong>Πολύ εύκολο στην χρήση</strong></h1>
                        <h2 class="text-center animation-fadeIn360 push">Παρέχεται πλήρης καθοδήγηση στον χρήστη για όλες τις ενέργειες που μπορεί να πραγματοποιήσει μέσω του διαχειριστικού περιβάλλοντος</h2>
                        <p class="text-center animation-fadeInLeft">
                            <img src="{{ asset('assets/frontend/img/placeholders/screenshots/promo_laptop_right.png') }}" alt="Promo Image 2">
                        </p>
                    </div>
                </section>
            </div>
            <div class="item">
                <section class="site-section site-section-light site-section-top themed-background-amethyst">
                    <div class="container">
                        <h1 class="text-center animation-hatch "><strong>Πλήρως προσαρμόσιμο σε όλες τις συσκευές</strong></h1>
                        <h2 class="text-center animation-hatch push ">Φτιαγμένο για να παρέχει την καλύτερη εμπειρία χρήσης ανεξάρτητα από την συσκευή</h2>
                        <p class="text-center animation-hatch">
                            <img src="{{ asset('assets/frontend/img/placeholders/screenshots/promo_desktop_left_02.png') }}" alt="Promo Image 3">
                        </p>
                    </div>
                </section>
            </div>
            <div class="item">
                <section class="site-section site-section-light site-section-top themed-background-modern">
                    <div class="container">
                        <h1 class="text-center animation-fadeInLeft "><strong>Πολλαπλές δυνατότητες περιεχομένου</strong></h1>
                        <h2 class="text-center animation-fadeInRight push ">Εισάγετε εσείς ότι περιεχόμενο θεωρείτε απαραίτητο για εμφάνιση</h2>
                        <p class="text-center animation-fadeIn360">
                            <img src="{{ asset('assets/frontend/img/placeholders/screenshots/promo_tablet.png') }}" alt="Promo Image 4">
                        </p>
                    </div>
                </section>
            </div>
        </div>
        <!-- END Wrapper for slides -->

        <!-- Controls -->
        <a class="left carousel-control" href="#home-carousel" data-slide="prev">
                    <span>
                        <i class="fa fa-chevron-left"></i>
                    </span>
        </a>
        <a class="right carousel-control" href="#home-carousel" data-slide="next">
                    <span>
                        <i class="fa fa-chevron-right"></i>
                    </span>
        </a>
        <!-- END Controls -->
    </div>
    <!-- END Home Carousel -->

    <!-- Promo #1 -->
    <section class="site-content site-section site-slide-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-md-offset-1 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="-180">
                    <h3 class="h2 site-heading site-heading-promo"><strong>Ευκολία χρήσης</strong></h3>
                    <p class="promo-content">Μέσα από ένα εύκολο μενού και με την καθοδήγηση ενός οδηγού χρήσης μπορείτε εύκολα να φτιάξετε το προφίλ σας καθώς και να το αλλάξετε όποτε επιθυμείτε.</p>
                </div>
                <div class="col-sm-6 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInRight" data-element-offset="-180">
                    <img src="{{ asset('assets/frontend/img/placeholders/screenshots/promo_desktop_right_01.png') }}" alt="Promo #1" class="img-responsive">
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!-- END Promo #1 -->

    <!-- Promo #2 -->
    <section class="site-content site-section site-slide-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-offset-1 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="-180">
                    <img src="{{ asset('assets/frontend/img/placeholders/screenshots/promo_laptop_left.png') }}" alt="Promo #2" class="img-responsive">
                </div>
                <div class="col-sm-6 col-md-5 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInRight" data-element-offset="-180">
                    <h3 class="h2 site-heading site-heading-promo"><strong>Πλούσιο περιεχόμενο</strong></h3>
                    <p class="promo-content">Το κάθε προφίλ δημιουργεί ένα micro-site το οποίο περιέχει όλες τις απαραίτητες πληροφορίες που χρειάζεται να εμφανίσει μια επιχείρηση έτσι ώστε να διαφημίσει την παρουσία της. Και όλα αυτά σε ένα πολύ μοντέρνο και φιλικό στον χρήστη περιβάλλον.</p>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!-- END Promo #2 -->

    <!-- Promo #2 -->
    <section class="site-content site-section site-slide-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInRight" data-element-offset="-180">
                    <h3 class="h2 site-heading site-heading-promo"><strong>Πλήρης διαχείριση</strong></h3>
                    <p class="promo-content">Στο διαχειριστικό περιβάλλον ο χρήστης μπορεί εύκολα να προβεί οποιαδήποτε στιγμή σε αλλαγές στο περιεχόμενο του micro-site του. Του παρέχεται η δυνατότητα αλλαγής των κειμένων, των γραφικών καθώς και του λογότυπου.</p>
                </div>
                <div class="col-sm-6 col-md-offset-1 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="-180">
                    <img src="{{ asset('assets/frontend/img/placeholders/screenshots/promo_desktop_right_02.png') }}" alt="Promo #2" class="img-responsive">
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!-- END Promo #2 -->

    <!-- Promo #3 -->
    <section class="site-content site-section site-slide-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInRight" data-element-offset="-180">
                    <img src="{{ asset('assets/frontend/img/placeholders/screenshots/promo_tablet.png') }}" alt="Promo #3" class="img-responsive">
                </div>
                <div class="col-sm-6 col-md-5 col-md-offset-1 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="-180">
                    <h3 class="h2 site-heading site-heading-promo"><strong>Πλήρως </strong> προσαρμόσιμο</h3>
                    <p class="promo-content">Η εμφάνιση του προφίλ προσαρμόζεται αυτόματα για να γίνει προβολή του σε οποιαδήποτε τερματική συσκευή όπως κινητά τηλέφωνα, ταμπλέτες και ηλεκτρονικούς υπολογιστές.</p>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!-- END Promo #3 -->

    <!-- Promo #4 -->
    <section class="site-content site-section site-slide-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInRight" data-element-offset="-180">
                    <h3 class="h2 site-heading site-heading-promo">
                        <strong>Προτεραιότητα στις φορητες συσκευες</strong>
                    </h3>
                    <p class="promo-content">Σύμφωνα με τα μοντέρνα πρότυπα διαδικτυακών εφαρμογών και βάση των όσων προτείνει η google, η σχεδίαση της εφαρμογής δίνει έμφαση στην παρουσίαση σε φορητές συσκευές.</p>
                </div>
                <div class="col-sm-6 col-md-offset-1 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="-180">
                    <img src="{{ asset('assets/frontend/img/placeholders/screenshots/promo_mobile.png') }}" alt="Promo #4" class="img-responsive">
                </div>
            </div>
        </div>
    </section>
    <!-- END Promo #4 -->
@stop