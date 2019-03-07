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
                <div class="text-right">
                    <form action="{{route('admin_reports')}}" method="POST">
                        @csrf
                        <input type="date" name="start" required="">
                        <input type="date" name="end" required="">
                        <button type="submit">Generate</button>
                    </form>
                </div>
               <table class="table" id="table">
                   <thead>
                       <tr>
                           <th>Name</th>
                           <th>Course/Year</th>
                           
                           <th>Medicine</th>
                           <th>Quantity</th>
                           <th>Date of Transaction</th>
                       </tr>
                   </thead>
                   <tbody>
                     @foreach($medicines as $med)
                      <tr>
                        <td>{{$med->patient->first_name}} {{$med->patient->last_name}}</td>
                        <td>{{$med->patient->course}} - {{$med->patient->year}}</td>
                        <td>{{$med->medicine->name}}</td>
                        <td>{{$med->quantity}}</td>
                        <td>{{$med->created_at->toDayDateTimeString()}}</td>
                      </tr>
                     @endforeach
                   </tbody>
               </table>

            </div>
            
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
