$(document).ready(function() {
    const availableOptions = [
      "Enrollment",
      "Student Orientation",
      "Engineering Department Orientation",
      "National Peace Consiousness Month",
      "Intramurals",
      "Ratification of Constitution and By-Laws",
      "World Teacher's Day",
      "Clean-Up Drive",
      "Team Building",
      "Yolanda Commemoration",
      "Reach-out Pprogram",
      "Engineering Year-End Party",
      "Valentines Day",
      "Earth Hour",
      "Induction & Turnover of files",
      "National Poetry Month",
      "Alcohol and Drug Awareness Month",
    ];
  
    $('#eventSubject').autocomplete({
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
    $('#eventSubject').autocomplete("widget").addClass("scrollable-menu");
    
    // Listen for the Enter key press event on the input field
    $('#eventSubject').on('keydown', function(event) {
      if (event.which === 13) {
        // Get the entered value
        const enteredValue = $(this).val();
  
        // Store the entered value or perform any desired action
        console.log("Entered value:", enteredValue);
      }
    });
  });
  