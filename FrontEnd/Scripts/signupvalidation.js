console.log("connected to signup validation!");




const maxUsernameLength = 10;
const maxPwLength = 15; /* also, one special character, one uppercase, one number */


const userRegex = new RegExp(`^(?!.*  )[a-zA-Z0-9 ]{2,${maxUsernameLength}}$`); //no special characters for usernames. length between 2- maxusernamelength also no double spaces
const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&])[A-Za-z\d@.#$!%*?&]{4,15}$/ //; //at least one uppercase, one special character, and one digit.
const gmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ //email verification
let pwText, userNameText, emailText;

let pw = document.getElementById("password");

if(pw)
{
    pwText = pw.textContent;
}
let username = document.getElementById("username");
if(username)
{
   userNameText = username.textContent;
}
let email = document.getElementById("email");
if(email)
{
    emailText = email.textContent;
}
const form = document.getElementById("signupform");

 class User{

    constructor(username, email, password)
    {
        this.username = username;
        this.email = email;
        this.password = password;
    }

}



let user;

GetUserContents();

if(form)
{
    form.addEventListener("click", ()=>{
        
        if(!IsValidateGmail(email)){
            ShowAlert("gmail error: please enter a valid email."); 
            return;
        }
        
        if(!IsValidatePassword(password)){
            ShowAlert("password error: 1) at least one uppercase, one special character, and one digit. 2) must be larger than 8 and less than 15");
            return;
        }
        
        if(!IsValidateUsername(username)){
            ShowAlert("username error: 1) can't have 2 consecutive spaces. \n2) no special characters \n3) username must be longer than 2.");
            return;
        }
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
function GetUserContents(username, gmail, pw){
    user = new User(username, gmail, pw);
}
function ShowAlert(errormessage)
{
    alert(errormessage);
}
export {IsValidateGmail, IsValidateUsername, IsValidatePassword};