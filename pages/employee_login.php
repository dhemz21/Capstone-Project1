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
                <h4 class="card-title w-100 p-3 text-center text-white rounded-0" id="top-color">Employee portal</h4>
              </div>
              
              <div class="employee-form">
                <div class="profile-image">
                    <img src="src/assets/img/evsu.png" alt="">
                </div>
                <div class="header-form">
                <h4 class="card-title pb-2 text-center">Attendance Management System </h4>
                </div>
              <form class="row g-3 needs-validation" method="post" action=".?folder=action/&page=employee_check" novalidate>
                <div class="col-12">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-user"></i></span>
                    </div>
                    <input name="IDnumber" type="text" value="" class="input form-control rounded-0" id="IDnumber" placeholder="Employee ID" required />
                  </div>
                </div>

                <div class="col-12">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-lock"></i></span>
                    </div>
                    <input name="password" type="password" value="" class="input form-control rounded-0" id="password" placeholder="Password" required />
                    <div class="input-group-append">
                      <span class="input-group-text rounded-0" onclick="password_show_hide();">
                        <i class="fa fa-eye" id="show_eye"></i>
                        <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn w-100 text-white" id="btn" type="submit" name="submit">Login</button>
                </div>
                <div class="col-12 mt-3 mb-0">
                <p class="text-center"><a href=".?page=employee_register" class="text-decoration-none">Register</a> </p>
                </div>
                <div class="col-12 mt-0">
                <p class="text-center"><a href=".?page=employee_forgot_pass" class="text-decoration-none">Forgot Password?</a> </p>
                </div>
                <div class="col-12 mb-2">
                <p class="text-start"><a href=".?page=form" class="text-decoration-none">Go Back</a> </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </div>

  <script src="src/js/form-validation.js"></script>


  <?php
  if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
  ?>
    <script>
      Swal.fire(

        {
          title: '<strong>Registration Success!</strong>',
          icon: 'success',
          html: 'Click the link to download your <b>QR COde</b>, ' +
            '<a href="qrcodes-images/<?php echo $_SESSION['status']; ?>.png" download> Download </a>' +
            'or you can also download it on your dashboard',
          imageUrl: 'qrcodes-images/<?php echo $_SESSION['status']; ?>.png',
          imageHeight: 200,
          imageAlt: '<?php echo $_SESSION['status']; ?>'
        }

      )
    </script>
  <?php
    unset($_SESSION['status']);
    unset($_SESSION['userID']);
  }
  ?>

  <?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'unsuccessful') {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Invalid input ',
        text: 'Please check your Information!',
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>


<?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'no-access') {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'No Access ',
        text: 'You dont have Access to this Department!',
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>

<?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'not-employee') {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Employee Only ',
        text: 'You dont have access to this page!',
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>


<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'successful') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: ' Your password successully updated!'
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>


  <script>
    function password_show_hide() {
      var x = document.getElementById("password");
      var show_eye = document.getElementById("show_eye");
      var hide_eye = document.getElementById("hide_eye");
      hide_eye.classList.remove("d-none");
      if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
      } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
      }
    }
  </script>
</body>

</html>