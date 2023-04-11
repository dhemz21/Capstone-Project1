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
      <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center shadow" id="main-container"  style="min-height: 450px;">
        <div class="container-title w-100">
          <h4 class="card-title w-100 p-3 text-center bg-danger text-white rounded-0" id="top-color">sign up</h4>
        </div>

        <div class="student-form">
          <div class="profile-image">
            <img src="assets/img/evsu.png" alt="">
          </div>
          <div class="header-form">
            <h4 class="card-title pb-2 text-center">Attendance Management System </h4>
          </div>
          <div class="header-information">
            <h4>Create your Account</h4>
          </div>
          <form class="row g-3 needs-validation" method="post" action=".?folder=action/&page=student_insert" novalidate>
            <?php
            // Connect to the database
            require_once('database/db_conn.php');
            // Get the user information from the database using the ID number
            $idnumber = $_SESSION['IDnumber'];
            $query = "SELECT IDnumber, firstname, lastname, email, course, department FROM tbl_student WHERE IDnumber='$idnumber'";
            $result = mysqli_query($conn, $query);
                 // Check if the query was successful
            if (!$result) {
              die('Query failed: ' . mysqli_error($conn));
            }

            $row = mysqli_fetch_assoc($result);
            ?>

            <div class="col-md-6">
              <div class="input-group mb-2">
                <input type="text" class="input form-control rounded-0" name="IDnumber" value="<?php echo $row['IDnumber']; ?>" readonly />
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group mb-2">
                <input type="text" class="input form-control rounded-0" name="firstname" value="<?php echo $row['firstname']; ?>" readonly />
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group mb-2">
                <input type="text" class="input form-control rounded-0" name="lastname" value="<?php echo $row['lastname']; ?>" readonly />
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group mb-2">
                <input type="text" class="input form-control rounded-0" name="email" value="<?php echo $row['email']; ?>" readonly />
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group mb-2">
                <input type="text" class="input form-control rounded-0" name="course" value="<?php echo $row['course']; ?>" readonly />
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group mb-2">
                <input type="text" class="input form-control rounded-0" name="department" value="<?php echo $row['department']; ?>" readonly />
              </div>
            </div>
            <div class="col-12">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text rounded-0" id="lock"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" oninput="confirmValidation()" class="input form-control" name="password" id="password" placeholder="Password" required="true" aria-label="password" required />
                <div class="input-group-append">
                  <span class="input-group-text rounded-0" onclick="password_show_hide();">
                    <i class="fa fa-eye" id="show_eye"></i>
                    <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text rounded-0" id="lock"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" oninput="confirmValidation()" class="input form-control" name="confirm-password" id="confirm-password" placeholder="Confirm Password" required="true" aria-label="confirm-password" required />
                <div class="input-group-append">
                  <span class="input-group-text rounded-0" onclick="confirm_password_show_hide();">
                    <i class="fa fa-eye" id="show_eye_confirm"></i>
                    <i class="fa fa-eye-slash d-none" id="hide_eye_confirm"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-12 mb-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="agree" id="rememberMe" required>
                <label class="form-check-label" for="rememberMe">I agree to all Terms & Conditions</label>
              </div>
            </div>

            <div class="col-12">
              <button class="btn btn w-100 text-white" id="btn" name="submit" type="submit" disabled>Submit</button>
            </div>

            <div class="col-12 mt-3">
                <p class="text-center"><a href=".?page=student_login" class="text-decoration-none">Login</a> </p>
                </div>
          </form>
        </div>
      </div>
  </div>
  </div>
  </div>
  </section>
  </div>


  <!-- Validation -->
  <script src="js/form-validation.js"></script>

  <?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'successful') {
  ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Verified ',
        text: 'Your student Account is verified!'
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>


  <?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'existed') {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Data Existed ',
        text: 'User is already existed please check your information!'
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
        title: 'Invalid User Data ',
        text: 'IDnumber you provided is not existed!'
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

    function confirm_password_show_hide() {
      var x = document.getElementById("confirm-password");
      var show_eye = document.getElementById("show_eye_confirm");
      var hide_eye = document.getElementById("hide_eye_confirm");
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

    function confirmValidation() {
      var pass = document.getElementById("password").value;
      var con_pass = document.getElementById("confirm-password").value;
      if (con_pass != "") {
        if (pass == con_pass && con_pass != "") {
          const element = document.getElementById("confirm-password");
          element.className = "input form-control is-valid";
          document.getElementById("btn").disabled = false;
          //PASSWORD MATCHED

        } else {
          const element = document.getElementById("confirm-password");
          element.className = "input form-control is-invalid";
          document.getElementById("btn").disabled = true;
          //PASSWORD IS WRONG   
        }
      }
    }
  </script>
</body>

</html>