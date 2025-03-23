
import { IsValidateGmail, IsValidateUsername, IsValidatePassword} from "../signupvalidation.js";
/* basic tests for gmail, password, and username */
test("test name", function (){

    //return true
    expect(IsValidateUsername("name")).toBe(true);
    expect(IsValidateUsername("Bob12")).toBe(true);
    expect(IsValidateUsername("123")).toBe(true);
    expect(IsValidateUsername("Tim")).toBe(true);
    expect(IsValidateUsername("tom park")).toBe(true);

    //return false
    expect(IsValidateUsername("n%m(%%e")).toBe(false);
    expect(IsValidateUsername("     ")).toBe(false); //can't have two consecutive spaces. 
    expect(IsValidateUsername("aaaaaaaaaaaaaaaaaaaaaaaaaaaaa")).toBe(false);
    expect(IsValidateUsername("A")).toBe(false);
    expect(IsValidateUsername("")).toBe(false);
    expect(IsValidateUsername(null)).toBe(false);

});
test("test email", function(){

    expect(IsValidateGmail("test@example.com")).toBe(true);
    expect(IsValidateGmail("example@yahoo.com")).toBe(true);
    expect(IsValidateGmail("myemail@gmail..com")).toBe(true);

    expect(IsValidateGmail(null)).toBe(false);
    expect(IsValidateGmail("my@gmail")).toBe(false);
    expect(IsValidateGmail("@gmail")).toBe(false);
    expect(IsValidateGmail("@")).toBe(false);
    expect(IsValidateGmail("me@gmail@gmail.com")).toBe(false);
    expect(IsValidateGmail("hi@@@gmail.com")).toBe(false);
    expect(IsValidateGmail("me@@gmail.com")).toBe(false);
    expect(IsValidateGmail("")).toBe(false);


});
test("test password", function(){
    //at least one uppercase, one special character, and one digit.
    expect(IsValidatePassword("Aaa90*")).toBe(true);
    expect(IsValidatePassword("%11PP*")).toBe(true);
    
    expect(IsValidatePassword("*1P")).toBe(false); 
    expect(IsValidatePassword("((11PP ")).toBe(false);

    expect(IsValidatePassword("   1P  ")).toBe(false);
    expect(IsValidatePassword("*PPaaaa")).toBe(false);
    expect(IsValidatePassword("**p1")).toBe(false);
    expect(IsValidatePassword("PPP**")).toBe(false);
});