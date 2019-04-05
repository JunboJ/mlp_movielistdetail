    window.onload = 
        function () {
            document.getElementById("defaultTab").click();
        }
    
    
    // MODAL 
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

    //check the radio buttons when click picture
    function radio_button (eid) {
        var e = document.getElementsByTagName("img");

        for(var n = 0; n < e.length; n++) {
            if(e[n].id == eid){
                e[n].previousSibling.previousSibling.checked = true;
            }else{
            }
        }
    }


    function openTab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }


    //when click submit button
    function submit_button_clicked(){
        var a = card_check();
        fill_check();
        var d = input_sub_Check();
        var c = box_check();
        if (a !== false) {
            if(d !== false) {
                if(c == true) {
                    show_message();
                    document.getElementById("confirm_message").style.display = "inline";
                }else{
                    document.getElementById("confirm_message").style.display = "none";
                    return false;
                }
            }else{
                document.getElementById("confirm_message").style.display = "none";
                return false;
            }
        }else{
            document.getElementById("confirm_message").style.display = "none";
            return false;
        }
    }

    //to check card type radios and return card type
    function card_check() {
            if (document.getElementById("mastercard_check").checked) {
                return document.getElementById("mastercard_check").value;
            }else if (document.getElementById("visa_check").checked) {
                return document.getElementById("visa_check").value;
            }else if (document.getElementById("paypal_check").checked) {
                return document.getElementById("paypal_check").value;
            }else{
                alert("Please choose a payment method.")
                return false;
            }
    }

    //to check if all forms have been filled
    function input_sub_Check (){
        var input = document.getElementsByClassName("empty");
        if(input.length == 0) {
            return true;
        }else{
            alert("unfilled form.")
            return false;
        }
    }

    //to change class name when click submit button
    function fill_check () {
        var input = document.forms["pay"]["input"];
            for(var i = 0; i < input.length; i++) {
                if(input[i].value == "") {
                    input[i].classList.add("empty");
                }else if(input[i].value !== ""){
                    input[i].classList.remove("empty");
                }
            }
    }

    //to change bg color on change
    function input_check(id) {
        var x = document.getElementById(id).value;
        
        if(x == ""){
            document.getElementById(id).classList.add("empty");
        }else{
            document.getElementById(id).classList.remove("empty");
        }
    }

    //to check terms and conditions check box
    function box_check () {
        var box = document.getElementById("check");
        if (box.checked) {
            return true;
        }else{
            alert("Read terms and conditions to proceed.");
            return false;
        }
    }

    //generate the confirm message
    function show_message() {
        var cardType = card_check();
        var num = document.getElementById("cardno").value;
        var lnum = num.substr(num.length-4);
        document.getElementById("user_name").innerHTML = document.getElementById("nameoncard").value;
        document.getElementById("cardT").innerHTML = cardType;
        document.getElementById("card_num").innerHTML = lnum;
        document.getElementById("email").innerHTML = document.getElementById("formemail").value;
        document.getElementById("address").innerHTML = document.getElementById("staddress").value + "," 
        + document.getElementById("formcity").value + "," + document.getElementById("formcountry").value + ","
        + document.getElementById("formpostcode").value;
    }
     

    
//set footer to bottom
$(function () {
    function fixedfooter () {
        $("footer").removeClass("fix_bottom");
            var th = document.body.scrollHeight,
                wh = window.innerHeight;
        if (!(th > wh)) {
            $("footer").addClass("fix_bottom");
        }else{
            $("footer").removeClass("fix_bottom");
        }
    };
    fixedfooter();
    $(window).resize(fixedfooter);
});