@extends('master')

{{-- Page title --}}
@section('title')
    Φόρμα Επεξεργασίας
    @parent
    @stop

    {{-- page level styles --}}
@section('header_styles')
            <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.colReorder.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.scroller.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css">
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Advanced Datatables</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">DataTables</a>
            </li>
            <li class="active">Advanced Datatables</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!-- row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success filterable" style="overflow:auto;">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Re-order Columns
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered" id="table2">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>
                                    User E-mail
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>
                                    JacobThornton
                                </td>
                                <td>
                                    JacobThornton@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>10.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>11.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>12.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>13.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>14.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>15.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>16.</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            <tr>
                                <td>17.</td>
                                <td>Larryss</td>
                                <td>the Bird</td>
                                <td>
                                    Larrythe Bird
                                </td>
                                <td>
                                    LarrytheBird@test.com
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
        <!-- begining of page level js -->
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.tableTools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.colReorder.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.scroller.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/pages/table-advanced.js') }}"></script>
@stop