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
               
              <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                  <li class="list-group-item">Name: {{$find->name}}</li>
                  <li class="list-group-item">Description: {{$find->description}}</li>
                  
                </ul>
                <form action="{{route('admin_quantity_check',$find->id)}}" method="POST">
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="number" name="quantity" class="form-control" required="" >
                </div>
                <div class="form-group">
                  <label>Expiration Date</label>
                  <input type="date" name="expiration" class="form-control" required="" >
                </div>
               
                @csrf
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              </div>

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
