int GetInteger(string message, int min, int max)
{
    while (true)
    {
        Console.WriteLine(message);
        var input = Console.ReadLine();
        if (int.TryParse(input, out var number))
        {
            if(number >= min && number <= max) {
                return number;
            }
        }
    }
}

var number = GetInteger("Please type a number between 1-2000: ", 1, 2000);
Console.WriteLine($"Your number is: {number}");