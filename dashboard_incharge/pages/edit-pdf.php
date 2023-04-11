<style>
  .buttons{
    margin-left: 15px;
  }
  .image{
        margin-left: 15px;
        margin-bottom: 10px;
    }
    #go-btn{
        margin-left: 15px;
    }
</style>
<div class="container pb-3">
<?php
        if (isset($_GET['success']) >= 1) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            File information Successully Updated!
                            <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                                <span aria-hidden='true'>&times</span>
                            </button>
                    </div>";
        } elseif (isset($_GET['error']) >= 1) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Error Updating your File Information
                            <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                                <span aria-hidden='true'>&times</span>
                            </button>
                    </div>";
        } else {
        }
        ?>
    <div class="card">
        <div class="card-header text-dark shadow-sm">
            <h3 class="card-title"><strong>Update File Information</strong></h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <form action=".?folder=action/&page=update-pdf" method="POST">
                <?php

                require_once("../database/db_conn.php");
                $userid = $_GET['userid'];
                $query = mysqli_query($conn, "SELECT * FROM incharge_history where userid = '$userid'");
                while ($getData = mysqli_fetch_array($query)) {
                ?>


                    <div class="form-group col-md-12">
                        <input type="hidden" name="userid" value="<?php echo $getData['userid']; ?>">
                        <label for="title">Event</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $getData['title']; ?>" required>
                    </div>

                    <div class="form-group col-md-12">
                    <label for="title">Subject:</label>
                    <input type="text" class="form-control" name="subject" value="<?php echo $getData['subject']; ?>"required>
                </div>
                <div class="form-group col-md-12">
                    <label for="title">Conducted by:</label>
                    <input type="text" class="form-control" name="conducted" value="<?php echo $getData['conducted']; ?>"required>
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
                <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=pdf-event'">Close</button>
                </div>
            </form>
        </div>
        <div class="col-12 mt-2 mb-2" id="go-btn">
                <p class="text-start"><a href=".?page=pdf-event" class="text-decoration-none"> Go Back</a> </p>
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
                title: 'File Updated',
                text: 'You successfully update your File! '
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




