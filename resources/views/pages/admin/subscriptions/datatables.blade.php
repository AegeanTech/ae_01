@extends('master')

{{-- Page title --}}
@section('title')
    Συνδρομές
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Συνδρομές</h1>
        <ol class="breadcrumb">
            <div id="date_sectiontime"></div>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="money" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Λίστα Συνδρομών
                    </h4>
                </div>
                <br />
                <div class="panel-body">
                    <table class="table table-bordered " id="table1">
                        <thead>
                        <tr class="filters">
                            <th>Id</th>
                            <th>Τίτλος</th>
                            <th>Suburl</th>
                            <th>Αναβάθμιση</th>
                            <th>Έναρξη</th>
                            <th>Λήξη</th>
                            <th>Ενέργειες</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    <!-- row-->
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.js') }}"></script>
    <script>
        $(function() {
            var table = $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.subscription.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'suburl', name: 'suburl' },
                    { data: 'subscriptions.upgraded_at', name: 'upgraded_at', format: '{0:MM/dd/yyyy}'},
                    { data: 'subscriptions.started_at', name: 'started_at' },
                    { data: 'subscriptions.ended_at', name: 'ended_at' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
            table.on( 'draw', function () {
                $('.livicon').each(function(){
                    $(this).updateLivicon();
                });
            } );
        });
    </script>
@stop
