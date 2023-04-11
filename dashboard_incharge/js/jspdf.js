
function downloadPDF() {
  var doc = new window.jspdf.jsPDF('portrait', 'pt', 'a4');
  var table = document.getElementById("example1");

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
    addTable(doc, table);
    doc.save('attendance.pdf');
  };
}

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
    var dateFontSize = 11;
    var dateWidth = doc.getStringUnitWidth(formattedDate) * dateFontSize / doc.internal.scaleFactor;
    var leftMargin = 40; // set the left margin to 40 units
    var bottomMargin = 20; // set the bottom margin to 20 units
    var dateX = leftMargin;
    var dateY = thirdTitleY + 25;
    doc.setFontSize(dateFontSize);
    doc.setTextColor(0, 0, 0); // set title color to black
    doc.text(formattedDate, dateX, dateY);
    doc.setFont('Helvetica');
    doc.setFontSize(10);
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
    startY: 200,
    head: [['Lastname', 'Firstname', 'Type', 'Date']],
    headStyles: {
      fillColor: [183, 28, 28], // set table header background color to maroon
      textColor: [255, 255, 255] // set table header font color to white
    },
    body: tableData
  });
}

