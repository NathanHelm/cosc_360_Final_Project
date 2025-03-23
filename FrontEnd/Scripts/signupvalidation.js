console.log("connected to signup validation!");
const maxUsernameLength = 10;
const userRegex = new RegExp(`^(?!.*  )[a-zA-Z0-9 ]{2,${maxUsernameLength}}$`); //no special characters for usernames. length between 2- maxusernamelength also no double spaces
const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&])[A-Za-z\d@.#$!%*?&]{4,15}$/ //; //at least one uppercase, one special character, and one digit.
const gmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ //email verification

let pwText, userNameText, emailText;

let pw = document.getElementById("password");
const form = document.getElementById("signupbutton");

if(form)
{
    form.addEventListener("click", (e)=>{

        GetTexts();
        
        if(!IsValidateGmail(emailText)){
            ShowAlert("gmail error: please enter a valid email."); 
            e.preventDefault();
            return;
        }
        
        if(!IsValidatePassword(pwText)){
            ShowAlert("password error: 1) at least one uppercase, one special character, and one digit. 2) must be larger than 8 and less than 15");
            e.preventDefault();
            return;
        }
        
        if(!IsValidateUsername(userNameText)){
            ShowAlert("username error: 1) can't have 2 consecutive spaces. \n2) no special characters \n3) username must be longer than 2.");
            e.preventDefault();
            return;
        }

        alert("DEBUG: success--taking you home!");
        //you are taken home. 

    });
}


function IsValidateUsername(user)
{
   if(user == null)
   {
    return false;
   }
   if(user == "")
   {
    return false;
   }
   if(!user.match(userRegex))
   {
    return false;
   }

   return true;

}

function IsValidateGmail(gmail)
{
    if(gmail == null)
    {
        return false;
    }
    if(gmail == "")
    {
        return false;
    }
    if(!gmail.match(gmailRegex))
    {
        return false;
    }
    return true;
}
function IsValidatePassword(pw)
{
   if(pw == null)
   {
    return false;
   }
   if(pw == "")
   {
    return false;
   }
   if(!pw.match(passwordRegex)){
    return false;
   }
   return true;
}
function ShowAlert(errormessage)
{
    alert(errormessage);
}
function GetTexts()
{
    let pw = document.getElementById("password");
    if(pw)
    {
        pwText = pw.value;
    }
    let username = document.getElementById("username");
    if(username)
    {
        userNameText = username.value;
    }
    let email = document.getElementById("email");
    if(email)
    {
        emailText = email.value;
    }
}
export {IsValidateGmail, IsValidateUsername, IsValidatePassword};