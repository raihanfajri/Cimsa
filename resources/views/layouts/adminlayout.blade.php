<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CIMSA UNAND | ADMIN</title>
    @yield('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="shortcut icon" href="{{asset('logo/logo-primary.png')}}" />
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/bootstrap-admin/css/bootstrap.min.css')}}">
    <!-- Froala text editor CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <link rel="stylesheet" href="{{asset('/css/froala_style.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/froala_editor.pkgd.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/froala_editor.min.css')}}">
    <!-- Krajee file input CSS -->
    <link rel="stylesheet" href="{{asset('/css/fileinput.min.css')}}">
    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="{{asset('/vendor/metisMenu/metisMenu.min.css')}}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{asset('/vendor/datatables-plugins/dataTables.bootstrap.css')}}">
    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="{{asset('/vendor/datatables-responsive/dataTables.responsive.css')}}">
    <!-- Sweetalert2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.css">
    <!-- FancyBox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('/css/sb-admin-2.min.css')}}">
    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/font-awesome/css/font-awesome.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('admin/') }}">CIMSA ADMIN</a>
    </div>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i> Home</a>
                </li>
                <li>
                    <a href="{{ url('admin/') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-star"></i> Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('admin/articles') }}" class="{{ Request::is('admin/articles') ? 'active' : '' }}">Articles</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/activities') }}" class="{{ Request::is('admin/activities') ? 'active' : '' }}">Activities</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/catalogs') }}" class="{{ Request::is('admin/catalogs') ? 'active' : '' }}">Catalogs</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/alumni') }}" class="{{ Request::is('admin/alumni') ? 'active' : '' }}">Alumni</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/message') }}" class="{{ Request::is('admin/message') ? 'active' : '' }}">Message Inbox</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    {!! Form::open(['url'=>'logout','method'=>'post','id'=>'form-logout']) !!}
                        
                    {!! Form::close() !!}
                    <a href='' id="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>   Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
@yield('content')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="{{asset('/vendor/bootstrap-admin/js/bootstrap.min.js')}}"></script>
<!-- Krajee file input JavaScript -->
<script type="text/javascript" src="{{asset('/js/purify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/fileinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/froala_editor.pkgd.min.js')}}"></script>
<!-- Metis Menu Plugin JavaScript -->
<script type="text/javascript" src="{{asset('/vendor/metisMenu/metisMenu.min.js')}}"></script>
<!-- DataTables JavaScript -->
<script type="text/javascript" src="{{asset('/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<!-- SweetAlert 2 JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.js"></script>
<!-- FancyBox JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Custom Theme JavaScript -->
<script type="text/javascript" src="{{asset('/js/sb-admin-2.js')}}"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $('#logout').click(function(){
        event.preventDefault();
        $('#form-logout').submit()
    })
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        $(".upload-image").fileinput({
            showUpload: false,
            showRemove: false,
            required: true,
            validateInitialCount: true,
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
        $(".edit-upload-image").fileinput({
            showUpload: false,
            showRemove: false,
            required: false,
            validateInitialCount: true,
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
        $(".edit-upload-image").change(function(){
            $('.preview-image').html('')
        })
        $('#input').on('fileerror', function (event, data, msg) {
            // get message
            alert(msg);
        });
    });
    function submitdelete(id){
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {
            $('#deleteform'+id).submit();
        })
    }
</script>
@yield('script')
</html>
