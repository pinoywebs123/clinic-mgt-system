<div class="sidebar" data-color="blue" data-image="{{URL::to('/img/sidebar-5.jpg')}}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
               
                <a href="#" class="simple-text">
                    <i class="pe-7s-home"></i>NORSU Clinic
                </a>
            </div>

            <ul class="nav">
                <li class="{{Request::segment(2) == 'home' ? 'active' : ''}}">
                    <a href="{{route('admin_home')}}">
                        <i class="pe-7s-home"></i>
                        <p>Medicine</p>
                    </a>
                </li>

                <li class="{{Request::segment(2) == 'patient' ? 'active' : ''}}">
                    <a href="{{route('admin_patient')}}">
                        <i class="pe-7s-users"></i>
                        <p>Patient</p>
                    </a>
                </li>

                <li class="{{Request::segment(2) == 'reports' ? 'active' : ''}}">
                    <a href="{{route('admin_reports')}}">
                        <i class="pe-7s-note2"></i>
                        <p>Reports</p>
                    </a>
                </li>

                
                
                
            </ul>
    	</div>
    </div>
