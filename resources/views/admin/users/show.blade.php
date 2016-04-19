@extends('master')

{{-- Page title --}}
@section('title')
    Προβολή Προφίλ Χρήστη
    @parent
    @stop

    {{-- page level styles --}}
    @section('header_styles')
            <!--page level css -->
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" type="text/css"/>
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Προβολή Χρήστη</h1>
        <ol class="breadcrumb">
            <div id="date_section"></div>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav  nav-tabs ">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab"> <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
                            Προφίλ Χρήστη
                        </a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">
                            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Αλλαγή Κωδικού
                        </a>
                    </li>
                    {{--<li>--}}
                        {{--<a href="{{ URL::to('admin/user_profile') }}" >--}}
                            {{--<i class="livicon" data-name="gift" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>--}}
                            {{--Advanced User Profile--}}
                        {{--</a>--}}
                    {{--</li>--}}

                </ul>
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            @lang('users/title.user_profile')
                                        </h3>

                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <form method="post" action="#">

                                                        <table class="table table-bordered table-striped" id="users">

                                                            <tr>
                                                                <td>@lang('users/title.first_name')</td>
                                                                <td>
                                                                    {{ $user->first_name }}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>@lang('users/title.last_name')</td>
                                                                <td>
                                                                    {{ $user->last_name }}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>@lang('users/title.email')</td>
                                                                <td>
                                                                    {{ $user->email }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>@lang('users/title.status')</td>
                                                                <td>

                                                                    @if($user->deleted_at)
                                                                        Deleted
                                                                    @elseif($user->activated)
                                                                        Activated
                                                                    @else
                                                                        Pending
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>@lang('users/title.created_at')</td>
                                                                <td>
                                                                    {{{ $user->created_at->diffForHumans() }}}
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12 pd-top">
                                <form action="#" class="form-horizontal">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="inputpassword" class="col-md-3 control-label">
                                                Κωδικός
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                </span>
                                                    <input type="password" placeholder="Κωδικός" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnumber" class="col-md-3 control-label">
                                                Επιβεβαίωση Κωδικού
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                </span>
                                                    <input type="password" placeholder="Κωδικός" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-primary">Αποστολή</button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger">Ακύρωση</button>
                                            &nbsp;
                                            <input type="reset" class="btn btn-default hidden-xs" value="Αναίρεση"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop

    {{-- page level scripts --}}
    @section('footer_scripts')
            <!-- Bootstrap WYSIHTML5 -->
    <script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
@stop