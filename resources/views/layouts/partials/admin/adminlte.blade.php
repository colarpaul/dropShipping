<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

@include("layouts.partials.admin.htmlheader")

    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        {{-- Header --}}
        @include('layouts.partials.admin.header')

        {{-- Sidebar --}}
        @include('layouts.partials.admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            {{--<!--
            <section class="content-header">
                <h1>
                    Page Header
                    <small>Optional description</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>
        -->--}}

        <!-- Main content -->
        <section class="content container-fluid">

            @yield("main-content")

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{-- Control Sidebar --}}
    @include("layouts.partials.admin.controlsidebar")

    {{-- Footer --}}
    @include("layouts.partials.admin.footer")

        <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        {{--<script src="{{ asset("/bower_components/jquery/dist/jquery.min.js") }}"></script>--}}
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset("/bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>

        <script type='text/javascript' src='{{ asset("/froala/js/froala_editor.min.js") }}'></script>
        <script>
            $(document).ready(function () {
                $('#description').froalaEditor({
                  heightMin: 500,
                  heightMax: 500
              })
            });
        </script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. -->
     </body>
     </html>
