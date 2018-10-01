<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>View All Tasks</title>
      <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="theme-teal">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-deep-orange">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('layouts.header')
    <!-- #Top Bar -->
       @include('layouts.sidebar')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Examples -->
          <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-bg-orange">
                                <li><a href="javascript:void(0);">Task</a></li>
<!--                                 <li><a href="javascript:void(0);">Library</a></li>
                                <li><a href="javascript:void(0);">Data</a></li>
                                <li><a href="javascript:void(0);">File</a></li> -->
                                <li class="active">View all</li>
                            </ol>
                        </div>
                        <div class="body">
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissable">
                                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <p> {{$error}}</p>    
                                    </div>   
                                @endforeach
                            @endif
                            @if (Session::has('error'))
                                    <div class="alert alert-danger alert-dismissable">{{ Session::get('error') }} <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
                            @endif
                            @if (Session::has('flash_message'))
                                    <div class="alert alert-success alert-dismissable">{{ Session::get('flash_message') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
                            @endif
                            @if(Auth::user()->role =='HR Manager')
                        <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- <div class="header">
                            <h2>
                                EXPORTABLE TABLE
                            </h2>
                        </div> -->
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Task ID</th>
                                            <th>Emp. ID</th>
                                            <th>Project ID</th>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Est. Time</th></th>
                                             @if(Auth::user()->role =='HR Manager')
                                            <th>Points</th>
                                            <th>Report</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <!--  <form action="{{url('action_requestsupdate')}}" method="post" id="accept_reject_application">
                                        @csrf -->
                                        @if(isset($view_all_tasks))
                                        @foreach ($view_all_tasks as $request)
                                        <tr>
                                            <td>{{$request->assign_task_id}}</td>
                                            <td>{{$request->employee_id}}</td>
                                            <td>{{$request->project_id}}</td>
                                            <td>{{$request->subject}}</td>
                                            <td>{{$request->description}}</td>
                                            <td>{{$request->estimated_time}}</td>
                                            <!-- <td>{{$request->points}}</td> -->
                                            @if(Auth::user()->role =='HR Manager')
                                            <form action="{{url('points_given')}}/{{$request->assign_task_id}}" method="post">
                                            @csrf
                                            <td style="width: 20px;">
                                                <div class="form-group form-float">
                                    <div class="form-line error">
                                        <input type="text" class="form-control" name="points_txtbox" maxlength="3" minlength="1" required="" aria-required="true" aria-invalid="true">
                                        <!-- <label class="form-label">Min/Max Length</label> -->
                                    </div>
                                </div>
                                            </td>
                                            @if($request->report!='')
                                            <td>
                                                <i class="material-icons">check</i>
                                            </td>
                                            @else
                                             <td><i class="material-icons">cancel</i></td>
                                            @endif
                                                <td>
                                                    <a href="{{url('submit_points')}}"><button type="submit" class="btn btn-warning waves-effect">Done</button></a> 
                                                </td>
                                        </form>
                                            @endif
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
            @endif
            @if(Auth::user()->role =='Employee')
                        <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- <div class="header">
                            <h2>
                                EXPORTABLE TABLE
                            </h2>
                        </div> -->
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Task ID</th>
                                            <th>Emp. ID</th>
                                            <th>Project ID</th>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Est. Time</th></th>
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <!--  <form action="{{url('action_requestsupdate')}}" method="post" id="accept_reject_application">
                                        @csrf -->
                                        @if(isset($view_all_tasks_Employee))
                                        @foreach ($view_all_tasks_Employee as $request)
                                        <tr>
                                            <td class='assign_id_pass_to_popup'>{{$request->assign_task_id}}</td>
                                            <td>{{$request->employee_id}}</td>
                                            <td>{{$request->project_id}}</td>
                                            <td>{{$request->subject}}</td>
                                            <td>{{$request->description}}</td>
                                            <td>{{$request->estimated_time}}</td>
                                            <!-- <td>{{$request->points}}</td> -->
                                            @if($request->points=='')
                                            <td>
                                                <button type="submit" id="report" class="btn btn-warning waves-effect show-modal">Report</button>
                                            </td>
                                            @else
                                            <td>{{$request->points}}</td>
                                            @endif                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
            @endif
            <div id="testmodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       
                        <div class="body">
                            <form id="form_validation" method="POST" action="report_sent">
                                @csrf
                                <div class="form-group form-float">
                                    <small><center class="font-italic col-cyan"> to make changes in previously submitted report please submit it again. it will overwrite previous one.</center></small>
                                    <br>
                                    <br>
                                    <div class="form-group form-float">
                            <div class="form-line">
                                <label>Task No.</label>
                                 <input type="number" name="task_number" id="task_number" class="form-control" readonly=""/>
                                
                            </div>
                        </div>
                                    <div class="form-line">
                                        <textarea name="description" cols="30" rows="5" class="form-control no-resize" onkeyup="countChar(this)" required></textarea>
                                        <label class="form-label">Description</label>
                                    </div>
                                    <div id="charNum" style="font-family: times new roman; color: darkorange; font-size: 1em; text-align: right;"></div>
                                </div>
                               
                                <button class="btn bg-orange waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
                        </div>
                    </div>
                </div>
            </div>           
        </div>
    </section>

   <!-- Jquery Core Js -->
   <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

        <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
  var show_btn=$('.show-modal');
  var show_btn=$('.show-modal');
  //$("#testmodal").modal('show');
  
    show_btn.click(function(){
      $("#testmodal").modal('show');
  })
});

$(function() {
        $('#element').on('click', function( e ) {
            Custombox.open({
                target: '#testmodal-1',
                effect: 'fadein'
            });
            e.preventDefault();
        });
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
    $(document).on("click","#report",function(){
        var id = $(this).parent().siblings('.assign_id_pass_to_popup').text();
        // document.getElementById('task_number').innerHTML = id;
        var task_number = document.getElementById('task_number');
        task_number.value=id;
        // alert(id);
       
    });
});
    </script>
    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 501) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charNum').text(0 + len +'/500');
        }
      };
    </script>
</body>

</html>