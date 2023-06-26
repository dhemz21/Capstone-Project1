let button2 = document.getElementById("depart-btn");
let isVisible2 = true;

function toggleButton2() {
  isVisible2 = !isVisible2;
  if (isVisible2) {
    button2.style.display = "block";
  } else {
    button2.style.display = "none";
  }
}

// Add an event listener to the button to hide it when it is clicked
document.getElementById("depart-btn").addEventListener("click", function() {
  toggleButton2();
  localStorage.setItem("button1Visibility", isVisible1 ? "visible" : "hidden");
});

// Check for the visibility state in local storage when the page loads
if (localStorage.getItem("button1Visibility") === "hidden") {
  button2.style.display = "none";
  isVisible2 = false;
}

// Add an event listener to the window to show the button when the page is shown
window.addEventListener("pageshow", function(event) {
  if (localStorage.getItem("button2Visibility") === "visible") {
    button2.style.display = "block";
    isVisible2 = true;
  }
});

// Add an event listener to the window to remove the visibility state from local storage when the page is unloaded
window.addEventListener("beforeunload", function() {
  localStorage.removeItem("button2Visibility");
});
