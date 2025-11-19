int GetInteger(int guesses)
{
    while(true) {
        Console.Write($"[{guesses + 1}/3] Guess a number: ");
        if(int.TryParse(Console.ReadLine(), out var number))
        {
            return number;
        }

        Console.WriteLine("That is not a number, please try again.");
    }
}


var random = new Random();
var number = random.Next(1, 11);
var guesses = 0;

while (true)
{

    if (guesses >= 3)
    {
        Console.WriteLine("Game over.");
        break;
    }
    
    var userGuess = GetInteger(guesses);
    
    if (userGuess < number)
    {
        Console.WriteLine("Too low.");
        guesses += 1;
        continue;
    }

    if (userGuess > number)
    {
        Console.WriteLine("Too high.");
        guesses += 1;
        continue;
    }
    
    Console.WriteLine("You have found the number.");
    break;
}