<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>{{$title}}</title>

    <!--<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />-->

    <link href="{{ url('public/admin/assets/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/admin/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ url('public/admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/admin/assets/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <!-- morris chart -->
    <link href="{{ url('public/admin/assets/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!--data table-->
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{ url('public/admin/assets/plugins/material/material.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/admin/assets/css/material_style.css') }}">
    <!-- animation -->
    <link href="{{ url('public/admin/assets/css/pages/animate_page.css') }}" rel="stylesheet">
    <!-- Template Styles -->
    <link href="{{ url('public/admin/assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/admin/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/admin/assets/css/theme-color.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/admin/assets/css/toastr.min.css') }}" rel="stylesheet">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ url('public/admin/assets/img/favicon.ico') }}" /> 
    <style>.error{color:red}</style>
    <script>
        var baseurl = "{{ asset('/') }}";
    </script>
    @if (!empty($plugincss)) 
    @foreach ($plugincss as $value) 
    @if(!empty($value))
    <link rel="stylesheet" href="{{ url('public/admin/assets/plugins/'.$value) }}">
    @endif
    @endforeach
    @endif
    @if (!empty($css)) 
    @foreach ($css as $value) 
    @if(!empty($value))
    <link rel="stylesheet" href="{{ url('public/admin/assets/'.$value) }}">
    @endif
    @endforeach
    @endif

</head>