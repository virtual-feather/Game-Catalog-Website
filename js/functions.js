/*
// Select Projects function
function ddlselect() {
  // Get elements and hide them
  var None = document.getElementById("None");
  var Python = document.getElementById("Python");
  var Java = document.getElementById("Java");

  Python.style.display = "none";
  Java.style.display = "none";


  // Not sure why, but it seems the variables
  // need to be in a list to work properly
  var choices = [Python, Java];

  // Collect user selection
  var d = document.getElementById("ddselect");
  var choice = d.options[d.selectedIndex].text;

  // Check if the selection is empty
  if(choice == "--Select Language--"){
    None.style.display = "flex";
  }
  else{
    None.style.display = "none";
  }
  
  // Search document for IDs with the choice and display
  var result = document.getElementById(choice);
  result.style.display = "flex";
}//end ddlselect
*/

// Determine whether to unhide the genre ddl
function genreToggle() {
  // Get secondary list elements and hide
  var genreList = document.getElementById("Genre");

  var choices = [genreList];

  // Get user selection from main drop down list
  var d = document.getElementById("filter");
  var choice = d.options[d.selectedIndex].text; //out: Genre

  // Debugging
  console.log(genreList);

  if(choice == "Alphabetical" || choice == "Release Date"){
    genreList.style.display = "none";
    console.log("Genre List Hidden")
    return null;
  }

  var result = document.getElementById(choice);
  result.style.display = "inline";
  console.log("Genre List Visible")
}