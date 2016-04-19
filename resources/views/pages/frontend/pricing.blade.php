@extends('home')

{{-- Page title --}}
@section('title')
    Δυνατότητες
    @parent
    @stop

    {{-- Page content --}}
    @section('content')
    <!-- Intro -->
    <section class="site-section site-section-light site-section-top themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-slideDown"><i class="fa fa-thumbs-up"></i> <strong>Διαθέσιμα Πακέτα</strong></h1>
            <h2 class="h3 text-center animation-slideUp">Το <strong>TiPosPou</strong> διαθέτει διαφορετικά πακέτα για να επιλέξετε αυτό που σας καλύπτει!</h2>
        </div>
    </section>
    <!-- END Intro -->

    <!-- Plans -->
    <section class="site-content site-section">
        <div class="container">
            <div class="site-block">
                <div class="row">
                    <div class="col-sm-4">
                        <!-- You can add the class 'table-featured' to feature the best plan. In this case, make sure to remove the hover functionality from js/pages/pricing.js -->
                        <table class="table table-borderless table-pricing animation-fadeIn">
                            <thead>
                            <tr>
                                <th class="table-featured">Μπλε</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><strong>Επιλογή</strong> Λογότυπου</td>
                            </tr>
                            <tr>
                                <td><strong>2</strong> Διαθέσιμα Template</td>
                            </tr>
                            <tr>
                                <td><strong>Εισαγωγή</strong> Χάρτη</td>
                            </tr>
                            <tr>
                                <td><strong>Αποστολή</strong> Μηνυμάτων</td>
                            </tr>
                            <tr>
                                <td><strong>Απλό</strong> Κείμενο</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="table-price">
                                    <h1>Δωρεάν</h1>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4">
                        <!-- You can add the class 'table-featured' to feature the best plan. In this case, make sure to remove the hover functionality from js/pages/pricing.js -->
                        <table class="table table-borderless table-pricing animation-fadeIn table-disabled-green">
                            <thead>
                            <tr>
                                <th>Πράσινο</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><strong>Επιλογή</strong> Λογότυπου</td>
                            </tr>
                            <tr>
                                <td><strong>Λέξεις</strong> Κλειδιά</td>
                            </tr>
                            <tr>
                                <td><strong>5</strong> Διαθέσιμα Template</td>
                            </tr>
                            <tr>
                                <td><strong>Εισαγωγή</strong> Χάρτη</td>
                            </tr>
                            <tr>
                                <td><strong>Αποστολή</strong> Μηνυμάτων</td>
                            </tr>
                            <tr>
                                <td><strong>Μορφοποιημένο</strong> Κείμενο</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="table-price">
                                    <h1><small>Μη διαθέσιμο</small></h1>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4">
                        <!-- You can add the class 'table-featured' to feature the best plan. In this case, make sure to remove the hover functionality from js/pages/pricing.js -->
                        <table class="table table-borderless table-pricing animation-fadeIn table-disabled-red">
                            <thead>
                            <tr>
                                <th>Κόκκινο</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><strong>Επιλογή</strong> Λογότυπου & Φόντου</td>
                            </tr>
                            <tr>
                                <td><strong>Λέξεις</strong> Κλειδιά</td>
                            </tr>
                            <tr>
                                <td><strong>Εισαγωγή</strong> Gallery Φωτογραφιών</td>
                            </tr>
                            <tr>
                                <td><strong>5</strong> Διαθέσιμα Template</td>
                            </tr>
                            <tr>
                                <td><strong>Εισαγωγή</strong> Χάρτη</td>
                            </tr>
                            <tr>
                                <td><strong>Αποστολή</strong> Μηνυμάτων</td>
                            </tr>
                            <tr>
                                <td><strong>Μορφοποιημένο</strong> Κείμενο</td>
                            </tr>
                            <tr>
                                <td class="table-price">
                                    <h1><small>Μη διαθέσιμο</small></h1>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!-- END Plans -->

    <!-- Extra Info -->
    <section class="site-content site-section">
        <div class="container">
            <div class="site-block">
                <h3 class="site-heading text-center"><strong>Όλα</strong> τα πακέτα περιλαμβάνουν</h3>
                <div class="row push-bit">
                    <div class="col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2">
                        <ul class="fa-ul ul-breath">
                            <li><i class="fa fa-check text-primary fa-li"></i> Δωρεάν αναβαθμίσεις</li>
                            <li><i class="fa fa-check text-primary fa-li"></i> Πλήρη καθοδήγηση</li>
                            <li><i class="fa fa-check text-primary fa-li"></i> Εύχρηστο περιβάλλον</li>
                        </ul>
                    </div>
                    <div class="col-sm-5 col-md-4">
                        <ul class="fa-ul ul-breath">
                            <li><i class="fa fa-check text-primary fa-li"></i> Ασφάλεια στοιχείων</li>
                            <li><i class="fa fa-check text-primary fa-li"></i> Καμία επιπλέον χρέωση</li>
                            <li><i class="fa fa-check text-primary fa-li"></i> Κανένας κρυφός όρος</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Extra Info -->
@stop