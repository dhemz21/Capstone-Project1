<!DOCTYPE html>
<html lang="en">

<body>
  <div class="container" id="container-scanner">
    <div class="card-qr shadow-sm w-75 pb-5" id="card-qr">
        <h5 class="card-header text-dark rounded-0">Saved Offline</h5>
        <div class="card-body">
            <form  method="post" action=".?folder=action/&page=sync-file" novalidate>
            <div class="btn btn-danger mt-5 mb-3" onclick="syncData()">Sync now</div>
            <?php
// Read the scanned data from the JSON file
$data = json_decode(file_get_contents('action/scanned_data.json'), true);

// Check if the $data variable is not null or empty
if ($data && is_array($data)) {
    // Get the count of saved data
    $count = count($data);

    // Display the count inside the card
    echo "<h5>Saved data: " . $count . "</h5>";
} else {
    echo "<h5>No data found!</h5>";
}
?>
                    
            </form>
        </div>
    </div>
</div>
</div>
</div>  

<script>
    setTimeout(function(){
    location.reload();
  }, 5000);
   </script>


<script>
function syncData() {
    // Call the PHP script that will synchronize the data
    fetch('action/sync-data.php')
        .then(response => response.text())
        .then(data => {
            alert(data); // Show the response from the PHP script
        });
}
</script>
</body>
</html>
</div>
</div>