/**
 * Created by zain on 9/18/15.
 */





var check=false;
function validation(){
    var firstName=document.getElementById("firstName").value;
    var lastName=document.getElementById("lastName").value;
    var name=/^([A-Za-z]){3,15}$/;
    var email=document.getElementById("emailid").value;
    var checkEmail=/^[\w]+([._]+[\w]+)*[@][\w]+[.]([A-Za-z]{2,3})([.]([A-Za-z]{2,3}))?$/;
    var contact=document.getElementById("contactid").value;
    var contact_reg=/^[+]?[\d]{7,25}$/;
    var pass_reg=/^().{4,15}$/;
    var password=document.getElementById("passwordid").value;
    var check_;
    //(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])

    if (firstName === "") {
        document.getElementById("fName1").innerHTML = "First Name is mandatory";
    }
    else if (firstName.indexOf(" ") !== -1) {
        document.getElementById("fName1").innerHTML = "Spaces are not allowed";
        check_=false;
    }
    else if(name.test(firstName) === false){
        document.getElementById("fName1").innerHTML = "only characters are allowed.(at least three characters long)";
        check_=false;
    }
    else {
        check_=true;
        document.getElementById("fName1").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

    }
    if(check_===true)
        if (lastName === "") {
            document.getElementById("lName1").innerHTML = "last Name is mandatory";
            var email_check=false;
        }
        else if (lastName.indexOf(" ") !== -1) {
            document.getElementById("lName1").innerHTML = "Spaces are not allowed";

        }
        else if(name.test(lastName) === false){
            document.getElementById("lName1").innerHTML = "only characters are allowed.(at least three characters long)";

        }
        else {
            document.getElementById("lName1").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

            var checkPassword=true;
        }

    /*

     if(email_check===true)
     if (email.indexOf(" ") !== -1) {
     document.getElementById("emailValid").innerHTML = "Spaces are not allowed";
     var checkPassword=false;
     }
     else if(checkEmail.test(email) === false){
     document.getElementById("emailValid").innerHTML = "Must look like abc@hotmail.com";
     checkPassword=false;
     }

     else {

     document.getElementById("emailValid").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
     checkPassword=true;
     }
     */

    if(checkPassword===true)
        if (password === "") {
            var checkContact=false;
            document.getElementById("passwordValid").innerHTML = "password is mandatory";
        }
        else if(pass_reg.test(password) === false){
            checkContact=false;
            document.getElementById("passwordValid").innerHTML = "at least 4 characters and maximum 15 characters allowed";
        }

        else {
            checkContact=true;


            document.getElementById("passwordValid").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
        }

    if(checkContact===true)
        if (contact === "") {
            document.getElementById("contactValid").innerHTML = "number is mandatory";
            checkContact=false;
        }
        else if(contact_reg.test(contact) === false){

            document.getElementById("contactValid").innerHTML = "Enter valid contact";
            checkContact=false;
        }
        else{

            if( document.getElementById("emailValid").innerHTML=="This email already exists")
                check=false;
            else
                check=true;

            checkContact=true;

            document.getElementById("contactValid").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

        }



    if(check_===true   && checkContact===true  && checkPassword===true && check===true)
    {

        document.getElementById("checkForm").innerHTML = "Click Register";
        return true;
    }
    else{
      document.getElementById("checkForm").innerHTML = "Enter valid Fields";
      //  $('#successModal').modal('show');

        var div = document.getElementById( 'validationfield' );
        div.style.backgroundColor='red';
        return false;
    }
}


function checkEmail(str) {

    var email=document.getElementById("emailid").value;
    var emailPattern =  /^[\w]+([._-]+[\w]+)*[@][\w]+[.]([A-Za-z]{2,3})([.]([A-Za-z]{2,3}))?$/;
    if (email.indexOf(" ") !== -1){
        document.getElementById("emailValid").innerHTML = "Spaces are not allowed";

    }
    else if(emailPattern.test(email) === false){
        document.getElementById("emailValid").innerHTML = "Must look like abc@xyz.com";

    }

    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("emailValid").innerHTML = xmlhttp.responseText;
            }
        }
    }
    xmlhttp.open("GET", "checkEmail.php?q=" + str , true);
    xmlhttp.send();

    if( document.getElementById("emailValid").innerHTML=="This email already exists")
        check=false;
    else
        check=true;
    validation();
}
var checkPass=false;










