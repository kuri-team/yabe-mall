function emailvalidation() {
    var x=document.contact-form.email_add.value;
    // email contains the @ and . character
    var atposition=x.indexOf("@");
    var dotposition=x.lastIndexOf(".");
    // At least one character before and after the @.
    // At least two characters after . (dot).
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
        alert("Please enter a valid e-mail \n atpostion:"+atposition+"\n dotposition:"+dotposition);
        return false;
    }
}


function phonenumber(inputtxt)
{
    var phone = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
    if((inputtxt.contact-form.match(phone)) {
        return true;
    }
    else
    {
        alert("message");
        return false;
    }
}
// function phonevalidation(){
//     var phone=document.contact-form.phone_num.value;
//     if (isNaN(phone)){
//         document.getElementById("phone_num").innerHTML="Enter Numeric value only";
//         return false;
//     }else{
//         return true;
//     }
//     phone.add(Validate.Length, {minimum: 9, maximum: 11});
//     phone.add(Validate.Format, {pattern: /^[a-zA-Z][0-9a-zA-Z]{8,12}$/});

}

