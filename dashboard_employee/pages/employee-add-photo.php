<!DOCTYPE html>
<html lang="en">

<?php
include_once('action/display-profile.php');
?>

<head>
    <style>
        .profile {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .profile img{
            width: 100px;
            height: 100px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container-fluid pb-3">
        <?php
        if (isset($_GET['success'])) {
            echo "<div class='alert alert-success alert-dismissible fade show rounded-0 shadow-none' role='alert'>
                         You Successully Added a Photo!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
        } elseif (isset($_GET['successrem']) >= 1) {
            echo "<div class='alert alert-danger alert-dismissible fade show rounded-0 shadow-none' role='alert'>
                        Employee Successfully Removed!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
        } else {
        }
        
        ?>

        <div class="card rounded-0 shadow-sm">
            <div class="card-header rounded-0">
                <h3 class="card-title text-dark"><strong>Add Your Photo</strong></h3>
            </div>
            <div class="card-body">
                <form action=".?folder=action/&page=save-employee-photo" method="POST" enctype="multipart/form-data">
                    <div class="profile-image">
                    <img src="profile/<?php echo $image; ?>" alt="Profile Picture">
                    </div>
                    
                    <div class="image mb-2">
                        <label for="image">Image:</label>
                        <input type="file" name="profile_picture" id="image" accept=".jpg, .jpeg, .png" required>
                    </div>
                    <div class="label mb-1">
                        Maximum file size: 4MB.
                    </div>
                    <button type="submit" class="btn text-white rounded-0 shadow-none" id="save">Save</button>
                    <button type="reset" class="btn btn-secondary rounded-0 shadow-none" onclick="window.location.href='.?page=edit-employee'">Close</button>

                </form>
            </div>
            <div class="col-12 mt-3 mb-2">
                <p class="text-start"><a href=".?page=edit-employee" class="text-decoration-none">Go Back</a> </p>
                </div>
        </div>
    </div>

    
<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'update') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: 'You successfully add a photo!'
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>

    
<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'large') {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'The image size is too large to upload!'
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>




<?php
if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'not-allowed') {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'The file is not allowed to upload!'
        })
    </script>
<?php
    unset($_SESSION['validate']);
}
?>
</body>

</html>
</div>
