$(document).ready(function() {
    const availableOptions = [
        "IT OFFICE",
        "UNITS OFFICE",
        "IT LAB",
        "IT ROOM1",
        "IT ROOM2",
        "IT ROOM3",
        "IT ROOM4",
        "IT ROOM5",
        "Evsu",
        "EVSU-OC",
        "COVERED COURT",
        "FUNCTION HALL"

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
  