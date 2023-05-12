$(document).ready(function() {
    const availableOptions = [
      "Student",
      "Employee",
      "Guest",
      "Employee and Student",
      "Employee and Guest",
      "Student and Guest",
      "Select All"
    ];
  
    $('#to').autocomplete({
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
  
    // Listen for the Enter key press event on the input field
    $('#to').on('keydown', function(event) {
      if (event.which === 13) {
        // Get the entered value
        const enteredValue = $(this).val();
  
        // Store the entered value or perform any desired action
        console.log("Entered value:", enteredValue);
      }
    });
  });
  