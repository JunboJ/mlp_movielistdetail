
window.onload=
function (){
    var anav = document.getElementById("nav");
    var X = anav;
window.onscroll = function(){
    var D = X.offsetTop;
    var S = document.body.scrollTop;
    if(S>D) {
        X.className = "fixposition";
    }else {
        X.className = "reposition";
    }
}
}

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//button clicked
function sub_bt() {
    change_color();
    var a = fill_check();
    if(a == true){
        alert("Your message has been sent!")
    }
}
//change bg color
function change_color () {
    var input = document.forms["contactform"]["field"];
        for(var i = 0; i < input.length; i++) {
            if(input[i].value == "") {
                input[i].classList.add("empty");
            }else if(input[i].value !== ""){
                input[i].classList.remove("empty");
            }
        }
}
//check all filled
function fill_check () {
    var form = document.getElementsByClassName("empty");
        if(form.length == 0) {
            return true;
        }else{
            return false;
        }
}
//onchange
function input_check(id) {
    var x = document.getElementById(id).value;
    
    if(x == ""){
        document.getElementById(id).classList.add("empty");
    }else{
        document.getElementById(id).classList.remove("empty");
    }
}
            

