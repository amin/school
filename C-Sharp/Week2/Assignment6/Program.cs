int GetYearInput(string message, int min, int max)
{
    while (true)
    {
        Console.WriteLine(message);
        if (int.TryParse(Console.ReadLine(), out var year))
        {
            if (year < min || year > max)
            {
                Console.WriteLine($"Year must be between {min} and {max}");
                continue;
            }

            return year;
        };
    }
}



void LeapYearCalculator(int min, int max)
{
    Console.WriteLine(" -- Amazing Leap Year Calculator --");
    var firstYear = GetYearInput("First year: ", min, max);
    var secondYear = GetYearInput("Second year: ", min, max);

    for (var i = firstYear; i <= secondYear; i++)
    {
        Console.WriteLine(DateTime.IsLeapYear(i) ? $"{i}*" : i);
    }

}

LeapYearCalculator(1, 9999);

