function validateForm() {
    var error = 0;
    var x = document.forms["form"]["email"].value;
    var y = document.forms["form"]["password"].value;

    document.getElementById('email_error').innerHTML = '';
    document.getElementById('pass_error').innerHTML = '';
    
    if (x == "") {
        error++;
       document.getElementById('email_error').style.fontSize = "15px";
       document.getElementById('email_error').style.color = "red";
       document.getElementById('email_error').innerHTML = 'Email must be filled out!';
    }
    if (y == "") {
        error++;
        document.getElementById('pass_error').style.fontSize = "15px";
        document.getElementById('pass_error').style.color = "red";
        document.getElementById('pass_error').innerHTML = 'Password must be filled out!';
    }
    if(error>0){
    return false;
    }
    return true;
}