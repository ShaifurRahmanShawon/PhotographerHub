function validate(){
var error = 0;
var profession = document.forms["validForm"]["profession"].value;
var name = document.forms["validForm"]["name"].value;
var password = document.forms["validForm"]["password"].value;
var repassword = document.forms["validForm"]["repassword"].value;
var email = document.forms["validForm"]["email"].value;


document.getElementById('profession_error').innerHTML = '';
document.getElementById('name_error').innerHTML = '';
document.getElementById('password_error').innerHTML = '';
document.getElementById('repassword_error').innerHTML = '';
document.getElementById('email_error').innerHTML = '';




//profession validation start
if(profession == null || profession =="" ){
  error++;
  document.getElementById('profession_error').style.fontSize = "15px";
  document.getElementById('profession_error').style.color = "#F2F50E";
  document.getElementById('profession_error').innerHTML = "Please select!" ;
}
//profession validation end

  //name validation start
if (name == "") {
        
    error++;
    document.getElementById('name_error').style.fontSize = "15px";
    document.getElementById('name_error').style.color = "#F2F50E";
    document.getElementById('name_error').innerHTML = "Name must be filled out!" ;
  
}
//name validation end




//password validation start

if (password == null || password == "" || password == " ") {
        
    error++;
    document.getElementById('password_error').style.fontSize = "15px";
    document.getElementById('password_error').style.color = "#F2F50E";
    document.getElementById('password_error').innerHTML = "Password can't  be empty or contain any space!" ;
  
}
re = /[0-9]/;
      if(!re.test(password)) {
        error++;
        document.getElementById('password_error').style.fontSize = "15px";
        document.getElementById('password_error').style.color = "#F2F50E";
        document.getElementById('password_error').innerHTML = "password must contain at least one number (0-9)!" ;
      }
re = /[a-z]/;
      if(!re.test(password)) {
        error++;
        document.getElementById('password_error').style.fontSize = "15px";
        document.getElementById('password_error').style.color = "#F2F50E";
        document.getElementById('password_error').innerHTML = "password must contain at least one lowercase letter(a-z)!" ;
      }
re = /[A-Z]/;
      if(!re.test(password)) {
        error++;
        document.getElementById('password_error').style.fontSize = "15px";
        document.getElementById('password_error').style.color = "#F2F50E";
        document.getElementById('password_error').innerHTML = "password must contain at least one Uppercase letter(A-Z)!" ;
      }
      if(password.length < 8 ){
        error++;
        document.getElementById('password_error').style.fontSize = "15px";
        document.getElementById('password_error').style.color = "#F2F50E";
        document.getElementById('password_error').innerHTML = "password must contain at least 8 characters!" ;
      }

//password validation end


//confirm password validation start
   
if(password != repassword ){
  error++;
  document.getElementById('repassword_error').style.fontSize = "15px";
  document.getElementById('repassword_error').style.color = "#F2F50E";
  document.getElementById('repassword_error').innerHTML = "confirm password doesn't match!" ;
}


//confirm password validaiton end

//email validation start
mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
if(!mailformat.test(email)) {
error++;
document.getElementById('email_error').style.fontSize = "15px";
document.getElementById('email_error').style.color = "#F2F50E";
document.getElementById('email_error').innerHTML = "Invalid email address!" ;
}

//email validation end
if(error>0){
    return false;
  }
   return true;


}