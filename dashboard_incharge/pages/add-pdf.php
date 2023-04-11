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

<div class="container pb-3">
    <div class="card">
        <div class="card-header text-dark">
            <h3 class="card-title"><strong>Add File</strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action=".?folder=action/&page=save-pdf" method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-12">
                    <label for="title">Event:</label>
                    <input type="text" class="form-control" name="title" placeholder="Event" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="title">Subject:</label>
                    <input type="text" class="form-control" name="subject" placeholder="Enter subject" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="title">Conducted by:</label>
                    <input type="text" class="form-control" name="conducted" placeholder="Conducted by" required>
                </div>
                <div class="form-col">
                    <div class="form-group col-md-12">
                        <label for="description" class="form-label">Decription:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Add Description" required></textarea>
                    </div>
                    <div class="image">
                        <label for="image">PDF:</label>
                        <input type="file" name="pdf_file" id="pdf" accept=".pdf" required>
                    </div>

                    <div class="buttons">
                        <button type="submit" class="btn text-white" id="save">Upload</button>
                        <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=pdf-event'">Close</button>
                    </div>
            </form>
        </div>
        <div class="col-12 mt-4 mb-2" id="go-btn">
                <p class="text-start"><a href=".?page=pdf-event" class="text-decoration-none"> Go Back</a> </p>
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
                text: 'The File size is too large to upload!'
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
                text: 'There was an error uploading your File!'
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>




