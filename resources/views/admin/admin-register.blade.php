
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href=" {{ asset('images/backend-images/logo.png') }}">
    <title>CogentDevs EMP</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ampleadmin/" />
    <!-- Custom CSS -->
    <link href=" {{ asset('css/backend-css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url('/images/backend-images/big/auth-bg.jpg') no-repeat center center;">
            <div class="auth-box">
                <!-- Dissmissal Alert -->
                @if(Session::has('flash_message_success'))
                    <div class="alert alert-success"> 
                        <i class="ti-user"></i> 
                        {!! session('flash_message_success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                            <span aria-hidden="true">×</span> 
                        </button>
                    </div>
                @endif
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-danger"> 
                        <i class="ti-user"></i> 
                        {!! session('flash_message_error') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                            <span aria-hidden="true">×</span> 
                        </button>
                    </div>
                @endif
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img height="100px" width="100px" src=" {{ asset('images/backend-images/logo.png') }}" alt="logo" /></span>
                        <h5 style="margin-top: 10px;" class="font-medium mb-3">Sign Up to Admin</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3" method="post" id="loginform" action="{{route('adminregister')}}">
                                {{ csrf_field() }}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input name="name" id="name" type="text" class="form-control form-control-lg" placeholder="Enter Username" required="true" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input name="email" id="email" type="email" class="form-control form-control-lg" placeholder="Enter email" required="true" aria-label="email" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input  name="password" id="password" type="password" class="form-control form-control-lg" placeholder="Enter Password" required="true" aria-label="Password" aria-describedby="basic-addon1">
                                    <div class="container">
                                     <small style="font-size: 70%;  color: red; display: none; " id="msg">  First enter this field.</small>
                                     </div>
                                </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input  name="cpassword" id="cpassword" type="password" class="form-control form-control-lg" placeholder="Confirm Password" required="true" aria-label="Password" aria-describedby="basic-addon1">
                                    <div class="container">
                                    <h5 style="font-size: 70%;">   Enter same password as above.</h5>
                                    </div>
                                </div>
                                
                                <div class="form-group text-center">
                                    <div class="col-xs-12 pb-3">
                                        <button class="btn btn-block btn-lg btn-info" id="register"type="submit" disabled="disabled">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 pb-3">
                                        <a href="{{route('login')}}"><button class="btn btn-block btn-lg btn-success" type="submit">Log In</button></a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div id="recoverform">
                    <div class="logo">
                        <span class="db"><img src="{{ asset('images/backend-images/logos/logo-icon.png') }}" alt="logo" /></span>
                        <h5 class="font-medium mb-3">Recover Password</h5>
                        <span>Enter your Email and instructions will be sent to you!</span>
                    </div>
                    <div class="row mt-3">
                        <!-- Form -->
                        <form class="col-12" action="index.html">
                            <!-- email -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control form-control-lg" type="email" required="" placeholder="Username">
                                </div>
                            </div>
                            <!-- pwd -->
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('css/backend-css/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('css/backend-css/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('css/backend-css/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });

       var p=document.getElementById('password');
    var cp=document.getElementById('cpassword');
    var msg=document.getElementById('msg');
    var add=document.getElementById('register');
    p.onblur=function(){
        msg.style.display="none";
        if(p.value =="" && cp.value==""){
            cp.style.borderColor="none";
            cp.style.borderWidth="none";
            add.disabled = true;
        }
        else if (cp.value!="") {
        if (p.value==cp.value) {
            //alert("ok");
            cp.style.borderColor="green";
            cp.style.borderWidth="3px";
            add.disabled = false;
        }
         else if (p.value!=cp.value) {
            //alert("ok");
            cp.style.borderColor="red";
            cp.style.borderWidth="3px";
            add.disabled = true;
        }
        
        else {
            //alert("ok");
            cp.style.borderColor="none";
            cp.style.borderWidth="none";
            add.disabled = true;
        }
    }
    }
    cp.onblur=function(){
       if (p.value=="") {
        msg.style.display="block";
        add.disabled = true;

       }
       else if(p.value =="" && cp.value==""){
            cp.style.borderColor="none";
            cp.style.borderWidth="none";
            add.disabled = true;

        }

       else
       {
        if (p.value==cp.value) {
            //alert("ok");
            cp.style.borderColor="green";
            cp.style.borderWidth="3px";
            add.disabled = false;
        }
        else if (p.value!=cp.value) {
            //alert("ok");
            cp.style.borderColor="red";
            cp.style.borderWidth="3px";
            add.disabled = true;
        }
        
        else {
            //alert("ok");
            cp.style.borderColor="none";
            cp.style.borderWidth="none";
            add.disabled = true;
        }

        
       }
    }    

    </script>
</body>

</html>