function passwordValidation(){
    var pass_reg=/^((?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])).{4,25}$/;

    var password=document.getElementById("password_1").value;
    var rePassword=document.getElementById("password_2").value;










    if (password === "") {

        document.getElementById("passwordValid").innerHTML = "password is mandatory";
    }
    else if(pass_reg.test(password) === false){

        document.getElementById("passwordValid").innerHTML = "at least 4 characters and maximum 15 characters allowed";
    }

    else {
        if( document.getElementById("oldPassword").innerHTML=="Valid")
            checkPass=true;
        else
            checkPass=false;
        document.getElementById("passwordValid").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
        var newCheckPass=true;
    }




    if(newCheckPass===true){
        if (rePassword != password) {
            var recheck=false;
            document.getElementById("rePasswordValid").innerHTML = "password mismatch";
        }


        else {
            if( document.getElementById("oldPassword").innerHTML=="Valid")
                checkPass=true;
            else
                checkPass=false;

            recheck=true;
            document.getElementById("rePasswordValid").innerHTML = " <span class='glyphicon glyphicon-ok'>  Matched</span>";
        }
    }

    if(checkPass===true && recheck===true && newCheckPass===true)
        return true;
    else
        return false;

}



function passwordValidationOld(str){
    var pass_reg=/^((?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])).{4,25}$/;
    var oldPassword=document.getElementById("password_old").value;

    var checkPass=false;

    if(oldPassword ==="" )
    {

        document.getElementById("oldPassword").innerHTML = "password is mandatory";
    }

    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("oldPassword").innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET", "checkPassword.php?q=" + str , true);
        xmlhttp.send();
        if( document.getElementById("oldPassword").innerHTML=="Valid")
            checkPass=true;
        else
            checkPass=false;

    }
    passwordValidation();
}









function validationUpdate(){
    var firstName=document.getElementById("firstName").value;
    var lastName=document.getElementById("lastName").value;
    var name=/^([A-Za-z]){3,15}$/;
    var contact=document.getElementById("contact").value;
    var contact_reg=/^[+]?[\d]{7,25}$/;


    if (firstName === "") {
        document.getElementById("fName").innerHTML = "First Name is mandatory";
    }
    else if (firstName.indexOf(" ") !== -1) {
        document.getElementById("fName").innerHTML = "Spaces are not allowed";
        check_=false;
    }
    else if(name.test(firstName) === false){
        document.getElementById("fName").innerHTML = "only characters are allowed.(at least three characters long)";
        check_=false;
    }
    else {
        check_=true;
        document.getElementById("fName").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

    }
    if(check_===true)
        if (lastName === "") {
            document.getElementById("lName").innerHTML = "last Name is mandatory";
            var email_check=false;
        }
        else if (lastName.indexOf(" ") !== -1) {
            document.getElementById("lName").innerHTML = "Spaces are not allowed";

        }
        else if(name.test(lastName) === false){
            document.getElementById("lName").innerHTML = "only characters are allowed.(at least three characters long)";

        }
        else {
            document.getElementById("lName").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

            var checkContact=true;
        }

    if(checkContact===true)
        if (contact === "") {
            document.getElementById("contactValid").innerHTML = "number is mandatory";
            checkContact=false;
        }
        else if(contact_reg.test(contact) === false){

            document.getElementById("contactValid").innerHTML = "Enter valid contact";
            checkContact=false;
        }
        else{
            checkContact=true;

            document.getElementById("contactValid").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

        }







    if(check_===true   && checkContact===true )
    {

        document.getElementById("checkForm").innerHTML = "Click Register";
        return true;
    }
    else{

        document.getElementById("checkForm").innerHTML = "Enter valid Fields";
        return false;
    }


}



