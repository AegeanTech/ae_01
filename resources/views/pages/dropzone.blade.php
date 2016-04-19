@extends('master')

{{-- Page title --}}
@section('title')
Gallery
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/dropzone-master/downloads/css/dropzone.css') }}" rel="stylesheet" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>File Drop Zone</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Home
            </a>
        </li>
        <li>Gallery</li>
        <li class="active">File Drop Zone</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <!-- First Basic Table strats here-->
            <div class="dropzone" id="dropzoneFileUpload">
            </div>
        </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/dropzone-master/downloads/dropzone.js') }}"></script>
<<script type="text/javascript">
    var baseUrl = "{{ url('/admin/') }}";
    var token = "{{ Session::getToken() }}";
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#dropzoneFileUpload", {
        url: baseUrl + "/dropzone/uploadFiles",
        params: {
            _token: token
        }
    });
    Dropzone.options.myAwesomeDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        accept: function(file, done) {

        },
    };
</script>
@stop