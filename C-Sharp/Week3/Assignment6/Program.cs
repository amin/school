bool IsValidPassword(string password)
{
    if(password.Length < 8) { 
        return false;
    }

    var digitCounter = 0;
    
    foreach (var c in password)
    {
        if (Char.IsDigit(c))
        {
            digitCounter += 1;
        }
        
    }
    
    if (digitCounter < 2 || digitCounter == password.Length)
    {
        return false;
    }
    return true;
}

Console.WriteLine(IsValidPassword("short"));
Console.WriteLine(IsValidPassword("password1"));
Console.WriteLine(IsValidPassword("12345678"));
Console.WriteLine(IsValidPassword("xxxxxxx0"));
Console.WriteLine(IsValidPassword("p4ssw0rd"));
