<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="dlms_logo.webp">
  <link rel="apple-touch-icon" sizes="300x300" href="dlms_logo.webp">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    DIGITAL LIBRARY MANAGEMENT SYSTEM
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta property="og:site_name" content="DIGITAL LIBRARY MANAGEMENT SYSTEM - More Than Just Book Keeping">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="DIGITAL LIBRARY MANAGEMENT SYSTEM - More Than Just Book Keeping">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-title" content="DIGITAL LIBRARY MANAGEMENT SYSTEM - More Than Just Book Keeping">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
  <link rel="stylesheet" href="https://res.cloudinary.com/dm0hew9tr/raw/upload/v1610528725/static/trees/style_vsjhsd.css">
  <link rel="stylesheet" href="https://res.cloudinary.com/nishowkenya/raw/upload/v1620198889/css%20links/base_xlidfl.css">
  <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

  
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true && $_SESSION['loggedin'] == true) {
  header("Location:index.php");
}
?>


<style>
  .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
      }

      @media (min-width: 768px) {
      .gradient-form {
      height: 100vh !important;
      }
      }
      @media (min-width: 769px) {
      .gradient-custom-2 {
      border-top-right-radius: .3rem;
      border-bottom-right-radius: .3rem;
      }
  }
</style>


<section class="h-100 gradient-form" style="background-image: url('bg001.jpg');background-size: cover;">
  <div class="container-fluid py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="dlms_logo.webp"
                    style="width: 185px;" alt="logo">
                  <h5 class="mt-1 mb-5 pb-1">DIGITAL LIBRARY MANAGEMENT SYSTEM</h4>
                </div>

                <form action="checklogin.php" method="POST" id="landlord_login" >
                  <p class="h6" style="color:#d8363a">LIBRARIAN LOGIN</p>

                  <!-- Start of php error display code -->
                  <!------------------------------------->
                  <?php
                  if(isset($_GET['errcode'])){
                      if($_GET['errcode']==1){
                          echo '<span style="color: red;">Invalid username or password.</span>';
                      }
                      
                  }

                  ?>
                  <!-- end of php error display code -->
                  <!----------------------------------->

                  <div class="form-outline mb-2">
                    <label class="form-label" for="form2Example11">Username</label>
                    <input name="username" type="text"  id="form2Example11" class="form-control"
                      placeholder="Username" required/>
                  </div>

                  <div class="form-outline mb-2">
                    <label class="form-label" for="form2Example22">Password</label>
                    <input id="the_password" name="password" type="password" id="form2Example22"  class="form-control" required/>
                    
                  </div>

                  <div class="text-center pt-1 mb-2 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                      in</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">More Than Just Book Keeping</h4>
                <br>
                <p><i class="fa fa-check-square fa-2x px-2"></i>Easily track  the number of books in the library.</p>
                <p><i class="fa fa-check-square fa-2x px-2"></i>Manage Book borrowing.</p>
                <p><i class="fa fa-check-square fa-2x px-2"></i>Generate Realtime Library Reports.</p>
                <p><i class="fa fa-check-square fa-2x px-2"></i>Easily Track the number of books that are issued.</p>
                <p><i class="fa fa-check-square fa-2x px-2"></i>Signing in and out of vistors visiting the library.</p>

                <br>
                <br>
                <span class="fa fa-quote-left px-2"></span> <span class="font-size: 1.2 rem !important;">For every minute spent organizing, an hour is earned.</span><span class="fa fa-quote-right px-2"></span> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  
