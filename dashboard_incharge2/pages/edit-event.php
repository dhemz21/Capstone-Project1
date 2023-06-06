<style>
  .buttons{
    margin-left: 15px;
    margin-bottom: 0;
    padding-bottom: 0;
  }
  .image{
        margin-left: 15px;
        margin-bottom: 10px;
    }
    #go-btn{
        margin-left: 15px;
    }
</style>
<div class="container-fluid p-2">
<?php
        if (isset($_GET['success']) >= 1) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            Post Successully Updated!
                            <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                                <span aria-hidden='true'>&times</span>
                            </button>
                    </div>";
        } elseif (isset($_GET['error']) >= 1) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Error Updating your Post Information
                            <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                                <span aria-hidden='true'>&times</span>
                            </button>
                    </div>";
        } else {
        }
        ?>
    <div class="card">
        <div class="card-header text-dark">
            <h3 class="card-title"><strong>Update Event</strong></h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <form action=".?folder=action/&page=update-event" method="POST">
                <?php

                require_once("../database/db_conn.php");
                $userId = $_GET['userID'];
                $query = mysqli_query($conn, "SELECT * FROM incharge_add_event where userID = '$userId'");
                while ($getData = mysqli_fetch_array($query)) {
                ?>


                    <div class="form-group col-md-12">
                        <input type="hidden" name="userID" value="<?php echo $getData['userID']; ?>">
                        <label for="title">Post Tile</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $getData['title']; ?>" required>
                    </div>

                    <div class="form-group col-md-12">
                    <label for="to">To:</label>
                    <input type="text" class="form-control" name="towho" value="<?php echo $getData['towho']; ?>"  required>
                </div>
                <div class="form-group col-md-12">
                    <label for="from">From:</label>
                    <input type="text" class="form-control" name="fromwho" value="<?php echo $getData['fromwho']; ?>"  required>
                </div>
                <div class="form-group col-md-12">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" value="<?php echo $getData['subject']; ?>" required>
                </div>
                  <div class="form-group col-md-12">
                    <label for="venue">Venue</label>
                    <input type="text" class="form-control" name="venue" value="<?php echo $getData['venue']; ?>"  required>
                </div>

                    <div class="form-col">
                        <div class="form-group col-md-12">
                            <label for="text" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description" required> <?php echo $getData['description']; ?></textarea>
                        </div>
                    </div>
                <?php } ?>
                <div class="buttons">
                <button type="submit" class="btn text-white" id="save">Update</button>
                <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=registered-event'">Close</button>
                </div>
            </form>
        </div>
        <div class="col-12 mt-2 mb-2" id="go-btn">
                <p class="text-start"><a href=".?page=registered-event" class="text-decoration-none"> Go Back</a> </p>
                </div>
    </div>
    
    </div>
    </div>
</div>

<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'update') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Post Updated',
                text: 'You successfully update your Post! '
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>

<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'error') {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong! '
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>



