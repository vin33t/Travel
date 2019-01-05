
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <title>
     Log
  </title>
  <link href="{{asset('/css/reset.min.css?v=2.1.1')}}" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="{{asset("/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href='{{asset("/plugins/roboto/roboto.css")}}' rel='stylesheet'>
  <link href='{{asset("/css/bs-overides.min.css")}}' rel='stylesheet'>
  
  <style>
      body {
        font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
        background-color: #fff;
        font-size: 13px;
        color: #6a6c6f;
        background: #444a52;
        margin: 0;
        padding: 0;
      }

      h1 {
        font-weight: 400;
        font-size: 24px;
        margin-bottom: 35px;
        text-transform: uppercase;
        text-align: center;
      }

      .btn-primary {
        color: #ffffff;
        background-color: #28b8da;
        border-color: #22a7c6;
      }

      .btn-primary:focus,
      .btn-primary.focus {
        color: #ffffff;
        background-color: #1e95b1;
        border-color: #0f4b5a;
      }

      .btn-primary:hover {
        color: #ffffff;
        background-color: #1e95b1;
        border-color: #197b92;
      }

      .btn-primary:active,
      .btn-primary.active,
      .open>.dropdown-toggle.btn-primary {
        color: #ffffff;
        background-color: #1e95b1;
        border-color: #197b92;
      }

      .btn-primary:active:hover,
      .btn-primary.active:hover,
      .open>.dropdown-toggle.btn-primary:hover,
      .btn-primary:active:focus,
      .btn-primary.active:focus,
      .open>.dropdown-toggle.btn-primary:focus,
      .btn-primary:active.focus,
      .btn-primary.active.focus,
      .open>.dropdown-toggle.btn-primary.focus {
        color: #ffffff;
        background-color: #197b92;
        border-color: #0f4b5a;
      }

      .btn-primary:active,
      .btn-primary.active,
      .open>.dropdown-toggle.btn-primary {
        background-image: none;
      }

      .btn-primary.disabled,
      .btn-primary[disabled],
      fieldset[disabled] .btn-primary,
      .btn-primary.disabled:hover,
      .btn-primary[disabled]:hover,
      fieldset[disabled] .btn-primary:hover,
      .btn-primary.disabled:focus,
      .btn-primary[disabled]:focus,
      fieldset[disabled] .btn-primary:focus,
      .btn-primary.disabled.focus,
      .btn-primary[disabled].focus,
      fieldset[disabled] .btn-primary.focus,
      .btn-primary.disabled:active,
      .btn-primary[disabled]:active,
      fieldset[disabled] .btn-primary:active,
      .btn-primary.disabled.active,
      .btn-primary[disabled].active,
      fieldset[disabled] .btn-primary.active {
        background-color: #28b8da;
        border-color: #22a7c6;
      }

      .btn-primary .badge {
        color: #28b8da;
        background-color: #ffffff;
      }

      input[type="text"],
      input[type="password"],
      input[type="datetime"],
      input[type="datetime-local"],
      input[type="date"],
      input[type="month"],
      input[type="time"],
      input[type="week"],
      input[type="number"],
      input[type="email"],
      input[type="url"],
      input[type="search"],
      input[type="tel"],
      input[type="color"],
      .uneditable-input,
      input[type="color"] {
        border: 1px solid #bfcbd9;
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #494949;
        font-size: 14px;
        line-height: 1;
        height: 36px;
      }

      input[type="text"]:focus,
      input[type="password"]:focus,
      input[type="datetime"]:focus,
      input[type="datetime-local"]:focus,
      input[type="date"]:focus,
      input[type="month"]:focus,
      input[type="time"]:focus,
      input[type="week"]:focus,
      input[type="number"]:focus,
      input[type="email"]:focus,
      input[type="url"]:focus,
      input[type="search"]:focus,
      input[type="tel"]:focus,
      input[type="color"]:focus,
      .uneditable-input:focus,
      input[type="color"]:focus {
        border-color: #03a9f4;
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: 0 none;
      }

      input.form-control {
        -webkit-box-shadow: none;
        box-shadow: none;
      }

      .company-logo {
        padding: 25px 10px;
        display: block;
      }

      .company-logo img {
        margin: 0 auto;
        display: block;
      }

      .authentication-form-wrapper {
        margin-top: 70px;
      }

      @media (max-width:768px) {
        .authentication-form-wrapper {
          margin-top: 15px;
        }
      }

      .authentication-form {
        border-radius: 2px;
        border: 1px solid #e4e5e7;
        padding: 20px;
        background: #fff;
      }

      label {
        font-weight: 400 !important;
      }

      @media screen and (max-height: 575px) {
        #rc-imageselect,
        .g-recaptcha {
          transform: scale(0.83);
          -webkit-transform: scale(0.83);
          transform-origin: 0 0;
          -webkit-transform-origin: 0 0;
        }
      }
</style>

</head>
<body class="login_admin">
 <div class="container">
  <div class="row">
   <div class="col-md-4 col-md-offset-4 authentication-form-wrapper">
    <div class="company-logo">
          </div>
    <div class="mtop40 authentication-form">
    <div class="row">
      {{-- <div class="col-md-6"> --}}
      <h1>Not Found</h1>
      
      {{-- </div> --}}
      {{-- <div class="col-md-6">
        <h1>Logout</h1>
      <form action="{{route('log.logout')}}" method="post" accept-charset="utf-8">
        @csrf                                                                                                         
        <div class="form-group">
            <input type="text" class="form-control" name="unique">
         </div>
       
       <div class="form-group">
            <button type="submit" class="btn btn-info btn-block">Submit</button>
        </div>
      </form> 
      </div>   --}}
    </div>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>





