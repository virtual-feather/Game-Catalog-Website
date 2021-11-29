/*  showUsers(): Display username hints based on what
                 the user enters
    @param userInput: What the user enters
*/
function showUsers(userInput) {
  var xhttp;

  if(userInput == "") {
    document.getElementById("userHint").innerHTML = "";
    return;
  }

  xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("userHint").innerHTML = this.responseText;
    }
  };

  xhttp.open("POST", "php/getUserHint.php?q="+userInput, true);
  xhttp.send();
}

/* changePage(): Changes the page to display
   @param $pageNumber: Page to jump to
   @param $totalPages: Total number of pages in the set
*/
function changePage(pageNumber, totalPages) {
  // Circulate through all the pages
  for(i = 1; i <= totalPages; i++) {

    // Check if we are on the page that needs to get displayed
    if(i == pageNumber) {
      // Change the display to flex
      document.getElementById("page"+pageNumber).style.display = "flex";
      console.log("Showing Page"+pageNumber);
    }

    // Change all other to hidden
    else {
      // Change the display to be hidden
      document.getElementById("page"+i).style.display = "none";
      console.log("Hiding Page"+i);
    }
  }
}

function changeInput() {
  userSearch = document.getElementById("userSearch");
  userSearch.value = "";
}

/* Dynamic Web Page Stuff 
https://stackoverflow.com/questions/16956446/dynamically-loading-content-with-ajax
*/
/*
import "http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js";
var loadedobjects = "";
var rootdomain = "http://" + window.location.hostname;

function ajaxpage(url, containerid){
  var page_request = false
  if (window.XMLHttpRequest) // if Mozilla, Safari etc
    page_request = new XMLHttpRequest()
  else if (window.ActiveXObject){ // if IE
    try {
    page_request = new ActiveXObject("Msxml2.XMLHTTP")
    } 
    catch (e){
      try{
        page_request = new ActiveXObject("Microsoft.XMLHTTP")
      }
      catch (e){}
      }
    }
    else
      return false
    page_request.onreadystatechange=function(){
      loadpage(page_request, containerid)
    }
    page_request.open('GET', url, true)
    page_request.send(null)
  }
  
  function loadpage(page_request, containerid){
    if (page_request.readyState == 4 && 
       (page_request.status==200 ||       window.location.href.indexOf("http")==-1))
    document.getElementById(containerid).innerHTML=page_request.responseText
  }
  
  function loadobjs(){
    if (!document.getElementById)
      return
    for (i=0; i<arguments.length; i++){
      var file=arguments[i]
      var fileref=""
      if (loadedobjects.indexOf(file)==-1)
      { //Check to see if this object has not already been     added to page before proceeding
        if (file.indexOf(".js")!=-1){ //If object is a js file
          fileref=document.createElement('script')
          fileref.setAttribute("type","text/javascript");
          fileref.setAttribute("src", file);
        }
        else if (file.indexOf(".css")!=-1){ //If object is a css file
          fileref=document.createElement("link")
          fileref.setAttribute("rel", "stylesheet");
          fileref.setAttribute("type", "text/css");
          fileref.setAttribute("href", file);
        }
      }
      if (fileref!=""){
        document.getElementsByTagName("head").item(0).appendChild(fileref)
        loadedobjects+=file+" " //Remember this object as being already added to page
      }
    }
  }
  */