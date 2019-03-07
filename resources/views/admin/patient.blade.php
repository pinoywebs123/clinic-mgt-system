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

    <link rel="stylesheet" type="text/css" href="{{URL::to('tables/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('tables/buttons.dataTables.min.css')}}">

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
               <p class="text-right">
                   <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">New Patient</button>
               </p>
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Registered Date</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $pat)
                        <tr>
                            <td>{{$pat->first_name}} {{$pat->last_name}}</td>
                            <td>{{$pat->dob}}</td>
                            <td>{{$pat->email}}</td>
                            <td>{{$pat->contact}}</td>
                            <td>{{$pat->course}}</td>
                            <td>{{$pat->year}}</td>
                            <td>{{$pat->created_at->toDayDateTimeString()}}</td>
                            <td>
                                <a href="{{route('admin_patient_medicine',$pat->id)}}" class="btn btn-danger btn-xs">Medicine</a>
                                <a href="{{route('admin_patient_edit',$pat->id)}}" class="btn btn-info btn-xs">Edit</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            </div>
        </div>


    </div>
</div>









<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Patient Informations</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('admin_patient_create')}}" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <label>First Name</label>
                    <input type="text" name="first_name" required=""  class="form-control">
                </div>
                 <div class="col-md-4">
                    <label>Last Name</label>
                    <input type="text" name="last_name" required=""  class="form-control">
                </div>
                 <div class="col-md-4">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" required=""  class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" required="" class="form-control">
                </div>
                 <div class="col-md-6">
                    <label>Contact</label>
                    <input type="text" name="contact" required="" class="form-control">
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Course</label>
                    <input type="text" name="course" required="" class="form-control">
                </div>
                 <div class="col-md-6">
                    <label>Year</label>
                    <input type="text" name="year" required="" class="form-control">
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
</body>


    <script src="{{URL::to('/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>
    <script src="{{URL::to('tables/jquery.dataTables.min.js')}}"></script>

    <script src="{{URL::to('tables/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::to('tables/buttons.flash.min.js')}}"></script>
    <script src="{{URL::to('tables/jszip.min.js')}}"></script>

    <script src="{{URL::to('tables/pdfmake.min.js')}}"></script>
    <script src="{{URL::to('tables/vfs_fonts.js')}}"></script>
    <script src="{{URL::to('tables/buttons.html5.min.js')}}"></script>
    <script src="{{URL::to('tables/buttons.print.min.js')}}"></script>
    
    <script>
        $(document).ready(function() {
    $('#table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'print'
        ]
    } );
} );
    </script>
</html>
