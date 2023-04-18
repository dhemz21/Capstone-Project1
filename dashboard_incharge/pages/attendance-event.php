<!DOCTYPE html>
<html lang="en">
  
<?php

include("library/attendance/call_function.php");
require_once('action/generate.php');
require_once("../database/db_conn.php");
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
            <h3 class="card-title"><strong>Online Attendance Record</strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-responsive-xl table-bordered">
              <thead>
                <?php call_fields() ?>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $sql = mysqli_query($conn, "SELECT * FROM online_attendance");
                while ($getData = mysqli_fetch_array($sql)) {
                  $i++;
                ?>

                  <td><?php echo $getData['lastname']; ?></td>
                  <td><?php echo $getData['firstname']; ?></td>
                  <td><?php echo $getData['login_type']; ?></td>
                  <td><?php echo $getData['time_in']; ?></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="col-12 mt-2 mb-2">
            <p class="text-start"><a href=".?page=home" class="text-decoration-none">Back to Homepage</a> </p>
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
  
  <!-- <script src="js/jspdf.js"></script> -->
  <script src="js/colvis.js"></script>
  <script src="js/delete_record.js"></script>

  <script>
     // Attach click event to the Generate PDF button
document.getElementById('generate').addEventListener('click', function() {
  var table = document.getElementById("example1");

    // Create a new jsPDF instance
    var doc = new window.jspdf.jsPDF('portrait', 'pt', 'a4');

      // Add logo to the top of the document
      var logoImg = new Image();
  logoImg.src = 'img/evsu.png';
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
    doc.save('attendance.pdf');
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
  doc.setTextColor(225, 0, 0); // set title color to black
  doc.text(secondTitle.toUpperCase(), secondTitleX, secondTitleY);
  doc.setFont('Helvetica');


  // Add second title below the second one
  var thirdTitle = 'Attendance Report';
  var thirdTitleFontSize = 12;
  var thirdTitleWidth = doc.getStringUnitWidth(thirdTitle.toUpperCase()) * thirdTitleFontSize / doc.internal.scaleFactor;
  var thirdTitleX = (doc.internal.pageSize.width - thirdTitleWidth) / 2;
  var thirdTitleY = titleY + 70;
  doc.setFontSize(thirdTitleFontSize);
  doc.setTextColor(0, 0, 0); // set title color to black
  doc.text(thirdTitle.toUpperCase(), thirdTitleX, thirdTitleY);
  doc.setFont('Helvetica');


    // Add date below the second title
    var date = new Date().toLocaleDateString();
    var formattedDate = "Date: " + date;
    var dateFontSize = 12;
    var dateWidth = doc.getStringUnitWidth(formattedDate) * dateFontSize / doc.internal.scaleFactor;
    var leftMargin = 40; // set the left margin to 40 units
    var bottomMargin = 20; // set the bottom margin to 20 units
    var dateX = leftMargin;
    var dateY = thirdTitleY + 90;
    doc.setFontSize(dateFontSize);
    doc.setTextColor(0, 0, 0); // set title color to black
    doc.text(formattedDate, dateX, dateY);
    doc.setFont('Helvetica');
    doc.setFontSize(10);
}

function addMeeting(doc){
  // Fetch data from your MySQL table
  var title = 'Title: ' + '<?php echo strtoupper($row["title"]); ?>'; // Replace with your column name
  var subject = 'Subject: ' + '<?php echo strtoupper($row["subject"]); ?>'; // Replace with your column name
  var venue = 'Venue: ' + '<?php echo strtoupper($row["venue"]); ?>'; // Replace with your column name

  var leftMargin = 40;
  var topMargin = 200;
  var titleFontSize = 12;
  doc.setFont('Helvetica');
  doc.setFontSize(12);

  // Add the title, subject, and venue to the PDF
  doc.text(title, leftMargin, topMargin);
  doc.text(subject, leftMargin, topMargin + 20);
  doc.text(venue, leftMargin, topMargin + 40);
}

function addTable(doc, table) {
  // Add table to the document
  var rows = table.getElementsByTagName("tr");
  var tableData = [];
  for (var i = 0; i < rows.length; i++) {
    var columns = rows[i].getElementsByTagName("td");
    var rowData = [];
    for (var j = 0; j < columns.length; j++) {
      rowData.push(columns[j].innerText);
    }
    tableData.push(rowData);
  }
  doc.autoTable({
    startY: 280,
    head: [['Lastname', 'Firstname', 'Type', 'Time In']],
    headStyles: {
      fillColor: [183, 28, 28], // set table header background color to maroon
      textColor: [255, 255, 255] // set table header font color to white
    },
    body: tableData
  });
}

  </script>
</body>

</html>