using Assignment1;

var validator = new PasswordValidator();
var password = "password";

if (validator.IsValidPassword(password))
{
    Console.WriteLine($"the password '{password}' is a valid password");
}

