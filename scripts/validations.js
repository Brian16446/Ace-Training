    // Validations
function validation(){
    var fName = document.forms["frmRegister"]["fName"].value;
    var sName = document.forms["frmRegister"]["sName"].value;
    var postcode = document.forms["frmRegister"]["postCode"].value;
    var registerDate = document.forms["frmRegister"]["registerDate"].value;
    var dob = document.forms["frmRegister"]["dob"].value;
    var age = document.forms["frmRegister"]["age"].value;
    var email = document.forms["frmRegister"]["email"].value;
    var password = document.forms["frmRegister"]["password"].value;
    var nokFirstName = document.forms["frmRegister"]["nokForename"].value;
    var nokSurname = document.forms["frmRegister"]["nokSurname"].value;
    var nokPostcode = document.forms["frmRegister"]["nokPostcode"].value;
    var nokContact = document.forms["frmRegister"]["nokContact"].value;

    
    if (checkFirstName(fName) == false){
        return false;
    }
    if (checkLastName(sName) == false){
        return false;
    }
    if (checkPostCode(postcode) == false){
        return false;
    }
    if(checkRegisterDate(registerDate) == false){
        return false;
    }
    if (checkDoB(dob) == false){
        return false;
    }
    if (checkAge(age, dob) == false){
        return false;
    }
    if (checkGender() == false){
        return false;
    }
    if (checkEmail(email) == false){
        return false;
    }
    if(checkPassword(password) == false){
        return false;
    }
    if(typeof document.forms["frmRegister"]["NIN"] != "undefined"){
        var NIN = document.forms["frmRegister"]["NIN"].value;
        if(checkNIN(NIN) == false){
            return false;
        }
    }
    if (checkFirstName(nokFirstName) == false){
        return false;
    }
    if (checkLastName(nokSurname) == false){
        return false;
    }
    if (checkPostCode(nokPostcode) == false){
        return false;
    }
    if(checkNokContact(nokContact) == false){
        return false;
    }

}

function checkFirstName(fName){
    var forename = /^[A-Za-z]{3,}$/
    if(!forename.test(fName)){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Please enter a valid first name";
        return false;
    }
}

function checkLastName(sName){
    var surname = /^[A-Za-z]{2,}$/
    if(!surname.test(sName)){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Please enter a valid surname";
        return false;
    }
}

function checkPostCode(postCode){
    var re = /^[A-Za-z]{1,2}\d{1,2}\s*\d{1}[A-Za-z]{1,2}/
    if(!re.test(postCode)){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Please enter a valid UK Postcode";
        return false;
    }
}


function checkRegisterDate(registerDate){
    if(checkIfDate(registerDate)){
        todaysDate = new Date();
        day = todaysDate.getDate();
        month = todaysDate.getMonth();
        month++;
        year = todaysDate.getFullYear();
        var fullDate;
        

        if(day < 10){
            fullDate = "0" + day + "/" + month + "/" + year;
            if(month < 10){
                fullDate = "0" + day + "/" + "0" + month + "/" + year;
            }
        }
        else if(month < 10){
            fullDate = "" + day + "/" + "0" + month + "/" + year;
        }
        else{
            fullDate = "" + day + "/" + month + "/" + year;
        }

        if(fullDate != registerDate){
            modal.style.display = "block";
            document.getElementById("modalText").innerHTML = "Register Date must be todays date";
            return false;
        }
    }
    else{
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Please enter a valid registration date";
        return false;
    }
    
}

function checkIfDate(x){
    var reg = /^\d{2}\/\d{2}\/\d{4}$/
    if(reg.test(x)){
        return true;
    }
    else{
        return false;
    }
}

