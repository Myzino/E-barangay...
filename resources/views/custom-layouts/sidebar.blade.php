<!--**********************************
    Sidebar start
***********************************-->
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>

            <li><a href="{{ route('dashboard') }}" aria-expanded="false"><i class="icon icon-single-04"></i><span
                class="nav-text">Dashboard</span></a></li>
                
            <li class="nav-label">CRUDS</li>

            <li><a href="{{ route('student') }}" aria-expanded="false"><i class="icon icon-single-04"></i><span
                class="nav-text">Students</span></a></li>

            <li><a href="{{ route('grade') }}" aria-expanded="false"><i class="icon icon-single-04"></i><span
                class="nav-text">Grades</span></a></li>
                
            <li><a href="{{ route('teacher') }}" aria-expanded="false"><i class="icon icon-single-04"></i><span
                class="nav-text">Teachers</span></a></li>
            
            
            <li class="nav-label">Transactions</li>

            <li><a href="#" aria-expanded="false"><i class="ti-view-list-alt"></i><span
                class="nav-text">Indigency Certificate</span></a></li>
                
            <li><a href="#" aria-expanded="false"><i class="ti-file"></i><span
                class="nav-text">Barangay Residence</span></a></li>
            
            <li><a href="#" aria-expanded="false"><i class="ti-files"></i><span
                class="nav-text">Barangay Clearance</span></a></li>


            <li><a href="{{ route('logout') }}" aria-expanded="false"><i class="icon-logout"></i><span
                class="nav-text">Logout</span></a></li>

        </ul>
    </div>


</div>
<!--**********************************
    Sidebar end
***********************************-->
