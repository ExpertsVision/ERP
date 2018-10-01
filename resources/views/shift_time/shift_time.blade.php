<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Consumers</title>
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
                            <ol class="breadcrumb breadcrumb-col-orange">
                                <li><a href="javascript:void(0);"><i class="material-icons">event_note</i> Shift</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">wb_sunny</i> Day</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">access_time</i> Time</a></li>
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
                            <form action="register_employee" method="post" >
                                @csrf
<ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="">
                                <a href="#home_animation_2" data-toggle="tab" aria-expanded="false">Morning</a>
                            </li>
                            <li role="presentation" class="active">
                                <a href="#profile_animation_2" data-toggle="tab" aria-expanded="true">Evening</a>
                            </li>
                            <li role="presentation"><a href="#messages_animation_2" data-toggle="tab">Night</a>
                            </li>
                            @if(Auth::user()->role =='HR Manager') 
                            <li role="presentation"><a href="#settings_animation_2" data-toggle="tab">Customize</a>
                            </li>
                            @endif
                        </ul>
                                <!--  -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated fadeInRight" id="home_animation_2">
                                        <b>DAY</b>
                                        <p>
                                        <div class="demo-checkbox">
                                            <input type="checkbox" id="md_checkbox_34" class="filled-in chk-col-orange" checked="" >
                                            <label for="md_checkbox_34">Monday</label>
                                            <input type="checkbox" id="md_checkbox_35" class="filled-in chk-col-orange" checked="" >
                                            <label for="md_checkbox_35">Tuesday</label>
                                            <input type="checkbox" id="md_checkbox_36" class="filled-in chk-col-orange" checked="" >
                                            <label for="md_checkbox_36">Wednesday</label>
                                            <input type="checkbox" id="md_checkbox_37" class="filled-in chk-col-orange" checked="" >
                                            <label for="md_checkbox_37">Thursday</label>
                                            <input type="checkbox" id="md_checkbox_38" class="filled-in chk-col-orange" checked="" >
                                            <label for="md_checkbox_38">Friday</label>
                                            <input type="checkbox" id="md_checkbox_39" class="filled-in chk-col-orange" checked="" >
                                            <label for="md_checkbox_39">Saturday</label>
                                            
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <b>Check in</b>
                                                    <input type="text" class="timepicker form-control" value="09:00" data-dtp="dtp_mEMI5" disabled="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <b>Check out</b>
                                                    <input type="text" class="timepicker form-control" value="06:30" data-dtp="dtp_mEMI5" disabled="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <b>Break on</b>
                                                    <input type="text" class="timepicker form-control" value="01:00" data-dtp="dtp_mEMI5" disabled="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <b>Break off</b>
                                                    <input type="text" class="timepicker form-control" value="02:00" data-dtp="dtp_mEMI5" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                                <div role="tabpanel" class="tab-pane animated fadeInRight active" id="profile_animation_2">
                                                    <b>DAY</b>
                                                    <p>
                                                        <div class="demo-checkbox">
                                                        <input type="checkbox" id="md_checkbox_27" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_27">Monday</label>
                                                        <input type="checkbox" id="md_checkbox_28" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_28">Tuesday</label>
                                                        <input type="checkbox" id="md_checkbox_29" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_29">Wednesday</label>
                                                        <input type="checkbox" id="md_checkbox_30" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_30">Thursday</label>
                                                        <input type="checkbox" id="md_checkbox_31" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_31">Friday</label>
                                                        <input type="checkbox" id="md_checkbox_32" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_32">Saturday</label>
                                                        
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <b>Check in</b>
                                                                <input type="text" class="timepicker form-control" value="09:00" data-dtp="dtp_mEMI5" disabled="">
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <div class="form-line">
                                                                <b>Check out</b>
                                                                <input type="text" class="timepicker form-control" value="06:30" data-dtp="dtp_mEMI5" disabled="">
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <div class="form-line">
                                                                <b>Break on</b>
                                                                <input type="text" class="timepicker form-control" value="01:00" data-dtp="dtp_mEMI5" disabled="">
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <div class="form-line">
                                                                <b>Break off</b>
                                                                <input type="text" class="timepicker form-control" value="02:00" data-dtp="dtp_mEMI5" disabled="">
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </p>
                                                </div>

                                                <div role="tabpanel" class="tab-pane animated fadeInRight" id="messages_animation_2">
                                                    <b>DAY</b>
                                                    <p>
                                                        <div class="demo-checkbox">
                                                        <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_21">Monday</label>
                                                        <input type="checkbox" id="md_checkbox_22" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_22">Tuesday</label>
                                                        <input type="checkbox" id="md_checkbox_23" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_23">Wednesday</label>
                                                        <input type="checkbox" id="md_checkbox_24" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_24">Thursday</label>
                                                        <input type="checkbox" id="md_checkbox_25" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_25">Friday</label>
                                                        <input type="checkbox" id="md_checkbox_26" class="filled-in chk-col-orange" checked />
                                                        <label for="md_checkbox_26">Saturday</label>
                                                        
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <b>Check in</b>
                                                                <input type="text" class="timepicker form-control" value="09:00" data-dtp="dtp_mEMI5" disabled="">
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <div class="form-line">
                                                                <b>Check out</b>
                                                                <input type="text" class="timepicker form-control" value="06:30" data-dtp="dtp_mEMI5" disabled="">
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <div class="form-line">
                                                                <b>Break on</b>
                                                                <input type="text" class="timepicker form-control" value="01:00" data-dtp="dtp_mEMI5" disabled="">
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <div class="form-line">
                                                                <b>Break off</b>
                                                                <input type="text" class="timepicker form-control" value="02:00" data-dtp="dtp_mEMI5" disabled="">
                                                            </div>
                                                        </div>
                                                        </div>
                                                </div>

                                            <div role="tabpanel" class="tab-pane animated fadeInRight" id="settings_animation_2">
                                                <b>DAY</b>
                                                <p>                               
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" id="md_checkbox_34" class="chk-col-orange" checked />
                                                    <label for="md_checkbox_34">Monday</label>
                                                    <input type="checkbox" id="md_checkbox_35" class="chk-col-orange" checked />
                                                    <label for="md_checkbox_35">Tuesday</label>
                                                    <input type="checkbox" id="md_checkbox_36" class="chk-col-orange" checked />
                                                    <label for="md_checkbox_36">Wednesday</label>
                                                    <input type="checkbox" id="md_checkbox_37" class="chk-col-orange" checked />
                                                    <label for="md_checkbox_37">Thursday</label>
                                                    <input type="checkbox" id="md_checkbox_38" class="chk-col-orange" checked />
                                                    <label for="md_checkbox_38">Friday</label></label>
                                                    <input type="checkbox" id="md_checkbox_39" class="chk-col-orange" checked />
                                                    <label for="md_checkbox_39">Saturday</label>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <b>Check in</b>
                                                        <input type="text" class="timepicker form-control" value="09:00" data-dtp="dtp_mEMI5">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <b>Check out</b>
                                                        <input type="text" class="timepicker form-control" value="06:30" data-dtp="dtp_mEMI5">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <b>Break on</b>
                                                        <input type="text" class="timepicker form-control" value="01:00" data-dtp="dtp_mEMI5">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <b>Break off</b>
                                                        <input type="text" class="timepicker form-control" value="02:00" data-dtp="dtp_mEMI5">
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                                    
                            </form>
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
</body>

</html>