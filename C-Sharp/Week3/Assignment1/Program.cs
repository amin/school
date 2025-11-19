int GetInteger()
{
    while(true) {
        Console.Write("Guess a number: ");
        if(int.TryParse(Console.ReadLine(), out var number))
        {
            return number;
        }

        Console.WriteLine("That is not a number, please try again.");
    }
}


var random = new Random();
var number = random.Next(1, 11);

while (true)
{
    var userGuess = GetInteger();
    
    if (userGuess < number)
    {
        Console.WriteLine("Too low.");
        continue;
    }

    if (userGuess > number)
    {
        Console.WriteLine("Too high.");
        continue;
    }
    
    Console.WriteLine("You have found the number.");
    break;
}