@include('sidebar')

@include('header')


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Profile - Update</title>

    <link rel="icon" type="image/x-icon" href="{{asset('img/favi.png')}}">

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                                @if(Session::has('message'))
                                <span  class="d-none d-sm-inline-block">
                                    <p class="alert alertinfo text-white" style="background-color:#308930">{{ Session::get('message') }}</script></p></span>@endif

</div>  

            </div>
            <!-- End of Main Content-->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
//checkbox click css-update profile page
function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true) {
        text.style.display = "block";
        document.getElementById("text");
        $("#password1").attr("required", true);
        $("#password2").attr("required", true);
    } else {
        text.style.display = "none";
        document.getElementById("text");
        $("#password1").attr("required", false);
        $("#password2").attr("required", false);
    }
}

//success popup
$(document).ready(function () {
    $(".alertinfo").fadeOut(10000);
});


</script>




            <section id="profile_update">
            <h3 class="h5 mb-0 text-gray-800 ml-4">Update Profile</h3>
<hr/>

            <form class="form_design mt-3" action="{{ route('update-profile.update', auth()->user()->id) }}" method="post" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <br/>
  <div class="form-group">
 

    <div class='row'>
    <label for="exampleInputEmail1" class='col-2 text-dark font-weight-bold'>Name<span class="text-danger">*</span></label>
    <input type="text" class="form-control col-8" name="name"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{auth()->user()->name}}">
  </div>
</div>
  <div class="form-group">
  <div class='row'>
    <label for="exampleInputPassword1" class='col-2 text-dark font-weight-bold'>Email<span class="text-danger">*</span></label>
    <input type="email" name="email" class="form-control col-8" id="exampleInputPassword1" value="{{auth()->user()->email}}">
  </div>
</div>
  <div>
<input type="checkbox" name="myCheck" id="myCheck" onclick="myFunction()">
<label for="myCheck"> &nbsp;Change Password</label><br/><br/>


    <div id="text" style="display:none">
<div class='row'>
<label for="exampleInputPassword1" class='col-2 text-dark font-weight-bold' >Password</label>
    <input type="text" name="password" class="form-control col-8" id="password1"  >

</div><br/>
<div class='row'>
    <label for="exampleInputPassword1" class='col-2 text-dark font-weight-bold' >Confirm Password</label>
    <input type="text" name="confirmpassword"  class="form-control col-8" id="password2" >
 <br/><br/>
</div>
</div>

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
            </section>





    
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


   
   <!-- Bootstrap core JavaScript-->
   <script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('public/js/sb-admin-2.min.js')}}"></script>




</body>

</html>