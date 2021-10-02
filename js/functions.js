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

// Load webpage once a filter is selected
function reloadPage(page) {
  location.reload(page);
}