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
              
              <div class="guest-form">
                <div class="profile-image">
                    <img src="src/assets/img/evsu.png" alt="">
                </div>
                <div class="header-form">
                <h4 class="card-title pb-2 text-center">Attendance Management System </h4>
                </div>
                <div class="header-information">
                  <h4>guest Registration</h4>
                </div>
              <form class="row g-3 needs-validation" method="post" action=".?folder=action/&page=guest_registration" novalidate>
             
                <div class="col-md-6">
                  <div class="input-group mb-2">
                    <input type="text" class="input form-control rounded-0" name="firstname" placeholder="first name" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-2">
                    <input type="text" class="input form-control rounded-0" name="middlename" placeholder="middle name" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-2">
                    <input type="text" class="input form-control rounded-0" name="lastname" placeholder="last name" required />
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="input-group mb-2">
                    <input type="text" class="input form-control rounded-0" name="username" placeholder="user name" required />
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="input-group mb-2">
                    <input type="email" class="input form-control rounded-0" name="email" placeholder="email" required />
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-se text-white w-100" id="btn" type="submit" name="submit">Continue</button>
                </div>
             
                <div class="col-12 mt-5">
                <p class="text-start"><a href=".?page=guest_login" class="text-decoration-none">Go Back</a> </p>
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
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'existed') {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Data Existed ',
        text: 'User is already existed, Please check your information!'
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>
</body>

</html>