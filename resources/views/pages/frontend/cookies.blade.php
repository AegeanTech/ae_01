@extends('home')

{{-- Page title --}}
@section('title')
    Cookies
    @parent
    @stop

    {{-- Page content --}}
    @section('content')
            <!-- Intro -->
    <section class="site-section site-section-light site-section-top themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-slideDown"><i class="fa fa-briefcase"></i> <strong>Cookies</strong></h1>
            <h2 class="h3 text-center animation-slideUp">Χρησιμοποιώντας αυτόν τον ιστότοπο, συμφωνείτε με την χρήση των cookies.</h2>
        </div>
    </section>
    <!-- END Intro -->

    <!-- Company Info -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="site-block">
                        <h3 class="site-heading"><strong>Γενικά</strong></h3>
                        <p>Το TiPosPou κάνει χρήση cookies. Χρησιμοποιώντας αυτόν τον ιστότοπο, συμφωνείτε με την χρήση των cookies, σύμφωνα με τις οδηγίες μας. Σε περίπτωση που δεν συμφωνείτε με αυτή τη χρήση των cookies, θα πρέπει είτε να ορίσετε τις ρυθμίσεις του browser σας αναλόγως είτε να αποχωρήσετε από το TiPosPou. Σε περίπτωση απενεργοποίησης των cookies που χρησιμοποιούμε, ενδέχεται να επηρεαστεί η εμπειρία πλοήγησης σας στον διαδικτυακό μας τόπο.</p>
                    </div>
                    <div class="site-block">
                        <h3 class="site-heading"><strong>Τρόπος χρήσης των cookie από την Google</strong></h3>
                        <p>Τα cookies είναι αρχεία ή μικρό τμήμα κειμένου που αποστέλλεται στο πρόγραμμα περιήγησης από έναν ιστότοπο τον οποίο επισκέπτεστε.
                            Η χρήση τους διευκολύνει τον ιστότοπο να απομνημονεύει πληροφορίες σχετικά με την επίσκεψή σας, καθώς και άλλες ρυθμίσεις όπως είναι η προτιμώμενη από εσάς γλώσσα. Μέσω αυτής της διαδικασίας διευκολύνεται η παροχή των βέλτιστων υπηρεσιών ανά χρήστη καθώς και η βελτίωση του ιστότοπου. Με τον τρόπο αυτό κατά την επόμενή επίσκεψη ο ιστότοπος θα είναι πιο χρήσιμος για εσάς.</p>
                    </div>
                    <div class="site-block">
                        <h3 class="site-heading"><strong>Ο ρόλος των cookies και η σημασία τους</strong></h3>
                        <p>Μέσω της παρακολούθησης της πλοήγησή σας στον ιστότοπο του TiPosPou και της αποθήκευσης των cookies μπορούμε να βελτιώνουμε τον τρόπο λειτουργίας της εφαρμογής καθώς και να σχεδιάσουμε επιπλέον λειτουργικότητας που ενδεχομένως θα προστεθούν στο μέλλον. Κάποιες από τις πληροφορίες που μπορούμε να συλλέξουμε είναι ο υπολογισμός του αριθμού των επισκεπτών του ιστότοπου ή και του κάθε προφίλ ξεχωριστά καθώς και κάποια ανώνυμα στατιστικά στοιχεία που χρησιμευουν στην κατανόηση του τρόπου χρήσης του ιστότοπου με σκοπό την βελτίωση της δομής, του περιεχομένου καθώς και του τρόπου λειτουργίας του,
                            <a href="https://www.google.com/policies/technologies/types/" target="_blank">Εδώ</a> υπάρχει μια λίστα με τους τύπους των Cookie που χρησιμοποιεί η Google. Σε περίπτωση που θέλετε πληροφορίες σχετικά με τους τρόπους που χρησιμοποιεί η Google και οι συνεργάτες της τα Cookies στις διαφημίσεις μπορείτε να επισκεφτείτε τον σχετικό <a href="https://www.google.com/policies/technologies/ads/" target="_blank">σύνδεσμο</a>. Στην <a href="https://www.google.com/policies/privacy/" target="_blank">πολιτική απορρήτου</a> εξηγείται ο τρόπος με τον οποίο προστατεύουμε το απόρρητο σας κατά την από μέρους μας χρήση των cookie καθώς και άλλων πληροφοριών.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Company Info -->
@stop