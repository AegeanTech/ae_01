<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>
		@section('title')
			| tipospοu
		@show
	</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

	<!-- Icons -->
	<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
	<link rel="shortcut icon" href="{{ asset('assets/img/tipospu/favicon.png') }}">
	<link rel="apple-touch-icon" href="{{ asset('assets/img/tipospu/img/icon57.png') }}" sizes="57x57">
	<link rel="apple-touch-icon" href="{{ asset('assets/img/tipospu/img/icon72.png') }}" sizes="72x72">
	<link rel="apple-touch-icon" href="{{ asset('assets/img/tipospu/img/icon76.png') }}" sizes="76x76">
	<link rel="apple-touch-icon" href="{{ asset('assets/img/tipospu/icon114.png') }}" sizes="114x114">
	<link rel="apple-touch-icon" href="{{ asset('assets/img/tipospu/icon120.png') }}" sizes="120x120">
	<link rel="apple-touch-icon" href="{{ asset('assets/img/tipospu/icon144.png') }}" sizes="144x144">
	<link rel="apple-touch-icon" href="{{ asset('assets/img/tipospu/icon152.png') }}" sizes="152x152">
	<link rel="apple-touch-icon" href="{{ asset('assets/img/tipospu/icon180.png') }}" sizes="180x180">
	<!-- END Icons -->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="{{ asset('assets/js/libs/html5shiv.js') }}"></script>
	<script src="{{ asset('assets/js/libs/respond.min.js') }}"></script>
	<![endif]-->
	<!-- global css -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- font Awesome -->
	<link href="{{ asset('assets/vendors/font-awesome-4.2.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/styles/black.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
	<link rel="stylesheet" href="{{ asset('assets/css/panel.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}" />

	<!--select css-->
	<link href="{{ asset('assets/vendors/select2/select2.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2-bootstrap.css') }}" />

	<!-- end of global css -->
	<!--page level css-->
	@yield('header_styles')
	<!--end of page level css-->
</head>

<body class="skin-josh">

