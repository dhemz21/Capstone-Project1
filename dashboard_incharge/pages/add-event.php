<!-- INTERNAL CSS SECTION -->
<style>
    .buttons {
        margin-left: 15px;
    }
    .image{
        margin-left: 15px;
        margin-bottom: 10px;
    }
</style>
<!-- INTERNAL CSS SECTION END -->

<div class="container-fluid p-md-2">
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h3 class="card-title"><strong>Create Event</strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action=".?folder=action/&page=save-event" method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-12">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Event Title" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="to">To:</label>
                    <input type="text" class="form-control" name="towho" placeholder="To ..." required>
                </div>
                <div class="form-group col-md-12">
                    <label for="from">From:</label>
                    <input type="text" class="form-control" name="fromwho" placeholder="From ..." required>
                </div>
                <div class="form-group col-md-12">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Enter your Subject" required>
                </div>
                  <div class="form-group col-md-12">
                    <label for="venue">Venue</label>
                    <input type="text" class="form-control" name="venue" placeholder="Enter your venue" required>
                </div>
                <div class="form-col">
                    <div class="form-group col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Add Description" required></textarea>
                    </div>

                    <div class="image">
                        <label for="image">Upload Doc File:</label>
                        <input type="file" name="file"  accept=".pdf, .docx, .xlsx">
                    </div>
                    
                    <div class="buttons">
                        <button type="submit" class="btn text-white" id="save">Post</button>
                        <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=registered-event'">Close</button>
                    </div>
            </form>
        </div>
        <div class="col-12 mt-4 mb-2">
                <p class="text-start"><a href=".?page=registered-event" class="text-decoration-none"> Go Back</a> </p>
                </div>
    </div>
    
</div>
</div>
</div>

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

<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'not-allowed2') {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'The File is not allowed to upload!'
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>




