int GetInteger(string message)
{
    while (true)
    {
        Console.WriteLine(message);
        var input = Console.ReadLine();
        if (int.TryParse(input, out var number))
        {
            return number;
        }
    }
}

var number = GetInteger("Please type a number: ");
Console.WriteLine($"Your number is: {number}");