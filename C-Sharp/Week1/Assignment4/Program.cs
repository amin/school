var validUsername = "falken";
var validPassword = "joshua";

var allowedAttempts = 3;
var attempts = 0;

Console.WriteLine("Welcome to NORAD Online Systems\n");

while (true)
{
    Console.Write("Please enter your username: ");
    var username = Console.ReadLine();
    
    Console.Write("Please enter your password: ");
    var password = Console.ReadLine();
    
    attempts++;

    if (validUsername == username && validPassword == password)
    {
        Console.WriteLine($"Greetings professor {validUsername}, would you like to play a game?");
        break;
    }

    if (attempts >= allowedAttempts)
    {
        Console.WriteLine("Application shutdown, bye!");
        break;
    }
    Console.WriteLine("Invalid credentials, please try again.\n");
}