function validation_billing_shipping(){
//alert("hello");

    //  var lastName=document.getElementById("lastName").value;
    var name=/^([A-Za-z]){2,15}$/;
//    var email=document.getElementById("emailAddress").value;
    var checkEmail=/^[\w]+([._]+[\w]+)*[@][\w]+[.]([A-Za-z]{2,3})([.]([A-Za-z]{2,3}))?$/;

    var contact_reg=/^[+]?[\d]{7,25}$/;




    var nameshipto=document.getElementById("nameship").value;
    var cityshipto=document.getElementById("City").value;
    var countryshipto=document.getElementById("Country").value;
    var addressshipto=document.getElementById("address").value;
    var emailshipto=document.getElementById("Emailship").value;
    var contactshipto=document.getElementById("contact").value;
    var checkshipmentMethodradio=document.getElementsByName("shipment-radio");
    var checkPaymentMethodradio=document.getElementsByName("payment-radio");




    /*
     if (email.indexOf(" ") !== -1) {

     document.getElementById("emailValid").innerHTML = "Spaces are not allowed";
     var check_name=false;
     }
     else if(checkEmail.test(email) === false){
     document.getElementById("emailValid").innerHTML = "Must look like abc@hotmail.com";
     check_name=false;
     }

     else {

     document.getElementById("emailValid").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
     check_name=true;
     }





     if(check_name==true)
     if (namebill === "") {
     document.getElementById("namebillcheck").innerHTML = "First Name is mandatory";
     var check_=false;
     }

     else if(name.test(namebill) === false){
     document.getElementById("namebillcheck").innerHTML = "only characters are allowed.";
     check_=false;
     }
     else {
     check_=true;
     document.getElementById("namebillcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

     }




     if(check_==true)
     if (address === "") {
     document.getElementById("addressbillcheck").innerHTML = "Address is mandatory";
     var check_city=false;
     }
     else {
     check_=true;
     document.getElementById("addressbillcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
     check_city=true;

     }


     if(check_city===true)
     if (city === "") {
     document.getElementById("citybillcheck").innerHTML = "City is mandatory";
     var check_country=false;
     }
     else if (city.indexOf(" ") !== -1) {
     document.getElementById("citybillcheck").innerHTML = "Spaces are not allowed";
     check_country=false;
     }

     else {
     check_country=true;
     document.getElementById("citybillcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

     }





     if(check_country===true)
     if (country === "") {
     document.getElementById("countrybillcheck").innerHTML = "Country is mandatory";
     var checkContact=false;
     }
     else if (city.indexOf(" ") !== -1) {
     document.getElementById("countrybillcheck").innerHTML = "Spaces are not allowed";
     checkContact=false;
     }

     else {
     checkContact=true;
     document.getElementById("countrybillcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

     }




     if(checkContact===true)
     if (contact === "") {
     document.getElementById("contactValid").innerHTML = "number is mandatory";
     checkContact=false;
     var check_name_ship=false;
     }
     else if(contact_reg.test(contact) === false){
     check_name_ship=false;
     document.getElementById("contactValid").innerHTML = "Enter valid contact";
     checkContact=false;
     }
     else{

     check_name_ship=true
     checkContact=true;

     document.getElementById("contactValid").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

     }


     */




    if (nameshipto === "") {
        document.getElementById("nameshipcheck").innerHTML = "Name is mandatory";
        var check_email=false;
        check_name_ship=false;
    }

    else if(name.test(nameshipto) === false){
        document.getElementById("nameshipcheck").innerHTML = "only characters are allowed.";
        check_email=false;
        check_name_ship=false;
    }
    else {
        check_email=true;
        document.getElementById("nameshipcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
        check_name_ship=true;

    }



    if (emailshipto === "") {
        document.getElementById("emailshipcheck").innerHTML = "Email is mandatory";
        var check_address=false;
        check_email=false;
    }

    else if( checkEmail.test(emailshipto) === false){
        document.getElementById("emailshipcheck").innerHTML = "Email must be look like abc@xyz.com.";
        check_address=false;
        check_email=false;
    }
    else {
        check_address=true;
        document.getElementById("emailshipcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
        check_email=true;

    }


    if(check_address===true)
        if (addressshipto === "") {
            document.getElementById("addressshipcheck").innerHTML = "Address is mandatory";
            var check_city_ship=false;
            check_address=false;
        }
        else {

            document.getElementById("addressshipcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
            check_city_ship=true;
            check_address=true;
        }


    if(check_city_ship===true)
        if (cityshipto === "") {
            document.getElementById("cityshipcheck").innerHTML = "City is mandatory";
            var check_country_country=false;
            check_city_ship=false;
        }
        else if (cityshipto.indexOf(" ") !== -1) {
            document.getElementById("cityshipcheck").innerHTML = "Spaces are not allowed";
            check_country_country=false;
            check_city_ship=false;
        }

        else {
            check_city_ship=true;
            check_country_country=true;
            document.getElementById("cityshipcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

        }





    if(check_country_country===true)
        if (countryshipto === "") {
            document.getElementById("countryshipcheck").innerHTML = "City is mandatory";
            var checkContactship=false;
            check_country_country=false;
        }
        else if (countryshipto.indexOf(" ") !== -1) {
            document.getElementById("countryshipcheck").innerHTML = "Spaces are not allowed";
            checkContactship=false;
            check_country_country=false;
        }

        else {
            check_country_country=true;
            checkContactship=true;
            document.getElementById("countryshipcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

        }




    if(checkContactship===true)
        if (contactshipto === "") {
            document.getElementById("contactValidship").innerHTML = "number is mandatory";
            checkContact=false;
            checkContactship=false;
            var  check_paymentMethod=false;
        }
        else if(contact_reg.test(contactshipto) === false){

            document.getElementById("contactValidship").innerHTML = "Enter valid contact";
            checkContactship=false;
            checkContactship=false;
            check_paymentMethod=false;
        }
        else{
            checkContactship=true;
            check_paymentMethod=true
            checkContactship=true;

            document.getElementById("contactValidship").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

        }




    var radio_check;

    if(check_paymentMethod==true){
        var i;
        for( i=0; i < checkPaymentMethodradio.length; i++){
            if(checkPaymentMethodradio[i].checked){
                radio_check=true;
            }
            if(radio_check===true){
                var shipmentcheck=true;
                document.getElementById("checkPayementMethods").innerHTML="Selected";

            }
            else{
                shipmentcheck=false;

                document.getElementById("checkPayementMethods").innerHTML="No PaymentMethod selected";
            }
        }
    }


    var radio_checkship;

    if(shipmentcheck==true){
        var i;
        for( i=0; i < checkshipmentMethodradio.length; i++){
            if(checkshipmentMethodradio[i].checked){
                radio_checkship=true;
            }
            if(radio_checkship===true){
                shipmentcheck=true;
                document.getElementById("checkshipmentMethods").innerHTML="Selected";

            }
            else{
                shipmentcheck=false;

                document.getElementById("checkshipmentMethods").innerHTML="No shipmentMethod selected";
            }
        }
    }




    if(check_paymentMethod===true  && shipmentcheck===true   &&  check_city_ship===true &&   check_name_ship===true && checkContactship===true && check_country_country===true && check_address===true &&  check_email===true)
    {

        document.getElementById("checkForm").innerHTML = "Click To Confirm Your Order";
        return true;
    }
    else{

        document.getElementById("checkForm").innerHTML = "Select Valid Field";
        return false;
    }
}


function validation_billing_shippingnotify(){
//alert("hello");

    //  var lastName=document.getElementById("lastName").value;
    var name=/^([A-Za-z]){2,15}$/;
//    var email=document.getElementById("emailAddress").value;
    var checkEmail=/^[\w]+([._]+[\w]+)*[@][\w]+[.]([A-Za-z]{2,3})([.]([A-Za-z]{2,3}))?$/;

    var contact_reg=/^[+]?[\d]{7,25}$/;




    var nameshipto=document.getElementById("nameship").value;
    var cityshipto=document.getElementById("City").value;
    var countryshipto=document.getElementById("Country").value;
    var addressshipto=document.getElementById("address").value;
    var emailshipto=document.getElementById("Emailship").value;
    var contactshipto=document.getElementById("contact").value;
    var checkshipmentMethodradio=document.getElementsByName("shipment-radio");
    var checkPaymentMethodradio=document.getElementsByName("payment-radio");




    /*
     if (email.indexOf(" ") !== -1) {

     document.getElementById("emailValid").innerHTML = "Spaces are not allowed";
     var check_name=false;
     }
     else if(checkEmail.test(email) === false){
     document.getElementById("emailValid").innerHTML = "Must look like abc@hotmail.com";
     check_name=false;
     }

     else {

     document.getElementById("emailValid").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
     check_name=true;
     }





     if(check_name==true)
     if (namebill === "") {
     document.getElementById("namebillcheck").innerHTML = "First Name is mandatory";
     var check_=false;
     }

     else if(name.test(namebill) === false){
     document.getElementById("namebillcheck").innerHTML = "only characters are allowed.";
     check_=false;
     }
     else {
     check_=true;
     document.getElementById("namebillcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

     }




     if(check_==true)
     if (address === "") {
     document.getElementById("addressbillcheck").innerHTML = "Address is mandatory";
     var check_city=false;
     }
     else {
     check_=true;
     document.getElementById("addressbillcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
     check_city=true;

     }


     if(check_city===true)
     if (city === "") {
     document.getElementById("citybillcheck").innerHTML = "City is mandatory";
     var check_country=false;
     }
     else if (city.indexOf(" ") !== -1) {
     document.getElementById("citybillcheck").innerHTML = "Spaces are not allowed";
     check_country=false;
     }

     else {
     check_country=true;
     document.getElementById("citybillcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

     }





     if(check_country===true)
     if (country === "") {
     document.getElementById("countrybillcheck").innerHTML = "Country is mandatory";
     var checkContact=false;
     }
     else if (city.indexOf(" ") !== -1) {
     document.getElementById("countrybillcheck").innerHTML = "Spaces are not allowed";
     checkContact=false;
     }

     else {
     checkContact=true;
     document.getElementById("countrybillcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

     }




     if(checkContact===true)
     if (contact === "") {
     document.getElementById("contactValid").innerHTML = "number is mandatory";
     checkContact=false;
     var check_name_ship=false;
     }
     else if(contact_reg.test(contact) === false){
     check_name_ship=false;
     document.getElementById("contactValid").innerHTML = "Enter valid contact";
     checkContact=false;
     }
     else{

     check_name_ship=true
     checkContact=true;

     document.getElementById("contactValid").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

     }


     */




    if (nameshipto === "") {
        document.getElementById("nameshipcheck").innerHTML = "Name is mandatory";
        var check_email=false;
        check_name_ship=false;
    }

    else if(name.test(nameshipto) === false){
        document.getElementById("nameshipcheck").innerHTML = "only characters are allowed.";
        check_email=false;
        check_name_ship=false;
    }
    else {
        check_email=true;
        document.getElementById("nameshipcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
        check_name_ship=true;

    }



    if (emailshipto === "") {
        document.getElementById("emailshipcheck").innerHTML = "Email is mandatory";
        var check_address=false;
        check_email=false;
    }

    else if( checkEmail.test(emailshipto) === false){
        document.getElementById("emailshipcheck").innerHTML = "Email must be look like abc@xyz.com.";
        check_address=false;
        check_email=false;
    }
    else {
        check_address=true;
        document.getElementById("emailshipcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
        check_email=true;

    }


    if(check_address===true)
        if (addressshipto === "") {
            document.getElementById("addressshipcheck").innerHTML = "Address is mandatory";
            var check_city_ship=false;
            check_address=false;
        }
        else {

            document.getElementById("addressshipcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";
            check_city_ship=true;
            check_address=true;
        }


    if(check_city_ship===true)
        if (cityshipto === "") {
            document.getElementById("cityshipcheck").innerHTML = "City is mandatory";
            var check_country_country=false;
            check_city_ship=false;
        }
        else if (cityshipto.indexOf(" ") !== -1) {
            document.getElementById("cityshipcheck").innerHTML = "Spaces are not allowed";
            check_country_country=false;
            check_city_ship=false;
        }

        else {
            check_city_ship=true;
            check_country_country=true;
            document.getElementById("cityshipcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

        }





    if(check_country_country===true)
        if (countryshipto === "") {
            document.getElementById("countryshipcheck").innerHTML = "City is mandatory";
            var checkContactship=false;
            check_country_country=false;
        }
        else if (countryshipto.indexOf(" ") !== -1) {
            document.getElementById("countryshipcheck").innerHTML = "Spaces are not allowed";
            checkContactship=false;
            check_country_country=false;
        }

        else {
            check_country_country=true;
            checkContactship=true;
            document.getElementById("countryshipcheck").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

        }




    if(checkContactship===true)
        if (contactshipto === "") {
            document.getElementById("contactValidship").innerHTML = "number is mandatory";
            checkContact=false;
            checkContactship=false;
            var  check_paymentMethod=false;
        }
        else if(contact_reg.test(contactshipto) === false){

            document.getElementById("contactValidship").innerHTML = "Enter valid contact";
            checkContactship=false;
            checkContactship=false;
            check_paymentMethod=false;
        }
        else{
            checkContactship=true;
            check_paymentMethod=true
            checkContactship=true;

            document.getElementById("contactValidship").innerHTML = " <span class='glyphicon glyphicon-ok'>  valid</span>";

        }




    var radio_check;

    if(check_paymentMethod==true){
        var i;
        for( i=0; i < checkPaymentMethodradio.length; i++){
            if(checkPaymentMethodradio[i].checked){
                radio_check=true;
            }
            if(radio_check===true){
                var shipmentcheck=true;
                document.getElementById("checkPayementMethods").innerHTML="Selected";

            }
            else{
                shipmentcheck=false;

                document.getElementById("checkPayementMethods").innerHTML="No PaymentMethod selected";
            }
        }
    }


    var radio_checkship;

    if(shipmentcheck==true){
        var i;
        for( i=0; i < checkshipmentMethodradio.length; i++){
            if(checkshipmentMethodradio[i].checked){
                radio_checkship=true;
            }
            if(radio_checkship===true){
                shipmentcheck=true;
                document.getElementById("checkshipmentMethods").innerHTML="Selected";

            }
            else{
                shipmentcheck=false;

                document.getElementById("checkshipmentMethods").innerHTML="No shipmentMethod selected";
            }
        }
    }




    if(check_paymentMethod===true  && shipmentcheck===true   &&  check_city_ship===true &&   check_name_ship===true && checkContactship===true && check_country_country===true && check_address===true &&  check_email===true)
    {


        return true;
    }
    else{
        notie.alert(3, 'Select Valid Field', 1);
        return false;
    }
}

