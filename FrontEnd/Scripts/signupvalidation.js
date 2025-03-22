console.log("connected to signup validation!");

const form = document.querySelector("button");

let pw = document.getElementById("password").textContent();
let username = document.getElementById("username").textContent();
let gmail = document.getElementById("gmail").textContent();

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


form.addEventListener("click", ()=>{
    
    ServerValidationUsername();
    
    ServerValidationGmail();
    
    ServerValidationPassword();

})

function ServerValidationUsername(user)
{
   if(user == null)
   {
    console.log("id not found? ");
   }
   else if(user == "")
   {
    
   }

}
function ServerValidationGmail(gmail)
{

}
function ServerValidationPassword(pw)
{
   
}
function GetUserContents(username, gmail, pw){
    user = new User(username, gmail, pw);
}
function ShowAlert(errormessage)
{
    alert(errormessage);
}