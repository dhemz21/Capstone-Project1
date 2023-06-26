$(document).ready(function() {
    const availableOptions = [
      "ENGINEERING OFFICE",
      "ENGINEERING LAB",
      "ENG ROOM1",
      "ENG ROOM2",
      "ENG ROOM3",
      "ENG ROOM4",
      "ENG ROOM5",
      "Evsu",
      "EVSU-OC",
      "COVERED COURT",

    ];
  
    $('#venue').autocomplete({
      source: availableOptions,
      select: function(event, ui) {
        // Check if the selected option is null (meaning a custom value was entered)
        if (ui.item === null) {
          // Get the entered value
          const enteredValue = $(this).val();
  
          // Store the entered value or perform any desired action
          console.log("Entered value:", enteredValue);
        } else {
          // A matching option was selected, perform any desired action
          console.log("Selected option:", ui.item.value);
        }
      }
    });
  
      // Make autocomplete options scrollable
      $('#venue').autocomplete("widget").addClass("scrollable-menu");
    
    // Listen for the Enter key press event on the input field
    $('#venue').on('keydown', function(event) {
      if (event.which === 13) {
        // Get the entered value
        const enteredValue = $(this).val();
  
        // Store the entered value or perform any desired action
        console.log("Entered value:", enteredValue);
      }
    });
  });
  