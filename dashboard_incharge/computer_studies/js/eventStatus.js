$(document).ready(function() {
  $('.active-btn').each(function() {
    var userID = $(this).attr('id').split('-')[2];
    var scanqrBtn = $('#scanqr-link-' + userID);
    var statusSpan = $('#status-' + userID);
    var storedStatus = localStorage.getItem('status-' + userID); // Retrieve the status from local storage
    var storedDisabled = localStorage.getItem('disabled-' + userID); // Retrieve the disabled state from local storage

    if (storedStatus === 'Active') {
      scanqrBtn.prop('disabled', false).removeClass('btn-secondary').addClass('btn-primary');
      $(this).text('Active');
      statusSpan.text('Active');
    } else {
      scanqrBtn.prop('disabled', true).removeClass('btn-primary').addClass('btn-secondary');
      $(this).text('Reactive');
      statusSpan.text('Not Active');
    }

    if (storedDisabled === 'true') {
      scanqrBtn.prop('disabled', true);
    } else {
      scanqrBtn.prop('disabled', false);
    }
  });

  $('.active-btn').click(function() {
    var userID = $(this).attr('id').split('-')[2];
    var scanqrBtn = $('#scanqr-link-' + userID);
    var statusSpan = $('#status-' + userID);

    if (scanqrBtn.prop('disabled')) {
      scanqrBtn.prop('disabled', false).removeClass('btn-secondary').addClass('btn-primary');
      $(this).text('Active');
      statusSpan.text('Active');
      updateStatus(userID, 'Active');
      localStorage.setItem('status-' + userID, 'Active'); // Store the updated status in local storage
      localStorage.setItem('disabled-' + userID, 'false'); // Store the disabled state in local storage
    } else {
      scanqrBtn.prop('disabled', true).removeClass('btn-primary').addClass('btn-secondary');
      $(this).text('Reactive');
      statusSpan.text('Not Active');
      updateStatus(userID, 'Not Active');
      localStorage.setItem('status-' + userID, 'Not Active'); // Store the updated status in local storage
      localStorage.setItem('disabled-' + userID, 'true'); // Store the disabled state in local storage
    }
  });

  $('.scanqr-btn').click(function(e) {
    if ($(this).prop('disabled')) {
      e.preventDefault();
    }
  });

  function updateStatus(userID, newStatus) {
    // Make an AJAX request to update the status in the database
    $.ajax({
      url: '.?folder=action/&page=update-status', // Replace with the actual URL to update_status.php
      method: 'POST',
      data: {
        userID: userID,
        status: newStatus
      },
      success: function(response) {
        console.log('Status updated successfully');
      },
      error: function(xhr, status, error) {
        console.error('Error updating status:', error);
      }
    });
  }
});
