<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Attendance</title>
    <script type="text/javascript" src="js/table_script.js"></script>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    
    <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style type="text/css">
    /*    HTML  CSS  JS Result
EDIT ON
*/
/*custom font*/
@import url(https://fonts.googleapis.com/css?family=Merriweather+Sans);

* {margin: 0; padding: 0;}

html, body {min-height: 100%;}

body {
    text-align: center;
    padding-top: 100px;
    /*background: #333333;*/
    /*background: linear-gradient(#333333, #111111);*/
    font-family: 'Merriweather Sans', arial, verdana;
}

.breadcrumb {
    /*centering*/
    display: inline-block;
    /*box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.35);*/
    overflow: hidden;
    border-radius: 5px;
    /*Lets add the numbers for each link using CSS counters. flag is the name of the counter. to be defined using counter-reset in the parent element of the links*/
    counter-reset: flag; 
}

.breadcrumb a {
    text-decoration: none;
    outline: none;
    display: block;
    float: left;
    font-size: 12px;
    line-height: 36px;
    color: white;
    /*need more margin on the left of links to accomodate the numbers*/
    padding: 0 10px 0 60px;
    background: #333;
    background: linear-gradient(#333, #111);
    position: relative;
}
/*since the first link does not have a triangle before it we can reduce the left padding to make it look consistent with other links*/
.breadcrumb a:first-child {
    padding-left: 46px;
    border-radius: 5px 0 0 5px; /*to match with the parent's radius*/
}
.breadcrumb a:first-child:before {
    left: 14px;
}
.breadcrumb a:last-child {
    border-radius: 0 5px 5px 0; /*this was to prevent glitches on hover*/
    padding-right: 20px;
}

/*hover/active styles*/
.breadcrumb a.active, .breadcrumb a:hover{
    background: #111;
    background: linear-gradient(#333, #111);
}
.breadcrumb a.active:after, .breadcrumb a:hover:after {
    background: #222;
    background: linear-gradient(145deg, #333, #222);
}

/*adding the arrows for the breadcrumbs using rotated pseudo elements*/
.breadcrumb a:after {
    content: '';
    position: absolute;
    top: 0; 
    right: -18px; /*half of square's length*/
    /*same dimension as the line-height of .breadcrumb a */
    width: 36px; 
    height: 36px;
    /*as you see the rotated square takes a larger height. which makes it tough to position it properly. So we are going to scale it down so that the diagonals become equal to the line-height of the link. We scale it to 70.7% because if square's: 
    length = 1; diagonal = (1^2 + 1^2)^0.5 = 1.414 (pythagoras theorem)
    if diagonal required = 1; length = 1/1.414 = 0.707*/
    transform: scale(0.707) rotate(45deg);
    /*we need to prevent the arrows from getting buried under the next link*/
    z-index: 1;
    /*background same as links but the gradient will be rotated to compensate with the transform applied*/
    background: #555;
    background: linear-gradient(135deg, #777, #333);
    /*stylish arrow design using box shadow*/
    box-shadow: 
        2px -2px 0 2px rgba(0, 0, 0, 0.1), 
        3px -3px 0 2px rgba(255, 255, 255, 0.1);
    /*
        5px - for rounded arrows and 
        50px - to prevent hover glitches on the border created using shadows*/
    border-radius: 0 5px 0 50px;
}
/*we dont need an arrow after the last link*/
.breadcrumb a:last-child:after {
    content: none;
}
/*we will use the :before element to show numbers*/
.breadcrumb a:before {
    content: counter(flag);
    counter-increment: flag;
    /*some styles now*/
    border-radius: 100%;
    width: 20px;
    height: 20px;
    line-height: 20px;
    margin: 8px 0;
    position: absolute;
    top: 0;
    left: 30px;
    background: #333;
    background: linear-gradient(#333, #300);
    font-weight: bold;
}


.flat a, .flat a:after {
    background: darkorange;
    color:#eee;
    transition: all 0.7s;
}
.flat a:before {
    background: #111;
    box-shadow: 0 0 0 1px #00c;
}
.flat a:hover, .flat a.active, 
.flat a:hover:after, .flat a.active:after{
    background: orange;
}
    </style>
    <script type="text/javascript">
var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

function GetClock(){
var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

var clocktext=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
document.getElementById('clockbox').innerHTML=clocktext;
}

GetClock();
setInterval(GetClock,1000);
</script>
    <style type="text/css">
                            body {
    /*background: transparent;*/
}

.GetClock {
    position: absolute;
    top: 20%;
    left: 5%;
    /*transform: translateX(-10%) translateY(0%);*/
    color: darkorange;
    font-size: 20px;
    font-family: Orbitron;
    letter-spacing: 1px;
    width: 400px;
}
                        </style>
     <script type="text/javascript">
            var clock;
            
            $(document).ready(function() {
                clock = $('.clock').FlipClock({
                    clockFace: 'TwelveHourClock'
                });
            });
        </script>
        <script>
$(function() {
  var now = new Date(),
      days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
      day = days[now.getDay()],

      $button = $('#myButton');

  if (day === days[0] || day === days[6]) {
    document.getElementById("no_attendance").hidden = true;
    alert('We are not accepting attendance during weekends.')
          return;
      // $button.addClass('disabled');
  }
  else
  {
    document.getElementById("no_attendance").hidden = false;
  }

  $button.click(function() {
      if ($(this).hasClass('disabled')) {
        document.getElementById('myButton').disabled = true;
          alert('We are not accepting attendance during weekends.')
          return;
      }
  });
})
</script>
        <script type="text/javascript" defer="defer">
 
var enableDisable = function(){
    var UTC_hours = new Date().getUTCHours() +5;
    if (UTC_hours > 8.5 && UTC_hours > 18.5){
        document.getElementById('checktime').disabled = true;
        // document.getElementById('checktime').hidden = true;
    }
    else
    {
        document.getElementById('checktime').disabled = false;
    }
};
setInterval(enableDisable, 1000*60);
enableDisable();
//
</script> 
    <script type="text/javascript">
        var clock = new Vue({
    el: '#clock',
    data: {
        time: '',
        date: ''
    }
});

var week = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
var timerID = setInterval(updateTime, 1000);
updateTime();
function updateTime() {
    var cd = new Date();
    clock.time = zeroPadding(cd.getHours(), 2) + ':' + zeroPadding(cd.getMinutes(), 2) + ':' + zeroPadding(cd.getSeconds(), 2);
    clock.date = zeroPadding(cd.getFullYear(), 4) + '-' + zeroPadding(cd.getMonth()+1, 2) + '-' + zeroPadding(cd.getDate(), 2) + ' ' + week[cd.getDay()];
};

function zeroPadding(num, digit) {
    var zero = '';
    for(var i = 0; i < digit; i++) {
        zero += '0';
    }
    return (zero + num).slice(-digit);
}
    </script>
<script type="text/javascript">
var timestamp = '<?=time();?>';
function updateTime(){
  $('#time').html(Date(timestamp));
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
</script>
    <style type="text/css">
       html,body {
    height: 100%;
}
body {
    /*background: #0f3854;
    background: radial-gradient(ellipse at center,  #0a2e38  0%, #000000 70%);
    background-size: 100%;*/
}
p {
    margin: 0;
    padding: 0;
}
#clock {
    font-family: 'Share Tech Mono', monospace;
    color: #ffffff;
    text-align: center;
    position: absolute;
    left: 50%;
    top: -10%;
    transform: translate(-50%, -50%);
    color: #daf6ff;
    text-shadow: 0 0 20px rgba(10, 175, 230, 1),  0 0 20px rgba(10, 175, 230, 0);
    .time {
        letter-spacing: 0.05em;
        font-size: 80px;
        padding: 5px 0;
    }
    .date {
        letter-spacing: 0.1em;
        font-size: 24px;
    }
    .text {
        letter-spacing: 0.1em;
        font-size: 12px;
        padding: 20px 0 0;
    }
}
    </style>
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

    <section class="content" >
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Examples -->
          <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="border-radius: 20px;">
                        <div class="header">
                            <style type="text/css">
                                .blink_text {

    animation:1s blinker linear infinite;
    -webkit-animation:1s blinker linear infinite;
    -moz-animation:1s blinker linear infinite;

     color: blue;
    }

    @-moz-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @-webkit-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }
                            </style>
                           
                            <h4 class="blink_text" style="color: red;">
                                   @if(isset($already_check_in_message))
                                   {{$already_check_in_message}}
                                   @endif

                                   @if(isset($check_in_message))
                                   {{$check_in_message}}
                                   @endif

                                   @if(isset($check_out_message))
                                   {{$check_out_message}}
                                   @endif

                                   @if(isset($early_check_out_message))
                                   {{$early_check_out_message}}
                                   @endif

                                   @if(isset($Break_on_message))
                                   {{$Break_on_message}}
                                   @endif
                                   
                                   @if(isset($Break_off_message))
                                   {{$Break_off_message}}
                                   @endif
                            </h4>
                            <!-- <h2>Mark Attendance</h2> -->
                            <!-- <div id="clockbox" class="GetClock"></div>
                            <div class="clock" style="margin:2em;"></div>
                            <div id="MyClockDisplay" class="clock"></div> -->
                           <!--  @if(isset($time))
                        {{ $time }}
                        @endif
                        @if(isset($date))
                        {{ $date }}
                        @endif -->
                        <!-- a simple div with some links -->
<!-- another version - flat style with animated hover effect -->
<!-- <div class="breadcrumb flat">
    <a href="{{url('home')}}">Home</a>
    <a href="" class="active">Attendance</a>
    <a href="{{url('task_assign')}}">Task</a>
    <a href="{{url('office_expense')}}">Expense</a>
</div>
 -->
                    <!-- <p class="font-italic col-blue">please submit daily task report before check out.</p> -->
                        </div>
                        
                        <div class="body" style="background: linear-gradient(to top,  #FDBD6A 0%,#FEBB64 20%,#FDB353 40%,#FFAA3D 60%,#FFA026 80%,#FE9814 100%); border-radius: 20px;">
                            <div class="row clearfix" id="no_attendance">
                        <!-- <a href="#" onclick="history.go(-1)">Go Back</a> -->
                           <form action="{{url('check_in')}}" method="post" id="check_in_time">
                        @csrf
                        <!-- <a href="{{url('register_employee')}}"> -->
                            <style type="text/css">
.grow { transition: all .2s ease-in-out; }
.grow:hover { transform: scale(1.1);}
.hand:hover { cursor: pointer;
border-radius: 25px;}
                            </style>
                            
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 grow" id="myButton">
                            <div class="info-box-4 hover-zoom-effect hand" onclick="document.getElementById('check_in_time').submit();" onmouseout="this.style.background='transparent';" onmouseover="this.style.background='#F5F8FA';" style="border-radius: 20px;">
                                <div class="icon">
                                    <i class="material-icons col-blue">access_alarm</i>
                                </div>
                               
                                <div class="content">
                                    <div class="text">Check In</div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <!-- </a> -->
                    <form action="{{url('check_out')}}" method="post" id="check_out_time">
                        @csrf
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 grow">
                            <div class="info-box-4 hover-zoom-effect hand" onclick="document.getElementById('check_out_time').submit();" onmouseout="this.style.background='transparent';" onmouseover="this.style.background='#F5F8FA';" style="border-radius: 20px;">
                                <div class="icon">
                                    <i class="material-icons col-blue">access_alarm</i>
                                </div>
                                <div class="content">
                                    <div class="text">Check Out</div>
                                    <div class="number"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{url('Break_on')}}" method="post" id="break_in_time">
                        @csrf
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 grow">
                            <div class="info-box-4 hover-zoom-effect hand" onclick="document.getElementById('break_in_time').submit();" onmouseout="this.style.background='transparent';" onmouseover="this.style.background='#F5F8FA';" style="border-radius: 20px;">
                                <div class="icon">
                                    <i class="material-icons col-blue">access_alarm</i>
                                </div>
                                <div class="content">
                                    <div class="text">Break Time On</div>
                                    <div class="number"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{url('Break_off')}}" method="post" id="break_off_time">
                        @csrf
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 grow" id="break_out_time">
                            <div class="info-box-4 hover-zoom-effect hand" onclick="document.getElementById('break_off_time').submit();" onmouseout="this.style.background='transparent';" onmouseover="this.style.background='#F5F8FA';" style="border-radius: 20px;">
                                <div class="icon">
                                    <i class="material-icons col-blue">access_alarm</i>
                                </div>
                                <div class="content">
                                    <div class="text">Break Time Off</div>
                                    <div class="number"></div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 grow" id="off_time" onclick="myfunction()">
                            <div class="info-box-4 hover-zoom-effect hand" onmouseout="this.style.background='transparent';" onmouseover="this.style.background='#F5F8FA';" style="border-radius: 20px;">
                                <div class="icon">
                                    <i class="material-icons col-blue">access_alarm</i>
                                </div>
                                <div class="content">
                                    <div class="text">Early Off Time</div>
                                    <div class="number"></div>
                                </div>
                            </div>
                        </div>
                        <script>
function myfunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
        $('#off_time').hide();
        $('#check_in_time').hide();
        $('#check_out_time').hide();
        $('#break_in_time').hide();
        $('#break_out_time').hide();
    } else {
        x.style.display = 'none';
        
    }
}
</script>
                                <div class="form-group form-float"></div>
                                <div class="form-group form-float"></div>
                                <form action="{{url('early_check_out')}}" method="post" id="early_check_out_time">
                                @csrf
                                <div class="row clearfix" id="myDIV" style="display:none">
                                <div class="col-sm-12">
                                    <!-- <a href="javascript:history.go(-1)">previous...</a> -->
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Please write a reason..." name="txtearly_check_out_reason" required></textarea>
                                        </div>
                                        <div class="form-group form-float"></div>
                                         <button type="submit" class="btn bg-orange waves-effect" onclick="document.getElementById('early_check_out_time').submit();">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div id="clock" class="col-orange">
                                 <p class="date" id="date"></p>
                                 <p class="time" id="time"></p>
                            </div>
                            <!-- </form> -->
                            
                        </div>
</div>
 <div style="align-content: left; max-width: 200px"><h4 style="color: red; cursor: pointer;" class="show-modal"> How to use?</h4></div>

                    </div>

                </div>

            </div>  

        </div>
    <div id="testmodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="body">
                            <div class="form-group form-float">
                                <small><center class="font-italic col-cyan"> Rules and Policy</center></small>
                                <br>
                                <div class="form-group form-float font-12">
                                    <div class="form-line">
                                 <b>How to use?</b>
                                    </div>
                                    1: Please mark attendance everyday by clicking "check-in". by clicking again and again will not make any changes.<br>
                                    2: At the end of each day don't forget to checkout by clicking "Check out".<br>
                                    3: Please remember to submit task reports. Otherwise you can not check out.<br>
                                    4: If not 3, attendance will be counted as absent.<br>
                                    5: Break time already defined. (13:00-14:00). When you want to take break please press "Break On". Whenever came back, please press "Break Off".<br>
                                    6: If you need early leave, click "Early Leave". Write reason and submit. if you don't want to come back after early leave kindly press "Check Out" also. otherwise absent will be count.
                                    7: If you want to came back later so please "Check Out" as scheduled.
                                </div> 
                            </div>
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
</body>

</html>