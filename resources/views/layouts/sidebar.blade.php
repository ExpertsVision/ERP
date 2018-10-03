<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" style="background-image: url('../images/user-back.png');">
                <div class="image">
                    @if(isset($image_name))
                    <img src= "{{$image_name}}"width="90" height="90" alt="User" />
                    @endif
                </div>
                <div class="info-container">
                    <!-- <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div> -->
                    
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{url('profile')}}"><i style="color: #ff8c00;" class="material-icons">person</i><span style="color: #ff6600;">Profile</span></a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i style="color: #ff8c00;" class="material-icons">input</i><span style="color: #ff6600;">Sign Out</span></a>
                                                 </li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>

                    <li class="active">
                        <a href="{{url('home')}}">
                            <i style="color: #ff8c00;" class="material-icons">home</i>
                            <span style="color: #ff6600;">Home</span>
                        </a>
                    </li>
                <!-- @if(Auth::user()->role =='Super Manager')
                 <li class="active">
                        <a href="{{url('register_employee')}}">
                            <i style="color: #ff8c00;" class="material-icons">group_add</i>
                            <span style="color: #ff6600;">Register Employee</span>
                        </a>
                    </li>
                    @endif -->
                    @if(Auth::user()->role =='HR Manager')
                     <li class="active">
                        <a href="{{url('register_manager')}}">
                            <i style="color: #ff8c00;" class="material-icons">group_add</i>
                            <span style="color: #ff6600;">Register Manager</span>
                        </a>
                    </li>
                    @endif
                     @if(Auth::user()->role =='Super Manager' || Auth::user()->role =='HR Manager')
                    <li class="active">
                        <a href="{{url('shift_time')}}">
                            <i style="color: #ff8c00;" class="material-icons">av_timer</i>
                            <span style="color: #ff6600;">Shift Time</span>
                        </a>
                    </li>
                @endif
                @if(Auth::user()->role =='Super Manager')
                 <li class="active">
                        <a href="{{url('register_hr_manager')}}">
                            <i style="color: #ff8c00;" class="material-icons">person</i>
                            <span style="color: #ff6600;">Register HR Manager</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{url('add_departments')}}">
                            <i style="color: #ff8c00;" class="material-icons">school</i>
                            <span style="color: #ff6600;">Add Departments</span>
                        </a>
                    </li>
                @endif
                @if(Auth::user()->role =='consumer') 
                  <li class="active">
                        <a href="{{url('appliances_schedule')}}">
                            <i style="color: #ff8c00;" class="material-icons">event_note</i>
                            <span style="color: #ff6600;">Appliances Schedule</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{url('weekly_schedule')}}">
                            <i style="color: #ff8c00;" class="material-icons">event_note</i>
                            <span style="color: #ff6600;">Weekly Schedule</span>
                        </a>
                    </li>
                     <li class="active">
                        <a href="{{url('submit_complaint')}}">
                            <i style="color: #ff8c00;" class="material-icons" >assignment</i>
                            <span style="color: #ff6600;">Submit a Complaint</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->role =='Admin') 
                    <li class="active">
                        <a href="{{url('register_company')}}">
                            <i style="color: #ff8c00;" class="material-icons">people</i>
                            <span style="color: #ff6600;">Register Company</span>
                        </a>
                    </li>           
                    @endif
                    @if(Auth::user()->role =='Employee' || Auth::user()->role =='HR Manager') 
                    <li class="active">
                        <a href="{{url('attendance')}}">
                            <i style="color: #ff8c00;" class="material-icons">create</i>
                            <span style="color: #ff6600;">Attendance</span>
                        </a>
                    </li> 
                   <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled">
                            <i style="color: #ff8c00;" class="material-icons">assignment_turned_in</i>
                            <span style="color: #ff6600;">Tasks</span>
                        </a>
                        <ul class="ml-menu" style="display: block;">
                            <li>
                                <a href="{{url('task_assign')}}" class=" waves-effect waves-block" style="color: #ff8c00;">Assign New</a>
                            </li>
                            
                            <li>
                                <a href="{{url('view_all')}}" class=" waves-effect waves-block" style="color: #ff8c00;">View All</a>
                            </li>
                        </ul>
                    </li> 
                    @endif
                    @if(Auth::user()->role =='Employee') 
                    <li class="active">
                        <a href="{{url('leave_application')}}">
                            <i style="color: #ff8c00;" class="material-icons">note</i>
                            <span style="color: #ff6600;">Apply Leave</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->role =='HR Manager') 
                    <li class="active">
                        <a href="{{url('action_requests')}}">
                            <i style="color: #ff8c00;" class="material-icons">thumbs_up_down</i>
                            <span style="color: #ff6600;">Action Requests</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->role =='Admin')
                    @else
                     <li class="active">
                        <a href="{{url('office_expense')}}">
                            <i style="color: #ff8c00;" class="material-icons">attach_money</i>
                            <span style="color: #ff6600;">Office Expense</span>
                        </a>
                    </li>  
                    @endif 
                    @if(Auth::user()->role =='Accounts Manager') 
                    <li class="active">
                        <a href="{{url('deductions')}}">
                            <i style="color: #ff8c00;" class="material-icons">money_off</i>
                            <span style="color: #ff6600;">Deductions</span>
                        </a>
                    </li>           
                    @endif 
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a  href="javascript:void(0);"><span style="color: #ff8c00;">Experts Vision</span></a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
    </section>