function checkDoB(dob){
    if(checkIfDate(dob)){
        var dobList = dob.split('/');

        var day = dobList[0];
        var month = dobList[1];
        var year = dobList[2];


        // CHECKING IF THE DATE FALLS WITHIN A VALID CALENDAR DATE. IE NO 29/02/ UNLESS LEAP YEAR OR 40/10/ OR 31/06/
        if((month == 02) && (day > 28)){
            if((year % 4 == 0) && (year % 100 != 0) || (year % 400 == 0)){
                if(day > 29){
                    modal.style.display = "block";
                    document.getElementById("modalText").innerHTML = "February has only 29 days during a leap year";
                    return false
                }
            }else{
                modal.style.display = "block";
                document.getElementById("modalText").innerHTML = "February has only 28 days outside of a leap year";
                return false
            } 

        }

        if(((month == 04) && (day > 30) || (month == 06) && (day > 30) || (month == 09) && (day > 30) || (month == 11) && (day > 30))){
            modal.style.display = "block";
            document.getElementById("modalText").innerHTML = "This month has 30 days";
            return false
        }
        
        if(day > 31){
            modal.style.display = "block";
            document.getElementById("modalText").innerHTML = "This month has 31 days";
            return false
        }
        


        for(var i=0; i<2; i++){
            if(!(dobList[i] > 0)){
                modal.style.display = "block";
                document.getElementById("modalText").innerHTML = "dob must be greater than 01/01/1913 and less than todays date";
                return false;
            }

        }
        if((year < 1913) || (year > 2018)){
            modal.style.display = "block";
            document.getElementById("modalText").innerHTML = "dob must be greater than 01/01/1913 and less than todays date";
            return false
        }
    }
    else{
        modal.style.display = "block";
            document.getElementById("modalText").innerHTML = "please enter a valid date of birth";
        return false;
    }
}

function checkAge(age,dob){
    if(age < 12){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Must be older than 12";
        return false;
    }
    else if(age > 150){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Must be younger than 150";
        return false;
    }

    // Getting todays date
    todaysDate = new Date();
    day = todaysDate.getDate();
    month = todaysDate.getMonth();
    month++;
    year = todaysDate.getFullYear();


    // Checking if age matches date of birth
    var dobList = dob.split('/');

    var dobDay = dobList[0];
    var dobMonth = dobList[1];
    var dobYear = dobList[2];

    
    // Adding off set if into the next year. i.e date = 04/01/2019. d.o.b = 26/04/1994. 2019-24 = 1995 not 1994. 
    if(dobMonth == month){
        if(day < dobDay){
            dobYear++;
        }
    }

    if(dobMonth > month){
        dobYear++;
    }

    if((year-age) != dobYear){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Age must match Date of Birth";
        return false;
    }
}


function checkGender(){
    var radioMale = document.getElementById('male').checked;
    var radioFemale = document.getElementById('female').checked;

    if((radioMale == false) && radioFemale == false){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Please select a gender";
        return false;
    }
}


function checkEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(email)){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Please enter a valid email";
        return false;
    }
    
}

function checkPassword(password){
    if(password == ""){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Please enter a password";
        return false;
    }
}

// THESE FUNCTIONS MUST ONLY EXECUTE IF THE CHECKBOX IS TICKED
function checkVisaExpiry(){

}

function checkPassportNumber(){

}

function checkNokContact(nokContact){
    var re = /^[0-9]+$/;
    if(!re.test(nokContact)){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Contact number must be a number";
        return false;
    }
}


function checkNIN(nin){
    var re = /^\s*[a-zA-Z]{2}(?:\s*\d\s*){6}[a-zA-Z]?\s*$/
    if(!re.test(nin)){
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Enter a valid National Insurace Number";
        return false;
    }
}


// Event listener to see if the check box is checked. If it is, it shows the extra boxes
$('input[name=international').change(function(){
    if($(this).is(':checked')){
        $('#visa').show();
        $('#passport').show();
    } else{
        $('#visa').hide();
        $('#passport').hide();
    }
})

/* GIVE THE OTHER PAGES STYLES */


// function validateSingleDate(date){
//     checkRegisterDate()
// }