<!-- umessage-->
{{--@foreach ($umessages as $umessage)--}}
    {{--@if(($umessage->status == 'Ενεργό') && ($umessage->triggered_at <= date("Y-m-d H:i:s")) && ($umessage->state == 'Νέο'))--}}
        {{--<div class="modal fade in" id="umessage" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">--}}
            {{--<div class="modal-dialog modal-sm">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                        {{--<h4 class="modal-title">{!! $umessage->type !!}</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                        {{--<b>{!! $umessage->description !!}</b>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" data-dismiss="modal" class="btn">Κλείσιμο</button>--}}
                        {{--<button type="button" class="btn btn-primary">Εντάξει</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}
{{--@endforeach--}}

{{--@if(Session::has('flash_message'))--}}
    {{--<div class="alert alert-success">{{ Session::get('flash_message')}}</div>--}}

{{--@endif--}}

<header class="header">
	<a href="{{ URL::to('admin/') }}" class="logo">
		<img src="{{ asset('assets/img/tipospu/logo.png') }}" alt="logo">
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<div>
			<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
				<div class="responsive_nav"></div>
			</a>
		</div>
		<div class="navbar-right">
			<ul class="nav navbar-nav">
                @include('partials.umessages')
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						@if(Sentinel::getUser()->pic)
							<img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img" class="img-circle img-responsive pull-left" height="35px" width="35px"/>
						@else
							<img src="{!! asset('assets/img/authors/avatar.png') !!} " width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
						@endif
						<div class="riot">
							<div>
								{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
								<span>
                                        <i class="caret"></i>
                                    </span>
							</div>
						</div>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header bg-light-blue">
							@if(Sentinel::getUser()->pic)
								<img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img" class="img-circle img-bor"/>
							@else
								<img src="{!! asset('assets/img/authors/avatar.png') !!}" class="img-responsive img-circle" alt="User Image">
							@endif
							<p class="topprofiletext">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</p>
						</li>
						<!-- Menu Body -->
						<li>
							<a href="{{ URL::to('admin/logout') }}">
								<i class="livicon" data-name="sign-out" data-s="18"></i>
								Αποσύνδεση
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="left-side sidebar-offcanvas{!! ( $initial==1 || Request::is('admin/preview') || Request::is('admin/help') ? ' collapse-left' : '') !!}">
		<section class="sidebar purplebg">
			<div class="page-sidebar  sidebar-nav">

				<div class="clearfix"></div>
				<!-- BEGIN SIDEBAR MENU -->
				<ul id="menu" class="page-sidebar-menu">
					<li {!! (Request::is('admin') ? 'class="active"' : '') !!} >
						<a href="{{ URL::to('admin/') }}">
							<i class="livicon" data-name="home" data-size="18" data-c="#ffffff" data-hc="#ffffff" data-loop="true"></i>
							<span class="title">Αρχική σελίδα</span>
						</a>

					</li>
					@if(head($userRoles) == 'Admin')
					{{--@if(1 == 1)--}}
						<li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '') !!}>
							<a href="#">
								<i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
								<span class="title">Διαχείριση Χρηστών</span>
								<span class="fa arrow"></span>
							</a>
							<ul class="sub-menu">
								<li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
									<a href="{{ URL::to('admin/users') }}">
										<i class="fa fa-angle-double-right"></i>
										Χρήστες
									</a>
								</li>
								<li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '') !!}>
									<a href="{{ URL::to('admin/users/create') }}">
										<i class="fa fa-angle-double-right"></i>
										Προσθήκη Χρήστη
									</a>
								</li>
								<li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) ? 'class="active" id="active"' : '') !!}>
									<a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}">
										<i class="fa fa-angle-double-right"></i>
										Προβολή Προφίλ
									</a>
								</li>
								<li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '') !!}>
									<a href="{{ URL::to('admin/deleted_users') }}">
										<i class="fa fa-angle-double-right"></i>
										Διεγραμένοι Χρήστες
									</a>
								</li>
							</ul>
						</li>
						<li {!! (Request::is('admin/groups') || Request::is('admin/groups/create') || Request::is('admin/groups/*') ? 'class="active"' : '') !!}>
							<a href="#">
								<i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
								<span class="title">Διαχείριση Ομάδων</span>
								<span class="fa arrow"></span>
							</a>
							<ul class="sub-menu">
								<li {!! (Request::is('admin/groups') ? 'class="active" id="active"' : '') !!}>
									<a href="{{ URL::to('admin/groups') }}">
										<i class="fa fa-angle-double-right"></i>
										Ομάδες
									</a>
								</li>
								<li {!! (Request::is('admin/groups/create') ? 'class="active" id="active"' : '') !!}>
									<a href="{{ URL::to('admin/groups/create') }}">
										<i class="fa fa-angle-double-right"></i>
										Προσθήκη Ομάδας
									</a>
								</li>
								{{--<li {!! (Request::is('admin/groups/any_user') ? 'class="active" id="active"' : '') !!}>--}}
									{{--<a href="{{ URL::to('admin/groups/any_user') }}">--}}
										{{--<i class="fa fa-angle-double-right"></i>--}}
										{{--Ελέυθερες Περιοχές--}}
									{{--</a>--}}
								{{--</li>--}}
								@if (Sentinel::getUser()->hasAccess('admin'))
									<li {!! (Request::is('admin/groups/admin_only') ? 'class="active" id="active"' : '') !!}>
										<a href="{{ URL::to('admin/groups/admin_only') }}">
											<i class="fa fa-angle-double-right"></i>
											Περιορισμένες Περιοχές
										</a>
									</li>
								@endif
							</ul>
						</li>
                        <li {!! (Request::is('admin/suburls') || Request::is('admin/suburls/*') || Request::is('admin/umessages/*') ? 'class="active"' : '') !!} >
                            <a href="{{ URL::to('admin/suburls') }}">
                                <i class="livicon" data-name="link" data-c="#ffffff" data-hc="#ffffff" data-size="18" data-loop="true"></i>
                                <span class="title">Suburls</span>
                            </a>
                        </li>
                        <li {!! (Request::is('admin/subscriptions') ? 'class="active"' : '') !!} >
                            <a href="{{ URL::to('admin/subscriptions') }}">
                                <i class="livicon" data-name="money" data-c="#ffffff" data-hc="#ffffff" data-size="18" data-loop="true"></i>
                                <span class="title">Συνδρομές</span>
                            </a>
                        </li>
                        <li {!! (Request::is('admin/urequests/manage/list/*') || Request::is('admin/urequests/manage/list/all') || Request::is('admin/urequests/manage/*/view') ? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="mail" data-c="#ffffff" data-hc="#ffffff" data-size="18" data-loop="true"></i>
                                <span class="title">Αιτήματα</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/urequests/manage/list/all') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/urequests/manage/list/all') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Όλα Τα Αιτήματα
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/urequests/manage/list/active') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/urequests/manage/list/active') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Αιτήματα Που Εκκρεμούν
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/urequests/manage/list/upgrade')  ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/urequests/manage/list/upgrade') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Αναβάθμιση Πακέτου
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/urequests/manage/list/suburl')  ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/urequests/manage/list/suburl') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Αλλαγή Ονόματος (Suburl)
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/urequests/manage/list/object')  ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/urequests/manage/list/object') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Προσθήκη Επαγγελματικής Κατηγορίας
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/urequests/manage/list/other')  ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/urequests/manage/list/other') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Άλλο
                                    </a>
                                </li>
                            </ul>
                        </li>
					@endif
                    {{--@if(head($userRoles) == 'User')--}}
					@if(strpos(head($userRoles), 'User') !== FALSE)
					<li class="{!! (Request::is('admin/preview') ? 'active' : '') . ( $initial==1 ? 'initial' : '' ) !!}" >
						{{--<a href="#" data-toggle="modal" data-target="#myModal">
							<i class="livicon" data-name="eye-open" data-size="18" {!! ( $initial==0 ? 'data-c="#dd4033" data-hc="#dd4033" data-loop="true"' : 'data-c="#909090" data-hc="#909090" data-animate="false"') !!} ></i>
							<span class="title">Προεπισκόπηση</span>
						</a>--}}
						<a href="{{ ( $initial==0 ? URL::to('admin/preview') : '#') }}">
							<i class="livicon" data-name="eye-open" data-size="18" {!! ( $initial==0 ? 'data-c="#dd4033" data-hc="#dd4033" data-loop="true"' : 'data-c="#909090" data-hc="#909090" data-animate="false"') !!} ></i>
							<span class="title">Προεπισκόπηση</span>
						</a>

					</li>
					<li class="{!! (Request::is('admin/edit') ? 'active' : '') . ( $initial==1 ? 'initial' : '' ) !!}" >
						<a href="#">
							<i class="livicon" data-name="gear" data-size="18" {!! ( $initial==0 ? 'data-c="#009178" data-hc="#009178" data-loop="true"' : 'data-c="#909090" data-hc="#909090" data-animate="false"') !!} ></i>
							<span class="title">Επεξεργασία</span>
							@if($initial==0)
								<span class="fa arrow"></span>
							@endif
						</a>
						@if($initial==0)
						<ul class="sub-menu">
							<li>
								<a href="#" id="step1">
									<i class="fa fa-angle-double-right"></i>
									Στοιχεία επιχείρησης
								</a>
							</li>
							<li>
								<a href="#" id="step2">
									<i class="fa fa-angle-double-right"></i>
									Στοιχεία επικοινωνίας
								</a>
							</li>
							<li>
								<a href="#" id="step3">
									<i class="fa fa-angle-double-right"></i>
									Περιγραφή επιχείρησης
								</a>
							</li>
						</ul>
						@endif
						{!! Form::open(['class' => '', 'url' => '/admin/edit', 'name'=>"step_selection", "id"=>"step_selection"]) !!}
						<input id="step_selector" type="hidden" value="1" name="step" />
						{!! Form::close() !!}
					</li>
					<li {!! (Request::is('admin/help') ? 'class="active"' : '') !!} >
						<a href="{{ URL::to('admin/help') }}">
							<i class="livicon" data-name="info" data-size="18" data-c="#3f779f" data-hc="#3f779f" data-loop="true"></i>
							<span class="title">Οδηγίες</span>
						</a>
					</li>
                    <br>
                    @if((head($userRoles) == 'R-User') && ($initial == 0))
                    {{--<li {!! (Request::is('admin/upload') ? 'class="active"' : '') !!} >--}}
                        {{--<a href="{{ URL::to('admin/upload') }}">--}}
                            {{--<i class="livicon" data-name="image" data-c="#ffffff" data-hc="#ffffff" data-size="18" data-loop="true"></i>--}}
                                {{--<i class="livicon" data-name="gallery" data-size="18" data-c="#3f779f" data-hc="#3f779f" data-loop="true"></i>--}}
                            {{--<span class="title">Gallery</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}


							<li {!! (Request::is('admin/file') || Request::is('admin/file/manage') ? 'class="active"' : '') !!}>
								<a href="#">
									<i class="livicon" data-name="doc-portrait" data-c="#ffffff" data-hc="#ffffff" data-size="18" data-loop="true"></i>
									<span class="title">Αρχεία</span>
									<span class="fa arrow"></span>
								</a>
								<ul class="sub-menu">
									<li {!! (Request::is('admin/file') ? 'class="active"' : '') !!}>
										<a href="{{ URL::to('admin/file') }}">
											<i class="fa fa-angle-double-right"></i>
											Ανέβασμα Αρχείων
										</a>
									</li>
									<li {!! (Request::is('admin/file/manage') ? 'class="active"' : '') !!}>
										<a href="{{ URL::to('admin/file/manage') }}">
											<i class="fa fa-angle-double-right"></i>
											Διαχείριση Αρχείων
										</a>
									</li>
								</ul>
							</li>

							<li {!! (Request::is('admin/upload') || Request::is('admin/upload/manage') ? 'class="active"' : '') !!}>
								<a href="#">
									<i class="livicon" data-name="image" data-c="#ffffff" data-hc="#ffffff" data-size="18" data-loop="true"></i>
									<span class="title">Gallery</span>
									<span class="fa arrow"></span>
								</a>
								<ul class="sub-menu">
									<li {!! (Request::is('admin/upload') ? 'class="active"' : '') !!}>
										<a href="{{ URL::to('admin/upload') }}">
											<i class="fa fa-angle-double-right"></i>
											Ανέβασμα Εικόνων
										</a>
									</li>
									<li {!! (Request::is('admin/upload/manage') ? 'class="active"' : '') !!}>
										<a href="{{ URL::to('admin/upload/manage') }}">
											<i class="fa fa-angle-double-right"></i>
											Διαχείριση Εικόνων
										</a>
									</li>
								</ul>
							</li>
                    @endif

                    <li {!! (Request::is('admin/urequests') || Request::is('admin/urequests/list') || Request::is('admin/urequests/{rid}/view') ? 'class="active"' : '') !!}>
                        <a href="#">
                            <i class="livicon" data-name="mail" data-c="#ffffff" data-hc="#ffffff" data-size="18" data-loop="true"></i>
                            <span class="title">Αιτήματα</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li {!! (Request::is('admin/urequests') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('admin/urequests') }}">
                                    <i class="fa fa-angle-double-right"></i>
                                    Υποβολή
                                </a>
                            </li>
                            <li {!! (Request::is('admin/urequests/list') || Request::is('admin/urequests/{rid}/view')  ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('admin/urequests/list') }}">
                                    <i class="fa fa-angle-double-right"></i>
                                    Λίστα Αιτημάτων
                                </a>
                            </li>
                        </ul>
                    </li>
                    <br>
                    <br>
				</ul>

				@if($initial == 0)
					<div class="link_info info0">Πακέτο χρήστη:</div>
					@if(head($userRoles) == 'R-User')
					<div class="link_info info0" style="color:#DD4033;">κόκκινο</div>
					@elseif(head($userRoles) == 'G-User')
					<div class="link_info info0" style="color:#009178;">πράσινο</div>
					@elseif((head($userRoles) == 'B-User') || (head($userRoles) == 'User'))
					<div class="link_info info0" style="color:#3F779F;">μπλε</div>
					@endif
					<div class="link_info info0">Ο σύνδεσμος (link) για το micro-site της επιχείρησης σου είναι ο:</div>
					<div class="link_info info1">
						<a href="{{ URL::to('site/') }}/{{ $content->suburl }}" target="_blank">
							<i class="livicon" data-name="link" data-l="true" data-c="#fff" data-hc="#fff" data-s="14"></i> {{ $content->suburl }}
						</a>
					</div>
				@endif
                @endif
				{{--@endif--}}
				<!-- END SIDEBAR MENU -->
			</div>
		</section>
		<footer id="copyright">
			<div>&copy; TiPosPou 2015</div>
			<cite>powered by <a href="http://www.aegeantech.gr" target="_blank">AegeanTech</a></cite>
		</footer>
	</aside>
	<aside class="right-side{!! ( $initial==1 || Request::is('admin/preview') || Request::is('admin/help') ? ' strech' : '') !!}">

		<!-- Content -->
		@yield('content')
	</aside>
	<!-- right-side -->

	@include('pages.modal')
</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
	<i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>
<!-- global js -->
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!--livicons-->
<script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}"></script>
<script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>
<script src="{{ asset('assets/js/josh.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/metisMenu.js') }}" type="text/javascript"></script>
<!--holder-->
<script src="{{ asset('assets/vendors/holder-master/holder.js') }}"></script>
<!--tipospu-->
<script type="text/javascript" src="{{ asset('assets/js/tipospu/tipospu.js') }}"></script>
<!--select2-->
<script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
<!-- end of global js -->
<!-- begin page level js -->
@yield('footer_scripts')
{{--jQuery(document).ready(function(){--}}
    {{--<script type='text/javascript'>--}}
        {{--$(document).ready(function(){--}}
            {{--$('#umessage').modal('show');--}}
        {{--});--}}
    {{--</script>";--}}
{{--};--}}

		<!-- end page level js -->
</body>
</html>