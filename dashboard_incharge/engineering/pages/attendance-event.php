<!DOCTYPE html>
<html lang="en">
  
<?php

include("../assets/library/attendance/call_function.php");
require_once('action/generate.php');
require_once("../../database/db_conn.php");



  // Retrieve the event_id from the URL parameter
  $event_id = $_GET['userID'];

  // Fetch the event details from the database
  $eventQuery = "SELECT * FROM incharge_add_event WHERE userID = '$event_id'";
  $eventResult = mysqli_query($conn, $eventQuery);
  $event = mysqli_fetch_assoc($eventResult);
                
?>

<body>

  <!-- Main content -->
  <section class="content">
    <div class="row mb-2 mt-2">
      <div class="col-12">
        <button class="btn text-white" id="generate"><i class="fas fa-download"></i> Download PDF</button>
        <button class="btn btn-danger" onclick="confirmDelete()"><i class="fas fa-trash-alt"></i> Delete Record</button>

      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-light">
            <h3 class="card-title">Event:<strong> <?php echo $event['eventType']; ?></strong></h3>
           <br style="margin: 1px;">
           <hr style="margin: 5px;">
           <h3 class="card-title">Subject:<strong> <?php echo $event['eventSubject']; ?></strong></h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-responsive-xl table-bordered table-hover">
              <thead>
                <?php call_fields() ?>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $sql = mysqli_query($conn, "SELECT * FROM online_attendance2 WHERE Event_ID='$event_id'");
                while ($getData = mysqli_fetch_array($sql)) {
                  $i++;
                ?>
                   <td><?php echo $i; ?></td>
                  <td><?php echo $getData['firstname']; ?></td>
                  <td><?php echo $getData['middlename']; ?></td>
                  <td><?php echo $getData['lastname']; ?></td>
                  <td><?php echo $getData['time_in']; ?></td>
                  <td><?php echo $getData['login_type']; ?></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="col-12 mt-2 mb-2">
            <p class="text-start"><a href=".?page=event-meeting" class="text-decoration-none">Go Back</a> </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  </div>
  <!-- /.content -->
  
  <script src="js/datatable.js"></script>
  <script src="js/delete_record.js"></script>

  <!-- <script>
    setTimeout(function(){
    location.reload();
  }, 10000);
   </script> -->

<script>
// Attach click event to the Generate PDF button
document.getElementById('generate').addEventListener('click', function() {
    var table = document.getElementById("example1");
    // Create a new jsPDF instance
    var doc = new window.jspdf.jsPDF('portrait', 'pt', 'a4');
    // Add logo to the top of the document
    var logoImg = new Image();
    logoImg.src = '../assets/img/evsu.png';
    logoImg.onload = function () {
    var canvas = document.createElement('canvas');
    canvas.width = logoImg.width;
    canvas.height = logoImg.height;
    var ctx = canvas.getContext('2d');
    ctx.drawImage(logoImg, 0, 0, logoImg.width, logoImg.height);
    var logoDataUrl = canvas.toDataURL('image/png');

    // Calculate position of the logo to center it
    var logoWidth = 50; // Change this value to adjust the logo size
    var logoHeight = logoWidth * logoImg.height / logoImg.width;
    var logoX = (doc.internal.pageSize.width - logoWidth) / 2;
    var logoY = 20;

    doc.addImage(logoDataUrl, 'PNG', logoX, logoY, logoWidth, logoHeight);
    addTitle(doc);
    addMeeting(doc);
    addTable(doc, table);
    doc.save('Meeting_Attendance.pdf');
  };
});

function addTitle(doc){
    // Add title to the document
    var title = 'Republic of the Philippines';
    var titleFontSize = 12;
    var titleWidth = doc.getStringUnitWidth(title.toUpperCase()) * titleFontSize / doc.internal.scaleFactor;
    var titleX = (doc.internal.pageSize.width - titleWidth) / 2;
    var titleY = 100;
    doc.setFontSize(titleFontSize);
    doc.setTextColor(0, 0, 0); // set title color to red
    doc.text(title.toUpperCase(), titleX, titleY);00
    doc.setFont('Helvetica');

    // Add second title below the first one
    var secondTitle = 'Eastern Visayas State University Ormoc City Campus ';
    var secondTitleFontSize = 14;
    var secondTitleWidth = doc.getStringUnitWidth(secondTitle.toUpperCase()) * secondTitleFontSize / doc.internal.scaleFactor;
    var secondTitleX = (doc.internal.pageSize.width - secondTitleWidth) / 2;
    var secondTitleY = titleY + 25;
    doc.setFontSize(secondTitleFontSize);
    doc.setTextColor(0, 0, 0); // set title color to black
    doc.text(secondTitle.toUpperCase(), secondTitleX, secondTitleY);
    doc.setFont('Helvetica');

    var thirdTitle = 'Note: This is an automated system generated attendance report';
    var thirdTitleFontSize = 10;
    var thirdTitleWidth = doc.getStringUnitWidth(thirdTitle.toUpperCase()) * thirdTitleFontSize / doc.internal.scaleFactor;
    var thirdTitleX = 40; // Adjust the X position to start from the left
    var thirdTitleY = titleY + 150;
    doc.setFontSize(thirdTitleFontSize);
    doc.setTextColor(255, 0, 0); // set title color to red
    doc.text(thirdTitle.toUpperCase(), thirdTitleX, thirdTitleY);
    doc.setFont('Helvetica');


    var fourthTitle = 'Attendance Report';
    var fourthTitleFontSize = 12;
    var fourthTitleWidth = doc.getStringUnitWidth(fourthTitle.toUpperCase()) * fourthTitleFontSize / doc.internal.scaleFactor;
    var fourthTitleX = (doc.internal.pageSize.width - fourthTitleWidth) / 2;
    var fourthTitleY = titleY + 170;
    doc.setFontSize(fourthTitleFontSize);
    doc.setTextColor(0,0,0)
    doc.text(fourthTitle.toUpperCase(), fourthTitleX, fourthTitleY);
    doc.setFont('Helvetica');
}

    function addMeeting(doc){
    // Fetch data from your MySQL table
    var title = 'Title: ' + '<?php echo strtoupper($row["eventType"]); ?>'; // Replace with your column name
    var subject = 'Subject: ' + '<?php echo strtoupper($row["eventSubject"]); ?>'; // Replace with your column name
    var venue = 'Venue: ' + '<?php echo strtoupper($row["venue"]); ?>'; // Replace with your column name
    var date = 'Date: ' + '<?php echo strtoupper($row["date"]); ?>'; // Replace with your column name

    var leftMargin = 40;
    var topMargin = 160;
    var titleFontSize = 12;
    doc.setFont('Helvetica');
    doc.setFontSize(12);

    // Add the title, subject, and venue to the PDF
    doc.text(title, leftMargin, topMargin);
    doc.text(subject, leftMargin, topMargin + 20);
    doc.text(venue, leftMargin, topMargin + 40);
    doc.text(date, leftMargin, topMargin + 60);


  }

function addTable(doc, table) {
  // Add table to the document
  var rows = table.getElementsByTagName("tr");
  var tableData = [];
  for (var i = 0; i < rows.length; i++) {
    var columns = rows[i].getElementsByTagName("td");
    if (columns.length === 0) {
      continue; // Skip empty rows
    }
    var rowData = [];
    for (var j = 0; j < columns.length; j++) {
      rowData.push(columns[j].innerText);
    }
    tableData.push(rowData);
  }
  
  doc.autoTable({
    startY: 280,
    head: [['#', 'Firstname', 'Middlename', 'Lastname', 'Time In', 'Type']],
    headStyles: {
    fillColor: [183, 28, 28], // set table header background color to maroon
    textColor: [255, 255, 255] // set table header font color to white
    },
    body: tableData,
    didDrawPage: function (data) {
  var totalRows = tableData.length;
  var text = 'Total: ' + totalRows + ' Attendees';
  var x = data.settings.margin.left;
  var y = doc.internal.pageSize.getHeight() - 10;

  doc.text(text, x, y);

  // Calculate the width of the text
  var textWidth = doc.getStringUnitWidth(text) * doc.internal.getFontSize() / doc.internal.scaleFactor;

  // Create a label for the URL
  var label = 'Source url: ';
  doc.setFontSize(10);
  var labelWidth = doc.getStringUnitWidth(label) * doc.internal.getFontSize() / doc.internal.scaleFactor;

  // Get the event_id from the URL
  var urlParams = new URLSearchParams(window.location.search);
  var event_id = urlParams.get('userID');

  // Create the link URL with the event_id
  var linkUrl = 'http://localhost/Evsu_Attendance/?page=engineering&userID=' + event_id;

  doc.setTextColor(0, 0, 0); // Set text color to black
  doc.text(label, x + textWidth + 80, y);
  doc.setFontSize(10); // Set font size for the URL
  doc.setTextColor(0, 0, 255); // Set text color to blue
  doc.textWithLink(linkUrl, x + textWidth + 80 + labelWidth, y, { url: linkUrl });
}

  });
}
  </script>
</body>

</html>