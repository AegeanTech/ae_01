@extends('home')

{{-- Page title --}}
@section('title')
    Δυνατότητες TiPosPou
    @parent
    @stop

    {{-- Page content --}}
    @section('content')
    <!-- Intro -->
    <section class="site-section site-section-light site-section-top themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-slideDown"><i class="fa fa-bookmark"></i> <strong>Δυνατότητες</strong></h1>
            <h2 class="h3 text-center animation-slideUp">Περιγραφή των δυνατοτήτων του TiPosPou!</h2>
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

    <!-- Features -->
    <section class="site-content site-section">
        <div class="container text-center">
            <div class="row row-items">
                <div class="col-sm-4">
                    <a href="javascript:void(0)" class="circle visibility-none themed-background-fire" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100">
                        <i class="gi gi-fire"></i>
                    </a>
                    <h4 class="site-heading"><strong>Τεχνολογίες αιχμής</strong></h4>
                    <p class="text-left remove-margin">Οι τεχνολογίες που ενσωματώνονται στο tipospu είναι ότι πιο σύγχρονο υπάρχει στον διαδικτυακό κόσμο. Έτσι εξασφαλίζεται ένα άρτιο αποτέλεσμα που προσφέρει πολλές ευκολίες καθώς και μεγάλη ασφάλεια.</p>
                </div>
                <div class="col-sm-4">
                    <a href="javascript:void(0)" class="circle visibility-none themed-background" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100">
                        <i class="gi gi-iphone_shake"></i>
                    </a>
                    <h4 class="site-heading"><strong>Πλήρως προσαρμόσιμη</strong></h4>
                    <p class="text-left remove-margin">Η σχεδίαση της σελίδας έχει γίνει με προσανατολισμό στην βέλτιστη προσαρμογή σε όλα τα είδη συσκευών που μπορούν να έχουν πρόσβαση σε αυτήν. Με τον τρόπο αυτό μπορεί και αναγνωρίζει το είδος της συσκευής και αν πρόκειται για μεγάλη ή μικρή οθόνη και παίρνει την κατάλληλη μορφή.</p>
                </div>
                <div class="col-sm-4">
                    <a href="javascript:void(0)" class="circle visibility-none themed-background-flatie" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100">
                        <i class="gi gi-eye_open"></i>
                    </a>
                    <h4 class="site-heading"><strong>Βελτιωμένη ευκρίνεια</strong></h4>
                    <p class="text-left remove-margin">Μέσω της χρήσης τεχνολογιών CSS3 και JavaScript εξασφαλίζεται η βέλτιστη ανάλυση οθόνης έτσι ώστε να παρέχεται στον χρήστη η καλύτερη δυνατή εμπειρία χρήσης κατά την πλοήγηση του στο tipopsu καθώς και στην παρουσίαση της επιχείρησης του.</p>
                </div>
            </div>
            <div class="row row-items">
                <div class="col-sm-4">
                    <a href="javascript:void(0)" class="circle visibility-none themed-background-amethyst" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100">
                        <i class="gi gi-globe_af"></i>
                    </a>
                    <h4 class="site-heading"><strong>Συμβατό με όλους τους Browser</strong></h4>
                    <p class="text-left remove-margin">Το προφίλ της επιχείρησης σας είναι πλήρως συμβατό με όλους τους μοντέρνους browsers όπως οι Chrome, Firefox, Safari, Opera καθώς και με τις τελευταίες εκδόσεις του Internet Explorer. Υποστηρίζει ακόμα και τον IE8, οπότε δεν θα έχετε να ανησυχείτε για κανέναν επισκέπτη.</p>
                </div>
                <div class="col-sm-4">
                    <a href="javascript:void(0)" class="circle visibility-none themed-background-spring" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100">
                        <i class="gi gi-flash"></i>
                    </a>
                    <h4 class="site-heading"><strong>Ελαφρύ περιβάλλον</strong></h4>
                    <p class="text-left remove-margin">Με την χρήση κώδικα νέας τεχνολογίας σε συνδυασμό με λεπτομερή ανάλυση απαιτήσεων έχει επιτευχθεί η παραγωγή μιας σελίδας όσο το δυνατόν ελαφρύτερης με ελάχιστες απαιτήσεις σε πόρους. Αυτό σημαίνει πως δεν θα αποκλείεται κανένας επισκέπτης από την πρόσβαση στο προφίλ σας, ανεξάρτητα από τις δυνατότητες της συσκευής του.</p>
                </div>
                <div class="col-sm-4">
                    <a href="javascript:void(0)" class="circle visibility-none themed-background-autumn" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100">
                        <i class="gi gi-iphone"></i>
                    </a>
                    <h4 class="site-heading"><strong>Έμφαση στις φορητές συσκευές</strong></h4>
                    <p class="text-left remove-margin">Η σχεδίαση της σελίδας έχει γίνει με προσανατολισμό στην βέλτιστη προσαρμογή σε όλα τα είδη συσκευών που μπορούν να έχουν πρόσβαση σε αυτήν. Με τον τρόπο αυτό μπορεί και αναγνωρίζει το είδος της συσκευής και αν πρόκειται για μεγάλη ή μικρή οθόνη και παίρνει την κατάλληλη μορφή.</p>
                </div>
            </div>
            <div class="row row-items">
                <div class="col-sm-4">
                    <a href="javascript:void(0)" class="circle visibility-none themed-background-night" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100">
                        <i class="gi gi-settings"></i>
                    </a>
                    <h4 class="site-heading"><strong>Επεξεργασία περιεχομένου</strong></h4>
                    <p class="text-left remove-margin">Μέσω του διαχειριστικού περιβάλλοντος ο χρήστης έχει την δυνατότητα να επεξεργαστεί πλήρως τα στοιχεία και το υλικό που θα εμφανίζονται στο micro-site της επιχείρησης του. Με τον τρόπο αυτό μπορεί να το προσαρμόσει στον μέγιστο βαθμό έτσι ώστε να παρέχει μια πλήρη εικόνα της επιχείρησης του στο διαδίκτυο σε λίγα βήματα.</p>
                </div>
                <div class="col-sm-4">
                    <a href="javascript:void(0)" class="circle visibility-none themed-background-fancy" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100">
                        <i class="gi gi-electricity"></i>
                    </a>
                    <h4 class="site-heading"><strong>Ευέλικτη εμφάνιση</strong></h4>
                    <p class="text-left remove-margin">Δημιουργήστε το προφίλ της επιχείρησης σας όπως την εκφράζει καλύτερα. Εισάγετε τις πληροφορίες στις κατάλληλες περιοχές που παρέχονται και δημιουργήστε μια σελίδα όπως ακριβώς εσείς θέλετε.</p>
                </div>
                <div class="col-sm-4">
                    <a href="javascript:void(0)" class="circle visibility-none themed-background-modern" data-toggle="animation-appear" data-animation-class="animation-fadeIn360" data-element-offset="-100">
                        <i class="gi gi-tint"></i>
                    </a>
                    <h4 class="site-heading"><strong>Πολλαπλοί συνδυασμοί χρωμάτων</strong></h4>
                    <p class="text-left remove-margin">Επιλέξτε από μια γκάμα χρωμάτων τον συνδυασμό αυτό που ταιριάζει περισσότερο στην επιχείρηση σας. Όλοι οι προτεινόμενοι συνδυασμοί έχουν μελετηθεί και έχουν υλοποιηθεί βάσει των τελευταίων τεχνολογιών ανάπτυξης interface έτσι ώστε να παρέχεται η βέλτιστη εμπειρία χρήσης.</p>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!-- END Features -->
@stop