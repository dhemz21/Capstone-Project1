<div class="container" id="qr-code">
  <?php
        $userID = $_SESSION['UserID'];
    $query = "SELECT * FROM registered_users WHERE UserID = '$userID' ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($result)) {
      $qrID = $row['qrID'];
      $qrImagePath = "../qrcodes-images/{$qrID}.png";
      $downloadLink = "../qrcodes-images/{$qrID}.png";

      echo '<div class="card w-100 rounded-0 shadow-sm">';
      echo '<div class="card-header text-dark">My Qr Code</div>';
      echo '<div class="card-body">';
      echo "<img class='card-img-top' src='{$qrImagePath}' alt='Card image cap'>";
      echo '<div class="card-text">';
      echo "<p><b>QR ID:</b> {$qrID}</p>";
      echo "<p><b>Name:</b> {$row['Firstname']} {$row['Lastname']}</p>";
      echo "<p><b>Email:</b> {$row['email']}</p>";
      echo "<a href='{$downloadLink}' download>Download QR Code</a>";
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
  ?>
</div>
</div>