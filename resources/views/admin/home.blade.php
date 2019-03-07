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
                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">New Medicine</button>
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
                              
                               <a href="{{route('admin_quantity',$med->id)}}" class="btn btn-danger btn-xs">Quantity</a>
                              
                               <a href="{{route('admin_edit',$med->id)}}" class="btn btn-warning btn-xs">Edit</a>
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
        <h4 class="modal-title">Medicine Informations</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('admin_medicine_create')}}" method="POST">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required=""></textarea>
          </div>
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

</body>


    <script src="{{URL::to('/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>
  <script>
    $(document).ready(function(){
      $(".approve").click(function(){
        var id = $(this).val();

        $("#yes").click(function(){
         
          $("#form"+id).submit();
        });
        $("#yes2").click(function(){
          
          $("#form2"+id).submit();
        });

      });
    });
  </script>

</html>
