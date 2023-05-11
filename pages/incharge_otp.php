<!DOCTYPE html>
<html lang="en">

<?php
session_start();

?>

<head>
  <script type="text/javascript">
    function preventBack() {
      window.history.forward()
    };
    setTimeout("preventBack()", 0);
    window.onunload - function() {
      null;
    }
  </script>

</head>

<body>
  <div class="container-fluid">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
        </div>
      </div>
      <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center shadow" id="main-container" style="min-height: 450px;">
        <div class="container-title w-100">
          <h4 class="card-title w-100 p-3 text-center text-white rounded-0" id="top-color">Registration</h4>
        </div>

        <div class="incharge-form">
          <div class="profile-image">
            <img src="assets/img/evsu.png" alt="evsu logo">
          </div>
          <div class="header-form">
            <h4 class="card-title pb-2 text-center">Attendance Management System</h4>
          </div>
          <div class="header-information">
                  <h4> otp Verification</h4>
                </div>
          <form class="row g-3 needs-validation" method="post" action=".?folder=action/&page=incharge_verify_otp" novalidate>
          <input type="hidden" name="email" class="input form-control rounded-0" >
            <div class="col-12">
              <label for="text" class="form-label">One-Time Password</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-user-lock"></i></span>
                </div>
                <input name="otp" type="text" class="input form-control" id="otp" placeholder="Enter your OTP" aria-label="otp" aria-describedby="basic-addon1" required />
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn text-white w-100" id="btn" type="submit" name="submit">Verify</button>
            </div>
            <div class="col-md-12">
              <p class="text-center"><i>We gave you a one-time password through email.<br><br><b style="color: red;">NOTE:</b> Before contacting us, please check your junk/spam folder, since email delivery issues caused by automated bots are fairly prevalent.</i> </p>
            </div>

            <div class="col-12 mb-2">
              <p class="text-start"><a href=".?page=incharge_register" class="text-decoration-none">Go Back</a> </p>
            </div>
          </form>
        </div>
      </div>
  </div>
  </div>
  </div>
  </section>
  </div>

  <script src="js/form-validation.js"></script>

  <?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'successful') {
    ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'OTP code has been sent to your email!'
        })
      </script>
    <?php
      unset($_SESSION['validate']);
    }
  ?>

  <?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'unsuccessful') {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Invalid OTP ',
        text:'Please check your OTP code'
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>
</body>

</html>