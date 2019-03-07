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
               <h3 class="text-center">Name: {{$find->first_name}} {{$find->last_name}}</h3>
               
               <div class="col-md-8">
                 <table class="table">
                   <thead>
                       <tr>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Quantity</th>
                           <th>Expiration Date</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                    @foreach($medicines as $med)
                    <?php 
                    $diff_date  = 0; 
                     $date = Carbon\Carbon::parse($med->expiration);
                              $now = Carbon\Carbon::now();

                               $diff = $date->diffInDays($now);
                              $diff_date = $diff;

                    ?>
                       <tr <?php if($diff_date < 30){echo 'style="background-color: red"';} ?>>
                           <td>{{$med->name}}</td>
                           <td>{{$med->description}}</td>
                           <td>{{$med->quantity}} </td>
                           <td>{{$med->expiration}}</td>
                           <td>
                              <form action="{{route('admin_patient_medicine_check',['user_id'=> $find->id,'medicine_id'=> $med->id])}}" method="POST">
                                <div class="form-group">
                                  @csrf
                                  <input type="number" name="quantity" class="form-control" required="">
                                  <input type="submit" value="submit">
                                </div>
                              </form>
                           </td>
                       </tr>
                    @endforeach   
                   </tbody>
               </table>
               </div>

               <div class="col-md-4">
                 <table class="table">
                   <thead>
                     <tr>
                       <th>Name</th>
                       <th>Quantity</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                     @foreach($patmed as $pat)
                      <tr>
                        <td>{{$pat->medicine->name}}</td>
                        <td>{{$pat->quantity}}</td>
                        <td>
                          <a href="{{route('admin_patient_medicine_remove',$pat->id)}}" class="btn btn-danger btn-xs">Remove</a>
                        </td>
                      </tr>
                     @endforeach
                   </tbody>
                 </table>
                 @if($patmed->count() > 0)
                  <p class="text-center">
                   <a href="{{route('admin_patient_medicine_approved',$find->id)}}" class="btn btn-primary">Confimed</a>
                 </p>
                 @endif
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
