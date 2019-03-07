<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>NORSU Clinic Management System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


   
    <link href="{{URL::to('/css/animate.min.css')}}" rel="stylesheet"/>

   
    <link href="{{URL::to('/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>
    <link href="{{URL::to('/css/bootstrap.min.css')}}" rel="stylesheet" />

    <link href="{{URL::to('/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

   

</head>
<body>

<div class="wrapper">
    @include('admin.side')
    <div class="main-panel">
        @include('admin.nav')


        <div class="content">
            <div class="container-fluid">
            
            @include('shared.notification')
                <div class="row">
                    <form action="{{route('admin_patient_edit_check',$find->id)}}" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <label>First Name</label>
                    <input type="text" name="first_name" required=""  class="form-control" value="{{$find->first_name}}">
                </div>
                 <div class="col-md-4">
                    <label>Last Name</label>
                    <input type="text" name="last_name" required=""  class="form-control" value="{{$find->last_name}}">
                </div>
                 <div class="col-md-4">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" required=""  class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" required="" class="form-control" value="{{$find->email}}">
                </div>
                 <div class="col-md-6">
                    <label>Contact</label>
                    <input type="text" name="contact" required="" class="form-control" value="{{$find->contact}}">
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Course</label>
                    <input type="text" name="course" required="" class="form-control" value="{{$find->course}}">
                </div>
                 <div class="col-md-6">
                    <label>Year</label>
                    <input type="text" name="year" required="" class="form-control" value="{{$find->year}}">
                </div>
                
            </div>
            <div class="form-group">
            @csrf
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">SUBMIT</button>
            </div>
        </form>
                </div>
            
            </div>
        </div>


    </div>
</div>










</body>


    <script src="{{URL::to('/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>
  

</html>
