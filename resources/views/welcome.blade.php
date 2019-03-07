<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Clinic Management System </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    
    <link href="{{URL::to('/css/bootstrap.min.css')}}" rel="stylesheet" />
    

    <link href="{{URL::to('/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />   
    <style type="text/css">
        .well{
            margin-top: 3%;
            background-color: transparent;
            border-radius: 30px;

        }
        .input-group-addon{
            background-color: #f9ca24;

        }
        .form-group{
            margin-bottom: 5%;
        }
        .form-control{
          border-radius: 10px;
        }
        form{
            opacity: 1 !important;
        }
        body{
              background-color: #2c3e50;


            }
    </style>
    </head>
    <body>
        <p class="text-center" style="margin-top: 10%">
          <a href="{{url('/')}}">
            <img src="{{URL::to('img/logo.png')}}" width="100px">
          </a>
          
        </p>
        <div class="col-md-4 col-md-offset-4 well">
          @include('shared.notification')
            <h3 style="color: #fff;">Sign In</h3>
            <form action="{{route('login_check')}}" method="POST">
              <div class="form-group">
                <input id="email" type="text" class="form-control" name="email" placeholder="Email" required="">
              </div>

              <div class="form-group">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="">
              </div>
              
              <div>
                @csrf
                  <p class="text-right">
                      <input type="submit" value="Submit" class="btn btn-primary">
                  </p>
              </div>
            </form>
        </div>
    </body>
</html>
